<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php
include_once("../../validation/conexion.php");
$conexion = login();

if($conexion)
{
	//return select();
}

function lista_bk()
{
	$sql = "select * from log_backups order by fecha_bk desc";
	$statement = mysql_query($sql)or die(mysql_error(). " Erro al cargar los BK");
	return $statement;
}
