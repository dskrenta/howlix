<?php
//require 'header.php';
require 'sql.php';
require 'library/dom.php';
require 'functions.php';

//echo "<div class=\"container\">";

// Create DOM from URL
$html = file_get_html('http://stars.topix.com/');

// Find all video blocks
foreach($html->find('div.str-item-wrapper') as $section) 
{
	$item['url'] = "http://stars.topix.com" . $section->find('a', 0)->href;
	$item['title'] = $section->find('div.x-title', 0)->plaintext;
	$item['image'] = $section->find('img', 0)->src;

	/*
	$item['url'] = $video->find('a', 0)->href;

    	$titleQuery = html_entity_decode($video->find('h4', 0)->plaintext);
	$item['title'] = str_replace("&#039;", "'", $titleQuery);
	
	$snippetInt = file_get_html($item['url']);
	$snippetResult = $snippetInt->find('header', 0)->find('p' ,0)->plaintext;	
	$item['snippet'] = str_replace("&#039;", "'", $snippetResult);

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
	*/

    	$sections[] = $item;

}

print_r($sections);

//echo "</div>";
?>
