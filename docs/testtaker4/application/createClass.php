<?php

include("DataStore.php");

$json = $_POST['json'];
$classId = $_POST['classId'];
$uuid = $_POST['uuid'];

if($json != null && $classId != null && $uuid != null)
{
	$dataStoreClass = new DataStore("../classes/" . $classId . ".json");
	$dataStoreClass->set($json);       
 
	$dataStoreUser = new DataStore("../users/" . $uuid . ".json");

        if($dataStoreUser->get())
        {
                $userJson = $dataStoreUser->get();
                $userData = json_decode($userJson, true);	

		$classData = json_decode($json, true);
		$classDataStored = array(
			"classId" => $classData["classId"], 
			"classTitle" => $classData["classTitle"], 
			"classDescription" => $classData["classDescription"]
		);
	
		if($userData["classes"] == null)
                {
                        //$userData["classes"] = array($classId);
			$userData["classes"] = array($classDataStored);
                }
                else
                {
                        //array_push($userData["classes"], $classId);
			array_push($userData["classes"], $classDataStored);
                }

		$newUserJson = json_encode($userData);
		$dataStoreUser->update($newUserJson);
	
		// revision point - check notes	
		//exit($newUserJson);
		exit('success');
	}
	exit('failure');
}
exit('failure');

/*
if(file_exists("../classes/" . $classId . ".json"))
{
	exit('failure');
}
else
{
	if($classId != null && $json != null)
	{
		file_put_contents("../classes/" . $classId . ".json", $json);

		$userJson = file_get_contents("../users/" . $uuid . ".json");
                $userData = json_decode($userJson, true);
                
		if($userData["classes"] == null)
		{
			$userData["classes"] = array($classId);
		}
		else
		{
			array_push($userData["classes"], $classId);
		}

                $newUserJson = json_encode($userData);
                file_put_contents("../users/" . $uuid . ".json", $newUserJson);
	
		exit($newUserJson);
	}
}
*/

?>
