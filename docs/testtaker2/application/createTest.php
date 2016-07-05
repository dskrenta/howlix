<?php

include('sse.php');

$json = $_POST['json'];

if(file_exists("../tests/" . $_POST['testId'] . ".json"))
{
	exit('failure');
}
else
{
	if($_POST['testId'] != null && $_POST['username'] != null)
	{
		file_put_contents("../tests/" . $_POST['testId'] . ".json", $json);
		$json = file_get_contents("../users/" . $_POST['username'] . ".json");
		$data = json_decode($json, true);
		array_push($data["tests"], $_POST['testId']);
		$user_json = json_encode($data);
		sse($user_json);
		file_put_contents("../users/" . $_POST['username'] . ".json", $user_json);
		exit('success');
	}
}

?>
