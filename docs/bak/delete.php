<?php
require 'sql.php';

$id = $_POST["id"];

$sql = "DELETE FROM $video_table WHERE ID='$id'";
$result = mysql_query($sql) or die(mysql_error());

header('Location: table.php');
?>
