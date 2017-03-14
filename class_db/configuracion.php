<?php
// Configuracion de los slider del login y del bloqueo de la session

include_once("../validation/conexion.php");

if(isset($_POST['val1']) && isset($_POST['val2']))
{
	echo $id = $_POST['val1'];
	echo "<br>";
	echo $valor = $_POST['val2'];
	insertLogin($id,$valor);
}
function insertLogin($id,$valor){
	$conexion = login();
	$sql = "update sr_config set estado_config='".$valor."' where id_config='".$id."'";
	$statement = mysql_query($sql)or die(mysql_error(). " Error al cargar la configuracion 1");
	if(mysql_affected_rows() == 1){
		  $valor = 1; 
	} 
	else
	{
		  $valor = 0;
	}
}

function config()
{
	$data = array();
	$conexion = login();

	if($conexion)
	{
		$sql = "select * from sr_config";
		$statement = mysql_query($sql)or die(mysql_error(). " Error al cargar la configuracion");
		$num = 0;
		while ($row = mysql_fetch_array($statement)) {
			$data['id'][$num]		= $row['id_config'];
			$data['pagina'][$num]  = $row['pages_config'];
			$data['accion'][$num]  = $row['estado_config'];

			//	echo "<br>";


			$num++;
		}

	}
	return $data;
}

function empresa()
{
	$conexion = login();

	$sql = "select * from sr_empresa";
	$statement = mysql_query($sql)or die(mysql_error(). " Error al cargar la info de la empresa");
	$row = mysql_fetch_array($statement);
	return $row;
}
?>