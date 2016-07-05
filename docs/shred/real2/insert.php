<?php
require 'home/david/howlix/docs/shred3/sql.php';

$date = date("Y-m-d H:i:s");
$input = "X";
$folder = "NOT REAL";

mysql_query("INSERT INTO folderid (date, input, folder) VALUES ('$date', '$input', '$folder')");

mysql_close();
?>
