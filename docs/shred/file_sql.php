<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="">

    <title>ShredFeed</title>

    <!-- Core CSS -->
    <link href="http://harvix.com/search/css2/bootstrap.css" rel="stylesheet">

    <!-- Custom Styles -->
    <link href="http://harvix.com/flappy/narrow.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

<?php
// Vars
$host="localhost"; // Host name 
$username="wordpress"; // Mysql username 
$password="dtechblog777"; // Mysql password 
$db_name="wordpress"; // Database name 
$tbl_name="funstore5"; // Table name 

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
if($result)
{
        // If Successfully...
        echo "<h1>Well done, you have made the world a better place.</h1>";
        echo "<p class=\"muted\">Reload the homepage to see your post live.</p>";
}

else
{
        echo "<h1>Upload failed...</h1>";
        echo "<p class=\"muted\">Check for unusual charecters in the title.</p>";
}
?>

<?php
// close connection 
mysql_close();
?>

</body>
</html>
