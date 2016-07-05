<?php
// Create connection
$con = mysqli_connect("localhost","fundb","fundba838","fundb");

// Check connection
if (mysqli_connect_errno($con))
{
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql = "
CREATE TABLE videos
(
        ID int NOT NULL AUTO_INCREMENT,
        date timestamp,
        title varchar(255),
        snippet text,
        url varchar(255),
        image varchar(255),
        embed text(255),
        votes varchar(255),
        PRIMARY KEY (ID)
)
";

$sql2 = "
CREATE TABLE videos2
(
        ID int NOT NULL AUTO_INCREMENT,
        date timestamp,
        title text,
        snippet text,
        url varchar(255),
        image varchar(255),
        embed text(255),
        votes varchar(255),
        PRIMARY KEY (ID)
)
";

$sql3 = "
CREATE TABLE community
(
        ID int NOT NULL AUTO_INCREMENT,
        date timestamp,
        title text,
        snippet text,
        url varchar(255),
        image varchar(255),
        embed text(255),
        votes varchar(255),
        PRIMARY KEY (ID)
)
";

// Execute query
if (mysqli_query($con, $sql3))
{
        echo "Table videos2 created successfully\n";
}

else
{
        echo "Error creating table: " . mysqli_error($con);
}
?>
