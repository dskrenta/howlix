<?php
require 'header.php';
require 'sql.php';
require 'library/dom.php';
require 'functions.php';

echo "<div class=\"container\">";

// Create DOM from URL or file
$html = file_get_html('https://www.youtube.com/channel/UCF0pVplsI8R5kcAqgtoRqoA/videos');

$count = 0;

// Find all links 
foreach($html->find('a') as $element)
{
	if (strpos($element->href, 'watch'))
	{ 
       		//echo $element->href . '<br>';
		$url = "https://youtube.com" . $element->href;

		$url = mysql_real_escape_string($url);

		// Open Graph
            	$og = fetch_og($url);

            	//$ogimage = mysql_real_escape_string($og['image']);
           	//$ogtitle = mysql_real_escape_string($og['title']);
            	//$ogdescription = mysql_real_escape_string($og['description']);

		$ogimage = $og['image'];
		$ogtitle = $og['title'];
		$ogdescription = $og['description'];

		$ogimage = mysql_real_escape_string($ogimage);
		$ogitle = htmlspecialchars(mysql_real_escape_string($ogtitle));
		$ogdescription = htmlspecialchars(mysql_real_escape_string($ogdescription));

		$ogtitle = str_replace("â", "a", $ogtitle);
                $ogtitle = str_replace("&", "and", $ogtitle);
		$ogtitle = str_replace("/", "or", $ogtitle);
		$ogtitle = str_replace(":", "", $ogtitle);
		$ogtitle = str_replace("'", "", $ogtitle);
		//$trimmed = str_replace("\"", "\"", $ogtitle);
                //$trimmed = str_replace("|", "", $ogtitle);
                //$trimmed = str_replace("_", "\_", $ogtitle);
                //$trimmed = str_replace("%", "\%", $ogtitle);

		$ogdescription = str_replace("â", "a", $ogdescription);
		$ogdescription = str_replace("&", "and", $ogdescription);
		$ogdescription = str_replace("/", "or", $ogdescription);
		//$trim2 = str_replace("\"", "\\", $ogdescription);
                //$trim2 = str_replace("|", "", $ogdescription);
                //$trim2 = str_replace("_", "\_", $ogdescription);
		//$trim2 = str_replace("%", "\%", $ogdescription);

		$sql = "SELECT * FROM $video_table WHERE image='$ogimage' LIMIT 1";
		$result = mysql_query($sql) or die($ogdescription);

		if (mysql_fetch_array($result) !== false)
		{
			// Assigned
		}

		else
		{
			// Avaliable

			echo $url . "<br />";

                        // Date
                        $date = date("Y-m-d H:i:s");

                        // Generate Embed Code
                        parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
                        $video = $my_array_of_vars['v'];

                        $embed = "<iframe class=\"embed-responsive-item\" src=\"http://www.youtube.com/embed/" . $video . "\" frameborder=\"0\" allowfullscreen></iframe>";
                        
                        //if ($count < 3)
                        //{
                                // Insert data into mysql 
                                $sqltwo = "INSERT INTO $video_table (date, title, snippet, url, image, embed, votes) VALUES ('$date', '$ogtitle', '$ogdescription', '$url', '$ogimage', '$embed', '0')";
                                $resulttwo = mysql_query($sqltwo) or die(mysql_error());
                        //}
        
                        $count++;
		}
		
		/*
		//if (mysql_num_rows($result) > 0)
		//{
        	//	// Exists in DB
		//}

		else
		{
			echo $url . "<br />";

			// Date
			$date = date("Y-m-d H:i:s");

			// Generate Embed Code
			parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
			$video = $my_array_of_vars['v'];

			$embed = "<iframe class=\"embed-responsive-item\" src=\"http://www.youtube.com/embed/" . $video . "\" frameborder=\"0\" allowfullscreen></iframe>";
			
			if ($count < 3)
			{
				// Insert data into mysql 
				$sqltwo = "INSERT INTO $video_table (date, title, snippet, url, image, embed, votes) VALUES ('$date', '$trimmed', '$trim2', '$url', '$ogimage', '$embed', '0')";
				$resulttwo = mysql_query($sqltwo) or die(mysql_error());
			}
	
			$count++;
		}
		*/
	}
}

echo "<br /><h1>" . $count . "</h1>";

echo "</div>";
?>
