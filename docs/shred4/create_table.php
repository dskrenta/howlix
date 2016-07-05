<?php
// Create connection
$con=mysqli_connect("localhost","wordpress","dtechblog777","wordpress");

// Check connection
if (mysqli_connect_errno($con))
{
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql = "
CREATE TABLE shredstore5
(
        ID int NOT NULL AUTO_INCREMENT,
        date timestamp,
        title varchar(255),
        folder varchar(255),
        user varchar(255),
        uid varchar(255),
        type varchar(255),
        url varchar(255),
	extra varchar(255),
        snippet text,
        PRIMARY KEY (ID)
)
";

$sql2 = "
CREATE TABLE shredstore6
(
        ID int NOT NULL AUTO_INCREMENT,
        date timestamp,
        title varchar(255),
        folder varchar(255),
        user varchar(255),
        uid varchar(255),
        type varchar(255),
        url varchar(255),
        extra varchar(255),
        snippet text,
	folderid varchar(255),
	profileimg varchar(255),
        PRIMARY KEY (ID)
)
";

$sql3 = "
CREATE TABLE shredfold4
(
        ID int NOT NULL AUTO_INCREMENT,
        date timestamp,
        folder varchar(255),
        user varchar(255),
        uid varchar(255),
        snippet text,
	folderid varchar(255),
        PRIMARY KEY (ID)
)
";

$sql4 = "
CREATE TABLE folderid
(
        ID int NOT NULL AUTO_INCREMENT,
        date timestamp,
        input varchar(255),
        folder varchar(255),
        PRIMARY KEY (ID)
)
";

// Execute query
if (mysqli_query($con, $sql4))
{
        echo "Table folderid created successfully\n";
}

else
{
        echo "Error creating table: " . mysqli_error($con);
}

?>
