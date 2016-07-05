<html>
<head>
</head>
<body>
<?php
if(isset($_COOKIE["uid"]))
{
        $userId = $_COOKIE["uid"];

	// GET POST Data
	$folder = $_POST["foldername"];
	$url = $_POST["url"];
	$title = $_POST["title"];
	$snippet = $_POST["snippet"];
	$description = $_POST["description"];
	$type = $_POST["type"];


	// Future Variables
	//$user = "David Skrenta";
		
	$user = $userId;
	$userid = $userId;
	$icon = ""; 

	// Date
	$date = date("Y-m-d H:i:s");

	// Vars
	$host="localhost"; // Host name 
	$username="wordpress"; // Mysql username 
	$password="dtechblog777"; // Mysql password 
	$db_name="wordpress"; // Database name 
	$tbl_name="shredstore4"; // Table name 
	$tableFolder = "shredfold"; // Table folder name

	// Connect to server and select database.
	mysql_connect("localhost", "wordpress", "dtechblog777", "wordpress")or die("cannot connect");
	mysql_select_db("$db_name")or die("cannot select DB");

	// Insert data into mysql 
	$sql="INSERT INTO $tbl_name (datetime, title, folder, username, userid, type, url, icon, snippet)VALUES('$date', '$title', '$folder', '$user', '$userid', '$type', '$url', '$icon', '$snippet')";
	$result=mysql_query($sql);

	// Folder SQL
	$folderSQL = "INSERT INTO $tableFolder (date, folder, user, description)VALUES('$date', '$folder', '$user', '$description')";
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
        	echo "<h1>Well done, you have made the world a better place.</h1>";
        	echo "<p class=\"muted\">Reload the homepage to see your post live.</p>";
	}

	else
	{
        	echo "<h1>Upload failed...</h1>";
        	echo "<p class=\"muted\">Some error...</p>";
	}

	// Close Connection 
	mysql_close();
}
else
{
	// Not logged in
        // Header
        header('Location: http://howlix.com/shred/real2/shredfb2.php');
}
?>
</body>
</html>
