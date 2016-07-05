<?php

$json = $_POST['json'];

if(file_exists("../users/" . $_POST['username'] . ".json"))
{
	exit('failure');
}
else
{
	if($_POST['username'] != null)
	{
		file_put_contents("../users/" . $_POST['username'] . ".json", $json);
		exit('success');
	}
}



/*
include('classes/user.php');

$user = new User($_POST['username'], $_POST['email'], $_POST['password'], $_POST['first_name'], $_POST['last_name'], $_POST['type']);

$s = serialize($user);
file_put_contents("../users/" . $_POST['username'], $s);
*/

?>
