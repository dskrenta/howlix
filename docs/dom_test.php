<?php
require 'dom.php';

$url = $_GET["url"];

// Create DOM from URL or file
//$html = file_get_html('http://www.9gag.com/');

$html = file_get_html($url);

// Find all images 
foreach($html->find('img') as $element) 
	echo "<img src=\"" . $element->src . "\" /><p />";

// Find all links 
//foreach($html->find('a') as $element) 
//       echo $element->href . '<br>';
?>
