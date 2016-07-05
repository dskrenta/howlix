<?php
// ShredFeed index.php

// Required 
//require 'save.php';
require 'sql.php';
require 'functions.php';

// Headers
//require 'header.php';
//require 'fb_main.php';

// Main
//require 'sidebar.php';

// FILE.PHP
if (empty($_FILES['file'])) 
{
	// No file was selected for upload, your (re)action goes here
	require 'file.php';
}
else
{
}

if(isset($_COOKIE["uid"]))
{
        $userId = $_COOKIE["uid"];

        // GET POST Data espace vars for security
	$folder = mysql_real_escape_string($_POST["foldername"]);
        //$folder = $_POST["foldername"];
        $url = mysql_real_escape_string($_POST["url"]);
	//$url = $_POST["url"];
        $title = mysql_real_escape_string($_POST["title"]);
	//$title = $_POST["title"];
        $snippet = mysql_real_escape_string($_POST["snippet"]);
	//$snippet = $_POST["snippet"];
        $type = mysql_real_escape_string($_POST["type"]);
	//$type = $_POST["type"];

        // Future Variables
        //$user = "David Skrenta";

        $user = $userId;
        $uid = $userId;

	// FOLDERID
	$folderId = $folder . $uid;
	
        // Date
        $date = date("Y-m-d H:i:s");

        // Insert data into mysql 
	$sql="INSERT INTO $main_table (date, title, folder, user, uid, type, url, extra, snippet)VALUES('$date', '$title', '$folder', '$user', '$uid', '$type', '$url', '$folderId', '$snippet')";
        $result=mysql_query($sql);

        // Folder SQL
        $folderSQL = "INSERT INTO $folder_table (date, folder, user, uid, folderid)VALUES('$date', '$folder', '$user', '$uid', '$folderId')";
        $action = mysql_query($folderSQL);

        // If successfully insert data into database, displays message "Successful". 
        if($result)
        {
                // If Successfully...
                echo "<h1>Well done, you have made the world a better place.</h1>";
                echo "<p class=\"muted\">Reload the homepage to see your post live.</p>";
        }

        else
        {
                echo "<h1>Upload failed...</h1>";
                echo "<p class=\"muted\">Some error...</p>";
        }

        // If successfully insert data into database, displays message "Successful". 
        if($action)
        {
                // If Successfully...
                //echo "<h1>Well done, you have made the world a better place.</h1>";
                //echo "<p class=\"muted\">Reload the homepage to see your post live.</p>";
		header('Location: http://howlix.com/shred2');
        }

        else
        {
                echo "<h1>Upload failed...</h1>";
                echo "<p class=\"muted\">Some error...</p>";
        }
}
else
{
        // Not logged in
        // Header
        header('Location: http://howlix.com/shred2');
}

sqlEnd();

// Footers
//require 'footer.php'; 
?>
