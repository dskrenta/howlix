<?php
// ShredFeed sql.php

// Vars
$host = "localhost"; // Host name 
$username = "shredfeed"; // Mysql username 
$password = "davixworksformike"; // Mysql password 
$db_name = "shredfeed"; // Database name 
$main_table = "shredstore5"; // Main CONTENT Storage Table Name
//$folder_table = "shredfold"; // Main FOLDER Storage Table Name
$folder_table = "shredfold4"; // Main FOLDER Storage Table Name
$user_table = "userstore"; // Main USER Storage Table Name
$recommend_table = "shredrecommend";

// Connect to server and select database.
mysql_connect($host, $username, $password, $db_name)or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");
?>
