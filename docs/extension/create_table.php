<?php
// Create connection
$con = mysqli_connect("localhost","fundb","fundba838","fundb");

// Check connection
if (mysqli_connect_errno($con))
{
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql = "
CREATE TABLE content
(
        ID int NOT NULL AUTO_INCREMENT,
        date timestamp,
        title varchar(255),
        snippet text,
        url varchar(255),
	ref varchar(255),
	likes varchar(255),
        PRIMARY KEY (ID)
)
";

// Execute query
if (mysqli_query($con, $sql))
{
        echo "Table content created successfully\n";
}

else
{
        echo "Error creating table: " . mysqli_error($con);
}
?>
