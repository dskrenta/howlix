<?php

$uuid = $_POST['uuid'];
$json = $_POST['json'];

if(file_exists("../users/" . $uuid . ".json"))
{
	exit('failure');
}
else
{
	if($uuid != null)
	{
		file_put_contents("../users/" . $uuid . ".json", $json);
		exit('success');
	}
}

?>
