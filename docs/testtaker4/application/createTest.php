<?php

/*
	Store test in tests directory
	Place test id in class directory for specific class
	Place test id in user file
	exit success or failure
*/

include("DataStore.php");

$json = $_POST['json'];
$testId = $_POST['testId'];
$uuid = $_POST['uuid'];
$classId = $_POST['classId'];

if($json != null && $testId != null && $uuid != null && $classId != null)
{
	$dataStoreTest = new DataStore("../tests/" . $testId . ".json");
        $dataStoreClass = new DataStore("../classes/" . $classId . ".json");
        $dataStoreUser = new DataStore("../users/" . $uuid . ".json");

        if($dataStoreClass->get() && $dataStoreUser->get() && $dataStoreTest->set($json))
        {
		$testData = json_decode($json, true);
                $testDataStored = array(
			"testId" => $testData[0]["testId"], 
			"testTitle" => $testData[0]["testTitle"], 
			"testDescription" => $testData[0]["testDescription"],
			"testDate" => $testData[0]["testDate"],
			"testStartTime" => $testData[0]["testStartTime"],
			"testEndTime" => $testData[0]["testEndTime"],
			"testTimeAllowed" => $testData[0]["testTimeAllowed"]
		);

		// Class Store
                $classJson = $dataStoreClass->get();
                $classData = json_decode($classJson, true);

		if($classData["tests"] == null)
                {
                        //$classData["tests"] = array($testId);
			$classData["tests"] = array($testDataStored);
                }
                else
                {
                        //array_push($classData["tests"], $testId);
			array_push($classData["tests"], $testDataStored);
                }

		// Add the tests for the students
		if($classData["students"] != null)
		{
			foreach($classData["students"] as $student)
			{
				$dataStoreStudent = new DataStore("../users/" . $student . ".json");
				if($dataStoreStudent->get())
				{
					$studentData = json_decode($dataStoreStudent->get(), true);
				
					if($studentData["tests"] == null)
					{
						$studentData["tests"] = array($testDataStored);
					}
					else
					{
						array_push($studentData["tests"], $testDataStored);
					}
					
					$newStudentJson = json_encode($studentData);
				
					if(!$dataStoreStudent->update($newStudentJson))
					{
						exit('failure');
					}
				
				}
			}
		}

                $newClassJson = json_encode($classData);

		// User Store
                $userJson = $dataStoreUser->get();
                $userData = json_decode($userJson, true);

                if($userData["tests"] == null)
                {
                        //$userData["tests"] = array($testId);
			$userData["tests"] = array($testDataStored);
                }
                else
                {
                        //array_push($userData["tests"], $testId);
			array_push($userData["tests"], $testDataStored);
                }

                $newUserJson = json_encode($userData);

                if($dataStoreClass->update($newClassJson) && $dataStoreUser->update($newUserJson))
                {
                        exit('success');
                }
                exit('failure');
        }
        exit('failure');

}
exit('failure');

/*
if(file_exists("../tests/" . $testId . ".json"))
{
	exit('failure');
}
else
{
	if($testId != null && $json != null && $uuid != null && $classId != null)
	{
		file_put_contents("../tests/" . $_POST['testId'] . ".json", $json);

		// add test to class in ../classes/
                $classJson = file_get_contents("../classes/" . $classId . ".json");
                $classData = json_decode($classJson, true);

                if($classData["tests"] == null)
                {
                        $classData["tests"] = array($testId);
                }
                else
                {
                        array_push($classData["tests"], $testId);
                }

                $newClassJson = json_encode($classData);
                file_put_contents("../classes/" . $classId . ".json", $newClassJson);
	}
}
*/

?>
