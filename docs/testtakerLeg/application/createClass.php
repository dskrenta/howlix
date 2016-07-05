<?php

$json = $_POST['json'];
$classId = $_POST['classId'];
$uuid = $_POST['uuid'];

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

?>
