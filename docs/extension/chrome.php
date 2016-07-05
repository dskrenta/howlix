<?php
// Header required
require 'sql.php';
require 'prefs.php';
require 'header.php';

$id = rand(1, 361);

// Body
$sql = "SELECT * FROM $content_table WHERE ID='$id'";
$result = mysql_query($sql) or die (mysql_error());

$row = mysql_fetch_array($result);

$url = $row["url"];

echo "<img src=\"". $url . "\" alt=\"\" width=\"100%\"></img>";

echo "<br /><br /><a href=\"http://howlix.com/extension/chrome.php\"><button type=\"button\" class=\"btn btn-primary btn-lg btn-block\">Randomize!</button></a><br /><br />";

// Footer requried
require 'footer.php';
?>
