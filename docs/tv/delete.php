<?php
require 'sql.php';

$id = $_GET["id"];

$sql = "DELETE FROM $images_table WHERE ID='$id'";
$result = mysqli_query($conn, $sql) or die(mysql_error($conn));

//header('Location: table.php');
?>
