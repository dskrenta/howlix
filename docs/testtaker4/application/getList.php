<?php

include("DataStore.php");

$uuid = $_GET['uuid'];
$type = $_GET['type'];

if($uuid != null && $type != null)
{
	$dataStoreUser = new DataStore("../users/" . $uuid . ".json");
	
	if($dataStoreUser->exists())
	{	
		$userJson = $dataStoreUser->get();
		$userData = json_decode($userJson, true);

		if($type == "tests")
		{
			exit(json_encode($userData["tests"]));
		}
		elseif($type == "classes")
		{
			exit(json_encode($userData["classes"]));
		}
		else
		{
			exit('failure');
		}
	}
	exit('failure');
}

?>
