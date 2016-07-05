<?php
require 'sql.php';

$sql = "INSERT videos2 SELECT * FROM videos";
$result = mysql_query($sql) or die(mysql_error());

?>
