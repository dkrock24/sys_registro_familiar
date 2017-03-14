<?php
include_once("../validation/conexion.php");
$conexion = login();

function selectPartidasGeneradas(){
	$sql = "select * from sr_generar_partidas";
	$statement = mysql_query($sql)or die(mysql_error(). " Erro al cargar los menus");
	return $statement;
}

function selectMenus()
{
	$sql = "select * from sr_menu";
	$statement = mysql_query($sql)or die(mysql_error(). " Erro al cargar los menus");
	return $statement;
}

function selectSubMenus($id)
{

	$sql = "select * from sr_submenu where id_menu = '".$id."' ";
	$statement = mysql_query($sql)or die(mysql_error(). " Erro al cargar SubMenus");
	return $statement;
}

function selectMenusRol($rol)
{
	$sql = "select M.icon_menu,M.id_menu,M.estado_menu, M.nombre_menu,R.nombre_rol,R.id_rol,A.id_rol,			A.id_menu,A.estado 
			from  sr_menu as M  
			left join sr_accesos as A
			on M.id_menu = A.id_menu
			left join sr_roles as R
			on R.id_rol = A.id_rol
			where R.id_rol='".$rol."'";
	$statement = mysql_query($sql)or die(mysql_error(). " Erro al cargar los menus");
	return $statement;
}

function menuPadre($id)
{
	$sql = "select M.nombre_menu from sr_submenu as S 
			left join sr_menu as M 
			on S.id_menu=M.id_menu
	 		where S.id_menu = '".$id."' Limit 1 ";
	$statement = mysql_query($sql)or die(mysql_error(). " Erro al cargar SubMenus");
	return $statement;
}

function roles()
{
	$sql = "select * from sr_roles";
	$statement = mysql_query($sql)or die(mysql_error(). " Erro al cargar Roles");
	return $statement;
}
function cargos()
{
	$sql = "select * from sr_cargos";
	$statement = mysql_query($sql)or die(mysql_error(). " Erro al cargar los Cargos");
	return $statement;
}