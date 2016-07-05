<?php

$username = $_POST['username'];
$password = $_POST['password'];

if(file_exists("../users/" . $username . ".json"))
{
	$json = file_get_contents("../users/" . $username . ".json");
	$obj = json_decode($json);
	if($obj->password == $password)
	{
		exit($json);
	}
	else
	{
		exit("failure");
	}
}
else
{
	exit("failure");
}




?>
