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

if(isset($_COOKIE["uid"]))
{
	$userId = $_COOKIE["uid"];

        // GET POST Data
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

        // Date
        $date = date("Y-m-d H:i:s");

        // Insert data into mysql 
        //$sql="INSERT INTO $tbl_name (date, title, folder, user, type, url, snippet)VALUES('$date', '$title', '$folder', '$user', '$type', '$url', '$snippet')";
        
	//$sql="INSERT INTO $main_table (datetime, title, folder, username, userid, type, url, icon, snippet)VALUES('$date', '$title', '$folder', '$user', '$userid', '$type', '$url', '$icon', '$snippet')";
       
	// FOLDERID
	$fid = $folder . $userId; 

	 $sql="INSERT INTO $main_table (date, title, folder, user, uid, type, url, extra, snippet)VALUES('$date', '$title', '$folder', '$user', '$uid', '$type', '$url', '$fid', '$snippet')";
        $result=mysql_query($sql);

        // If successfully insert data into database, displays message "Successful". 
        if($result)
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
