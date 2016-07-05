<?php
require 'header.php';
require 'sql.php';
require 'library/dom.php';
require 'functions.php';

echo "<div class=\"container\">";

// Create DOM from URL
$html = file_get_html('http://9gag.tv/');

// Find all video blocks
foreach($html->find('div.badge-grid-item') as $video) 
{
	$item['url'] = $video->find('a', 0)->href;

    	$titleQuery = html_entity_decode($video->find('h4', 0)->plaintext);
	$item['title'] = str_replace("&#039;", "'", $titleQuery);
	
	//$snippetInt = file_get_html($item['url']);
	//$snippetResult = $snippetInt->find('header', 0)->find('p' ,1)->plaintext;	
	//$item['snippet'] = str_replace("&#039;", "'", $snippetResult);

	// Curl config
	$ch = curl_init($item['url']);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$cl = curl_exec($ch);

	// DOM, XPATH config
	$dom = new DOMDocument();
	@$dom->loadHTML($cl);
	$xpath = new DOMXpath($dom);

	$embedQuery = $xpath->query('//div[@id="jsid-post-container"]/@data-external-id');
        $embed = $embedQuery->item(0)->nodeValue;

	$item['vid'] = $embed;

	$item['embed'] = "<iframe class=\"embed-responsive-item\" src=\"http://www.youtube.com/embed/" . $embed . "\" frameborder=\"0\" allowfullscreen></iframe>";

	$youtubeUrl = "http://www.youtube.com/watch?v=" . $embed;
	$og = fetch_og($youtubeUrl);

	$item['image'] = $og['image'];	
	$item['youtubeUrl'] = $youtubeUrl;

    	$videos[] = $item;
}

print_r($videos);


$count = 1;

foreach($videos as $value)
{
	$url = mysqli_real_escape_string($conn, $value['url']);
	$title = mysqli_real_escape_string($conn, urlencode($value['title']));
	//$snippet = mysqli_real_escape_string($conn, urlencode($value['snippet']));
	$vid = mysqli_real_escape_string($conn, $value['vid']);
	$embed = mysqli_real_escape_string($conn, $value['embed']);
	$image = mysqli_real_escape_string($conn, $value['image']);
	$yUrl = mysqli_real_escape_string($conn, $value['youtubeUrl']);
	
	$sql = "SELECT * FROM $video_table WHERE embed='$embed' LIMIT 1";
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        if (mysqli_fetch_array($result) !== false)
        {
          	// Assigned
       	}

     	else
     	{
        	// Avaliable
              	// Date
                $date = date("Y-m-d H:i:s");

                // Insert data into mysql 
              	//$sqltwo = "INSERT INTO $video_table (date, title, snippet, url, image, embed, votes) VALUES ('$date', '$title', '$snippet', '$yUrl', '$image', '$embed', '1')";
           	$sqltwo = "INSERT INTO $video_table (date, title, url, image, embed, votes) VALUES ('$date', '$title', '$yUrl', '$image', '$embed', '1')";
		$resulttwo = mysqli_query($conn, $sqltwo) or mysqli_error($conn);
	
		$count ++;
   	}
} 


echo "<h1>" . $count . "</h1>";


echo "</div>";
?>
