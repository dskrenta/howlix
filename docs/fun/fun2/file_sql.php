<?php
// Vars
$host="localhost"; // Host name 
$username="wordpress"; // Mysql username 
$password="dtechblog777"; // Mysql password 
$db_name="wordpress"; // Database name 
$tbl_name="funstore"; // Table name 

// Connect to server and select database.
mysql_connect("localhost", "wordpress", "dtechblog777", "wordpress")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

// Title POST Retrival 
$title = $_POST["title"];
//echo "Title: " . $title . "<br>";

// Get The Media Url
$url = $_POST["url"];
//echo "Url: " . $url . "<br>";

// Insert data into mysql 
$sql="INSERT INTO $tbl_name (title, url)VALUES('$title', '$url')";
$result=mysql_query($sql);

// If successfully insert data into database, displays message "Successful". 
if($result){
	// If Successfully...
        //header("location:login_success.php");
	echo "Well Done\n";
}

else {
	echo "Error, Information not inserted. <br>";
}
?>

<?php
// close connection 
mysql_close();
?>
