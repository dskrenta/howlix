<?php
// sql.php

// Vars
$host = "localhost"; // Host name 
$username = "fundb"; // Mysql username 
$password = "fundba838"; // Mysql password 
$db_name = "fundb"; // Database name 
$main_table = "main";

// Connect to server and select database.
mysql_connect($host, $username, $password, $db_name)or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

?>
