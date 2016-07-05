<?php

include("DataStore.php");

$uuid = $_GET['uuid'];
$userType = $_GET['userType'];
$testId = $_GET['testId'];

if($uuid != null && $type != null && $testId != null)
{
	if($userType == 0)
	{
		$dataStoreTest = new DataStore("../tests/" . $testId . ".json");
	
		if($dataStoreTest->exists())
		{	
			$testJson = $dataStoreTest->get();
			$testData = json_decode($testJson, true);

			$dataStoreClass = new DataStore("../classes/" . $testData[0]["class"] . ".json");
	
			if($dataStoreClass->exists())
			{
				$classJson = $dataStoreClass->get();
				$classData = json_decode($classJson, true);

				if(in_array($uuid, $classData["students"]))
				{
					exit(json_encode($testData));
				}
				exit('failure');
			}
			exit('failure');
		}
		exit('failure');
	}
	exit('failure');
}
exit('failure');

?>
