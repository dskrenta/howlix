<?php

function sse($data)
{
	header('Content-Type: text/event-stream');
	header('Cache-Control: no-cache');

	echo "data:" . $data;
	flush();	
}

?>
