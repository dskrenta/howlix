<?php
// ShredFeed functions.php

// SQL Functions

function sqlStart() {
	require 'sql.php';
}

function sqlQuery($sql) {
	$result = mysql_query($sql) or die(mysql_error());
}

function sqlEnd() {
	mysql_close();
}

// Other Functions

function check_url($url)
{
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $data = curl_exec($ch);
        $headers = curl_getinfo($ch);
        curl_close($ch);
        return $headers['http_code'];
}

?>
