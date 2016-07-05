<?php
require 'sql.php';
require 'dom.php';
require 'header.php';

// Create DOM from URL or file
$html = file_get_html('http://www.9gag.com/');

// Find all images 
foreach($html->find('img') as $element) 
       echo "<img src=\"" . $element->src . "\"></img><br />";

require 'footer.php';
?>
