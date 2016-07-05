<?php
// delete_admin.php

// GET
$row_id = $_GET["id"];
$table_id = $_GET["table"];

// Vars
//$host="localhost"; // Host name 
//$username="wordpress"; // Mysql username 
//$password="dtechblog777"; // Mysql password 
//$db_name="wordpress"; // Database name 
//$tbl_name="userstore"; // Table name 

// Connect to server and select database.
//mysql_connect("localhost", "wordpress", "dtechblog777", "wordpress")or die("cannot connect");
//mysql_select_db("$db_name")or die("cannot select DB");

require 'sql.php';

// Query for user
$mysql="DELETE FROM $table_id WHERE ID='$row_id'";
$out=mysql_query($mysql) or die(mysql_error());

//Header Redirect
header('Location: http://howlix.com/shred2/testtable.php');
?>
