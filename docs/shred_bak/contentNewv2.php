<?php
// Start MySQL
require 'sql.php';
require 'session.php';

// UID + USER
session_start();
$window_uid = $_SESSION["uid"];
$window_user = $_SESSION["user"];

// FOLDERID
$folder_name = $_POST["folder"];
$folderId = $folder_name . $window_uid;

// Date
$date = date("Y-m-d H:i:s");

if(!empty($_POST["folder"]))
{
	$folder = mysql_real_escape_string($_POST["folder"]);

	if(!empty($_POST["url"]))
	{
		$url = mysql_real_escape_string($_POST["url"]);
		$type = "website";

		// Insert data into mysql 
        	$sql="INSERT INTO $main_table (date, title, folder, user, uid, type, url, extra)VALUES('$date', '$folder', '$folder', '$window_user', '$window_uid', '$type', '$url', '$folderId')";
        	$result=mysql_query($sql);

        	// Folder SQL
        	//$folderSQL = "INSERT INTO $folder_table (date, folder, user, uid, folderid)VALUES('$date', '$folder', '$window_user', '$window_uid', '$folderId')";
        	//$action = mysql_query($folderSQL);
	}

	if(!empty($_POST["image"]))
	{
		$image = mysql_real_escape_string($_POST["image"]);
		$type = "image";

		// Insert data into mysql 
                $sql="INSERT INTO $main_table (date, title, folder, user, uid, type, url, extra)VALUES('$date', '$folder', '$folder', '$window_user', '$window_uid', '$type', '$image', '$folderId')";
                $result=mysql_query($sql);

                // Folder SQL
                //$folderSQL = "INSERT INTO $folder_table (date, folder, user, uid, folderid)VALUES('$date', '$folder', '$window_user', '$window_uid', '$folderId')";
                //$action = mysql_query($folderSQL);
	}

	if(!empty($_POST["video"]))
	{
		$video = mysql_real_escape_string($_POST["video"]);
		$type = "video";

		// Insert data into mysql 
                $sql="INSERT INTO $main_table (date, title, folder, user, uid, type, extra, snippet)VALUES('$date', '$folder', '$folder', '$window_user', '$window_uid', '$type', '$folderId', '$video')";
                $result=mysql_query($sql);

                // Folder SQL
                //$folderSQL = "INSERT INTO $folder_table (date, folder, user, uid, folderid)VALUES('$date', '$folder', '$window_user', '$window_uid', '$folderId')";
                //$action = mysql_query($folderSQL);
	}
}

// Add file upload support

// Header redirect
header("Location: http://howlix.com/shred2/main.php");

// End MySQL
sqlEnd();
?>
