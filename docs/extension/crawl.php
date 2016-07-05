<?php
// Crawl.php

require 'dom.php';
require 'sql.php';
//require 'header.php';

// Date
$date = date("Y-m-d H:i:s");

$count = 0;
$plus = 5;

$page = $_GET["page"];

echo $page . "<br />";

// Create DOM from URL or file
$html = file_get_html('http://www.ifunny.com/?page=' . $page);

echo $html . "<br />";

// Find all images 
foreach($html->find('img') as $element)
{
	if ($element->src != "/static/site/img/logo.png")
	{
		//if ($count < $plus)
		//{
			$src = $element->src;

			// Insert DB Table
                	$sql = "INSERT INTO $content_table (date, url, ref, likes)VALUES('$date', '$src', 'ifunny', '0')";
                	$result = mysql_query($sql);

			echo $element->src . "<br>";
		//}

		//elseif ($count == $plus)
		//{
		//	$src = $element->src;
		//
                //        // Insert DB Table
                //        $sql = "INSERT INTO $content_table (date, url, ref, likes)VALUES('$date', '$src', 'ifunny', '0')";
                //        $result = mysql_query($sql);
		//
                //        echo $element->src . "<br>";
		//
		//	$plus = $plus + 5;
		//}

		//elseif ($plus == 25960)
		//{
		//	die("Limit Reached!");
		//}
	}	

	$count++;
}

$page++;

//echo "<a href=\"http://howlix.com/extension/crawl.php?page=$page\"><button class=\"btn btn-primary\">Next</button></a>";

header('Location: http://howlix.com/extension/crawl.php?page=' . $page);

//require 'footer.php';
?>
