<?php

session_start();

if(isset($_SESSION['data']) || isset($_SESSION['usuario'])){
	logaut();
}
else
{
	logaut();
	header('Location: '.'login.php');
}

function logaut()
{
	unset($_SESSION['data']);
	unset($_SESSION['usuario']);
	session_destroy();
	header('Location: '.'login.php');
}
//session_destroy();
?>