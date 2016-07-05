<?php
// Create connection
$con=mysqli_connect("localhost","wordpress","dtechblog777","wordpress");

// Check connection
if (mysqli_connect_errno($con))
{
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql = "
CREATE TABLE shredstore4
(
	ID int NOT NULL AUTO_INCREMENT,
      	datetime timestamp,
       	title varchar(255),
        folder varchar(255),
      	username varchar(255),
	userid varchar(255),
	type varchar(255),
	url varchar(255),
	icon varchar(255),
	snippet text,
	PRIMARY KEY (ID)
)
";

//$sql = "
//CREATE TABLE userstore
//(
//        ID int NOT NULL AUTO_INCREMENT,
//        date TIMESTAMP,
//        uid VARCHAR(255),
//        user VARCHAR(255),
//	imgUrl VARCHAR(255),
//        PRIMARY KEY (ID)
//)
//";


// Execute query
if (mysqli_query($con, $sql))
{
        echo "Table shredstore4 created successfully\n";
}

else
{
        echo "Error creating table: " . mysqli_error($con);
}

?>
