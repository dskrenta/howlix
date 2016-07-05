<?php
// sql.php

// Vars
$host = "localhost"; // Host name 
$username = "fundb"; // Mysql username 
$password = "fundba838"; // Mysql password 
$db_name = "fundb"; // Database name 
$video_table = "videos2"; // Table name
//$images_table = "media_images";

$images_table = "imageStore";

// Connect to server and select database.
$conn = mysqli_connect($host, $username, $password, $db_name)or die("cannot connect");
mysqli_select_db($conn, "$db_name")or die("cannot select DB");

?>
