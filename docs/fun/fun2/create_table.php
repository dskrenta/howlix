<?php
// Create connection
$con=mysqli_connect("localhost","wordpress","dtechblog777","wordpress");

// Check connection
if (mysqli_connect_errno($con))
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Create table
//$sql="CREATE TABLE funstore2(
//	id int(4) NOT NULL auto_increment,
//	title varchar(255) NOT NULL default '',
//	url varchar(255) NOT NULL default '',
//	PRIMARY KEY (`id`)
//)
//TYPE=MyISAM AUTO_INCREMENT=2 ;
//";


$sql = "
CREATE TABLE funstore3
(
	numid int,
	title varchar(255),
	url varchar(255)
);
";


// Execute query
if (mysqli_query($con,$sql))
{
	echo "Table funstore3 created successfully\n";
}

else
{
	echo "Error creating table: " . mysqli_error($con);
}

?>
