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
        $folder = $_POST["foldername"];
        $url = $_POST["url"];
        $title = $_POST["title"];
        $snippet = $_POST["snippet"];
        $type = $_POST["type"];

        // Future Variables
        //$user = "David Skrenta";

        $user = $userId;
        $uid = $userId;

        // Date
        $date = date("Y-m-d H:i:s");

        // Insert data into mysql 
        //$sql="INSERT INTO $tbl_name (date, title, folder, user, type, url, snippet)VALUES('$date', '$title', '$folder', '$user', '$type', '$url', '$snippet')";
        
	//$sql="INSERT INTO $main_table (datetime, title, folder, username, userid, type, url, icon, snippet)VALUES('$date', '$title', '$folder', '$user', '$userid', '$type', '$url', '$icon', '$snippet')";
        
	 $sql="INSERT INTO $main_table (date, title, folder, user, uid, type, url, snippet)VALUES('$date', '$title', '$folder', '$user', '$uid', '$type', '$url', '$snippet')";
        $result=mysql_query($sql);

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
