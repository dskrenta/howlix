<?php

$key = $_GET['key'];

if($key == "home")
{
	include('application/views/index.html');
}
elseif($key == "login")
{
	include('application/views/login.html');
}
elseif($key == "register")
{
	include('application/views/register.html');
}
elseif($key == "dash")
{
	include('application/views/dash.html');
}
elseif($key == "student_dash")
{
	include('application/views/student_dash.html');
}
elseif($key == "teacher_dash")
{
	include('application/views/teacher_dash.html');
}
elseif($key == "logout")
{
	include('application/views/logout.html');
}
elseif($key == "createTest")
{
	include('application/views/createTest.html');
}

?>
