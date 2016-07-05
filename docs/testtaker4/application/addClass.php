<?php

include("DataStore.php");

$classId = $_POST['classId'];
$uuid = $_POST['uuid'];

/*
	place class in class directory
	place classId in user file
	place testsId's from class file into user file with information
*/

if($classId != null && $uuid != null)
{
	$dataStoreClass = new DataStore("../classes/" . $classId . ".json");
	$dataStoreUser = new DataStore("../users/" . $uuid . ".json");

	if($dataStoreClass->get() && $dataStoreUser->get())
	{
		$classJson = $dataStoreClass->get();
		$classData = json_decode($classJson, true);

                $classDataStored = array(
                        "classId" => $classData["classId"],
                        "classTitle" => $classData["classTitle"],
                        "classDescription" => $classData["classDescription"]
                );

		if($classData["students"] == null)
        	{
        		$classData["students"] = array($uuid);
     		}       
      		else    
     		{
         		array_push($classData["students"], $uuid);
    		}      
 
       		$newClassJson = json_encode($classData);
		//$dataStoreClass->update($newClassData);

		//$dataStoreUser = new DataStore("../users/" . $uuid . ".json");
	
		$userJson = $dataStoreUser->get();
		$userData = json_decode($userJson, true);

       		if($userData["classes"] == null)
     		{
    			$userData["classes"] = array($classDataStored);
       		}
       		else
     		{
           		array_push($userData["classes"], $classDataStored);
        	}
	
		// add test information from class added into student json
		if($classData["tests"] != null)
		{
			foreach($classData["tests"] as $test)
			{
				if($userData["tests"] == null)
				{
					$userData["tests"] = array($test);
				}
				else
				{
					array_push($userData["tests"], $test);
				}
			}
		}

      		$newUserJson = json_encode($userData);
		//$dataStoreUser->update($newUserJson);

		if($dataStoreClass->update($newClassJson) && $dataStoreUser->update($newUserJson))
		{
        		//exit($newUserJson);
			exit('success');
		}
		exit('failure');
	}
	exit('failure');

}
exit('failure');

/*
if(!file_exists("../classes/" . $classId . ".json"))
{
	exit('failure');
}
else
{
	if($classId != null && $uuid != null)
	{
		// add student to class in ../classes/
		$classJson = file_get_contents("../classes/" . $classId . ".json");
                $classData = json_decode($classJson, true);
                
		if($classData["students"] == null)
		{
			$classData["students"] = array($uuid);
		}
		else
		{
			array_push($classData["students"], $uuid);
		}
	
		$newClassJson = json_encode($classData);
                file_put_contents("../classes/" . $classId . ".json", $newClassJson);

		// add classId to student in ../users/
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
