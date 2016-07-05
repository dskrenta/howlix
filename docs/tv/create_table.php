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

$sql4 = "
CREATE TABLE users
(
        ID int NOT NULL AUTO_INCREMENT,
        date timestamp,
        uid varchar(255),
        name varchar(255),
        email varchar(255),
        img varchar(255),
        points varchar(255),
	extra varchar(255),
        PRIMARY KEY (ID)
)
";

$sql5 = "
CREATE TABLE users2
(
        ID int NOT NULL AUTO_INCREMENT,
        date timestamp,
        uid varchar(255),
        name varchar(255),
        email varchar(255),
	username varchar(255),
	password varchar(255),
        img varchar(255),
        points varchar(255),
        extra varchar(255),
	bio text,
        PRIMARY KEY (ID)
)
";

$sql6 = "
CREATE TABLE images
(
        ID int NOT NULL AUTO_INCREMENT,
        date timestamp,
        title text,
        snippet text,
        url varchar(255),
        image varchar(255),
        votes varchar(255),
        PRIMARY KEY (ID)
)
";

$sql7 = "
CREATE TABLE media
(
        ID int NOT NULL AUTO_INCREMENT,
        date timestamp,
        data blob,
        PRIMARY KEY (ID)
)
";

$sql8 = "
CREATE TABLE media2
(
        ID int NOT NULL AUTO_INCREMENT,
        date timestamp,
        data blob,
        PRIMARY KEY (ID)
)
";

$sql9 = "
CREATE TABLE media_images
(
	ID int NOT NULL AUTO_INCREMENT,
	date timestamp,
	title varchar(255),
	images blob,
	PRIMARY KEY (ID)
)
";

$sql10 = "
CREATE TABLE images
(
        id int NOT NULL AUTO_INCREMENT,
        date timestamp,
        data blob,
        PRIMARY KEY (id)
)
";

$sql11 = "
CREATE TABLE images2
(
        id int NOT NULL AUTO_INCREMENT,
	title varchar(255),
        date timestamp,
        data blob,
        PRIMARY KEY (id)
)
";

$sql12 = "
CREATE TABLE imageStore
(
        id int NOT NULL AUTO_INCREMENT,
        date timestamp,
	title varchar(255),
        images blob,
        PRIMARY KEY (id)
)
";

// Execute query
if (mysqli_query($con, $sql12))
{
        echo "Table created successfully\n";
}

else
{
        echo "Error creating table: " . mysqli_error($con);
}
?>
