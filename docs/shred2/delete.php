<?php
// delete_admin.php

// GET
//$row_id = $_POST["id"];
//$table_name = $_POST["table"];
//$passed_uid = $_POST["uid"];

// SESSION 
session_start();

$row_id = $_POST["rowid"];
$passed_uid = $_POST["userid"];
$table_name = $_POST["table"];
$passed_folder = $_POST["folder"];

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
			if ($table_name == "shredfold4")
			{
				// Delete SQL query
                                $mysql="DELETE FROM $table_name WHERE ID='$row_id'";
                                $out=mysql_query($mysql) or die(mysql_error());

                                // Header redirect
                                header('Location: http://howlix.com/shred2/main.php');

				// Delete all files from said folder
				$exec="DELETE FROM $main_table WHERE folder='$passed_folder'";
                                $put=mysql_query($exec) or die(mysql_error());
	
				if (strpos($url, "upload") !== false) 
				{
    					// Delete File On Server
					
					unlink($url);
				}
		
				else
				{
					// No File Detected
				}
			}

			else
			{
				// Delete SQL query
				$mysql="DELETE FROM $table_name WHERE ID='$row_id'";
				$out=mysql_query($mysql) or die(mysql_error());
		
				// Header redirect
				header('Location: http://howlix.com/shred2/main.php');

				if (strpos($url, "upload") !== false)
                                {
                                        // Delete File On Server

					unlink($url);
                                }

                                else
                                {
                                        // No File Detected
                                }
			}
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
