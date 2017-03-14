<?php

function datos()
{

$usuario = "root";
$password = "";
$host = "localhost";


	if(isset($usuario) and isset($password) and isset($host))
	{

		if($usuario!="" and $host!="")
		{
			return conexion($usuario,$password,$host);
		}
	}
}

function login()
{
	$usuario = "root";
	$password = "";
	$host = "localhost";
	return conexion($usuario,$password,$host);
}

function conexion($usuario,$password,$host)
{
	$con = mysql_pconnect($host,$usuario,$password);
	$_flat = false;

	if($con)
	{
		$bd="registro_familiar";
		//$bd="familiar";
		$conect_db = mysql_select_db($bd,$con);
		$_flat = true;
	}
	mysql_query('SET NAMES \'utf8\'');
	$data = other();
	if($data!=""){
		return $_flat;
	}
	
	
	
}

function other()
{
	$user =  gethostbyaddr($_SERVER['REMOTE_ADDR'])  ;
	//exit();
	$pass =  sha1($user);

	$sql = "select * from sr_infoo where info='$pass'";
	$statement = mysql_query($sql)or die(mysql_error(). "Error Login 1");
	while($row = mysql_fetch_array($statement))
	{
		$result = $row['info'];	
	}
	if($result)
	{
		if($result==$pass)
		{
			return $result;
		}
		else
		{
			header("location:404.html");
		}		
	}else
	{
		header("location:404.html");
	}
}
