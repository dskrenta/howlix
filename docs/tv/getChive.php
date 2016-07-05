<?php
require 'sql.php';
require 'library/dom.php';
require 'functions.php';

// Create DOM from URL
$html = file_get_html('http://thechive.com/');

// Find all article blocks
foreach($html->find('article.post') as $section) 
{
	$item['url'] = $section->find('a', 1)->href;
	//$item['thumbnail'] = $section->find('img', 0)->src;
	$item['thumbnail'] = $section->find('img.attachment-single-post-thumbnail', 0)->src;
	$item['title'] = $section->find('h1', 0)->plaintext;
	
	preg_match_all('#\((.*?)\)#', $item['title'], $matches);
	$item['count'] = implode($matches[1]);

	$item['title'] = preg_replace("/\([^)]+\)/", "", $item['title']);

	$item['images'] = getImages($item['url'], $item['title']);

	// Next if definitions 
	if(empty($item['images']) || empty($item['title']) || empty($item['thumbnail']) || empty($item['url']))
	{
		continue;	
	}

	if (stripos($item['title'],'chive') !== false) 
	{
    		continue;
	}
	
	if(stripos($item['title'],'video') !== false)
	{
		continue;
	}

	if(stripos($item['title'], 'links') !== false)
	{
		continue;
	}

	if(stripos($item['count'], 'video') !== false)
	{
		continue;
	}

	if(stripos($item['count'], 'story') !== false)
	{
		continue;
	}

    	$sections[] = $item;
}

print_r($sections);

$count = 0;

foreach($sections as $value)
{
	$safeValue = mysql_real_escape_string(json_encode($value));
	
	$sqlTest = "SELECT * FROM media2 WHERE data='$safeValue' LIMIT 1";
	$resultTest = mysql_query($sqlTest) or die(mysql_error());

	if (mysql_fetch_array($resultTest) !== true)
        {
		$date = date("Y-m-d H:i:s");
		
		$sql = "INSERT INTO media2 (date, data) VALUES ('$date', '$safeValue')";
		$result = mysql_query($sql) or die(mysql_error());

		$count++;
        }
}

echo $count . "\n";


/*
$count = 1;

foreach($sections as $value)
{
        $url = mysql_real_escape_string(urlencode($value['url']));
        $title = mysql_real_escape_string(urlencode($value['title']));
        $thumbnail = mysql_real_escape_string($value['thumbnail']);

        $sql = "SELECT * FROM $video_table WHERE title='$title' LIMIT 1";
        $result = mysql_query($sql) or die(mysql_error());

        if (mysql_fetch_array($result) !== false)
        {
                // Assigned
        }

        else
        {
                // Avaliable
                // Date
                $date = date("Y-m-d H:i:s");

                // Insert data into mysql 
                $sqltwo = "INSERT INTO images (date, title, url, image, votes) VALUES ('$date', '$title', '$url', '$thumbnail', '0')";
                $resulttwo = mysql_query($sqltwo) or mysql_error();

                $count ++;
        }
}

echo $count . "\n";
*/


function getImages($url, $title)
{
	$count = 0;
	$html = file_get_html($url);
	
	foreach($html->find('img.attachment-full') as $element) 
	{
		$images[$count] = $element->src;
                $count++;
	}

        $images[] = $image;
	
	return array_filter($images);
}

?>
