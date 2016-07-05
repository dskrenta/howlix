<?php
// delete_admin.php

// GET
//$row_id = $_POST["id"];
//$table_name = $_POST["table"];
//$passed_uid = $_POST["uid"];

// SESSION 
session_start();

$row_id = $_SESSION['rowid'];
$passed_uid = $_SESSION['userid'];
$table_name = $_SESSION['table'];

// Require
require 'sql.php';

// Verification for security
$sql = "SELECT * FROM $table_name WHERE ID=$row_id";
$result = mysql_query($sql) or die(mysql_error());

if ($result)
{	
	while($row = mysql_fetch_array($result))
        {
		$id = $row['ID'];
           	$date = $row['date'];
             	$title = $row['title'];
            	$folder = $row['folder'];
            	$user = $row['user'];
             	$uid = $row['uid'];
          	$url = $row['url'];
             	$fid = $row['extra'];
            	$type = $row['type'];
          	$snippet = $row['snippet'];	

		if ($user = $passed_uid)
		{
			// Delete SQL query
			$mysql="DELETE FROM $table_name WHERE ID='$row_id'";
			$out=mysql_query($mysql) or die(mysql_error());
		
			// Header redirect
			header('Location: http://howlix.com/shred2');
		}

		else
		{
			// Not verified...
		}
	}
}
else
{
	// Failure
}
?>
