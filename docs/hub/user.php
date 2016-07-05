<?php
$user = $_GET["user"];

session_start();
// store session data
$_SESSION['user']="$user";

?>
