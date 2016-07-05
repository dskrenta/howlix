<?php

//include("DataStore.php");

$uuid = $_POST['uuid'];

/*
$dataStoreUser = new DataStore("../users/" . $uuid . ".json");

if($dataStoreUser->get())
{
	$json = $dataStoreUser->get();
	$userJson = json_decode($json, true);
	$newUserArr = array();
}
exit('false');
*/

if(file_exists("../users/" . $uuid . ".json"))
{
	$json = file_get_contents("../users/" . $uuid . ".json");
	exit($json);
}
else
{
	exit("false");
}



?>
