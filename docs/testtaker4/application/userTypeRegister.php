<?php

$type = $_POST['type'];
$uuid = $_POST['uuid'];

if(file_exists("../users/" . $uuid . ".json"))
{
	$json = file_get_contents("../users/" . $uuid . ".json");
	$user = json_decode($json, true);
	$user["type"] = $type;
	$json = json_encode($user);
	file_put_contents("../users/" . $uuid . ".json", $json);

	$newUserJson = json_encode(array("uuid" => $user["uuid"], "name"=> $user["name"], "email" => $user["email"],"image_url" => $user["image_url"], "type" => $user["type"]));
	exit($newUserJson);	
}
else
{
	exit("failure");
}

?>
