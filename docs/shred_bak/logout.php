<?php
// COOKIE
//setcookie("uid", "", time()-3600);

if(isset($_COOKIE['uid'])) {
	unset($_COOKIE['uid']);
  	setcookie('uid', '', time() - 216000); // empty value and old timestamp
}

unset($_COOKIE['uid']);
setcookie('uid', '', time() - 216000); // empty value and old timestamp

// SESSION
session_destroy();

// Redirect
header('Location: http://howlix.com/shred2');
?>
