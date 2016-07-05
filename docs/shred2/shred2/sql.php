<?php
// ShredFeed sql.php

// Vars
$host = "localhost"; // Host name 
$username = "wordpress"; // Mysql username 
$password = "dtechblog777"; // Mysql password 
$db_name = "wordpress"; // Database name 
$main_table = "shredstore5"; // Main CONTENT Storage Table Name
//$folder_table = "shredfold"; // Main FOLDER Storage Table Name
$folder_table = "shredfold4"; // Main FOLDER Storage Table Name
$user_table = "userstore"; // Main USER Storage Table Name

// Connect to server and select database.
mysql_connect($host, $username, $password, $db_name)or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");
?>
