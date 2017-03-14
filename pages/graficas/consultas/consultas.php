<?php
include_once("../../validation/conexion.php");
$conexion = login();


function nacimiento()
{
	$sql = "select * from (
select count(*) as total, MONTH(fecha) as fecha from sr_pnacimiento 

group by MONTH(fecha)

order by fecha desc
limit 5) a
order by fecha asc";
	$statement = mysql_query($sql)or die(mysql_error(). " Erro 1");



	return $statement;
}

function matrimonio()
{
	$sql = "select * from (
select count(*) as total, MONTH(fecha_creacion) as fecha from sr_pmatrimonio

group by MONTH(fecha_creacion)

order by fecha desc
limit 5) a
order by fecha asc";
	$statement = mysql_query($sql)or die(mysql_error(). " Erro 1");



	return $statement;
}
function divorcio()
{
	$sql = "select * from (
select count(*) as total, MONTH(fecha_creaccion) as fecha from sr_pdivorcio

group by MONTH(fecha_creaccion)

order by fecha desc
limit 5) a
order by fecha asc
";
	$statement = mysql_query($sql)or die(mysql_error(). " Erro 1");



	return $statement;
}
?>