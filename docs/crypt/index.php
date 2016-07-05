<?php

$pass = "david";


// SHA-2 Encryption
//$hash = hash('sha256', $pass); - creates 256 bit hash.

$hash = crypt($pass);

echo $hash;

?>
