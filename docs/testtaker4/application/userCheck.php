<?php

include("DataStore.php");

$uuid = $_POST['uuid'];

$dataStoreUser = new DataStore("../users/" . $uuid . ".json");

if($dataStoreUser->get())
{
	$json = $dataStoreUser->get();
	$userJson = json_decode($json, true);
	$newUserArr = array("uuid" => $userJson["uuid"], "name" => $userJson["name"], "email" => $userJson["email"], "image_url" => $userJson["image_url"], "type" => $userJson["type"]);
	$newUserJson = json_encode($newUserArr);
	exit($newUserJson);
}
exit('false');

/*
if(file_exists("../users/" . $uuid . ".json"))
{
	$json = file_get_contents("../users/" . $uuid . ".json");
	exit($json);
}
else
{
	exit("false");
}
*/


?>
