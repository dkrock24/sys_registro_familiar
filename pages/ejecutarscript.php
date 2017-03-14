<?php
include_once("../validation/conexion.php");
require("doc2txt.class.php");
$conexion = login();
//VARIABLES
/*
Archivos para generacion de script para el proceso de 
almacenamiento y mantenimiento de documentos
digitales en la alcaldia. estos script seran llamados 
mendiante script Jquey y AJAX para poder
capturar de forma dinamica.

 De igual forma se es requerid utilizar estas funciones se pueden acceder a ellas. 

*/

if(isset($_POST['action']) && !empty($_POST['action'])) 
{
    $action = $_POST['action'];
    switch($action) {
        case 'MoveFile' : MoveFile();break;
        case 'SaveTypeDG' : SaveTypeDG();break;
        case 'CreateFolder' : CreateFolder();break;
        case 'VerificarFolder' : VerificarFolder();break;
        case 'ProceDoc' : ProceDoc();break;
        case 'updatePartida' : updatePartida();break;
 		case 'insertMarginacion' : insertMarginacion();break;
    }
}
else
{
	echo "Funcion no encontrada";
}

//---------------- Funciona para mover documentos al sistema

function MoveFile()
{
	
	//--- Codigo de procesamiento de files
	$type = $_POST['type'];
	$axo = $_POST['axo'];
	$pathOrigin = $_POST['path'];
	$bad_chars ="\\";
	$pathOrigin = str_replace($bad_chars, '/', $pathOrigin);

	$sql = "select scf.name_foder, dp.path_file,dp.path_final from sr_tipo_partida_digital dp
				inner join sr_config_files scf where dp.id_tipo=".$type;
	$statement = mysql_query($sql)or die(mysql_error(). "Erro al cargar el perfil");
	$row = mysql_fetch_array($statement);

	$path_final = $row['path_final'];
	$pathFinal = $path_final.$axo."/";

	$pathOrigin=$pathOrigin."/";
	$destino = $pathFinal;

	if(!file_exists($destino))
	{
		mkdir ($destino);
		$contFiles = 0;

			$archivos= glob($pathOrigin.'*.doc*');
			foreach ($archivos as $archivo)
			{
				$archivo_copiar= str_replace($pathOrigin, $destino, $archivo);
				copy($archivo, $archivo_copiar);
				$contFiles = $contFiles+1;	

				$namefile = basename($archivo);
					
			}
			
			echo $contFiles;	
		
	}
	else
	{


		$carpeta = @scandir($destino);
		if (count($carpeta) > 2)
		{
		    echo "dir"; exit();
		}
		else
		{
			$contFiles = 0;
			$archivos= glob($pathOrigin.'*.doc*');
			foreach ($archivos as $archivo)
			{
				$archivo_copiar= str_replace($pathOrigin, $destino, $archivo);
				copy($archivo, $archivo_copiar);
				$contFiles = $contFiles+1;	

				$namefile = basename($archivo);
					
			}
			
			echo $contFiles;	   
		}
	} 

		
}


function ProceDoc()
{
	
	//--- Codigo de procesamiento de files
	$type = $_POST['type'];
	$axo = $_POST['axo'];
	$fecha_creacion = date('Y-m-d H:i:s');

	$sql = "select scf.name_foder, dp.path_file,dp.path_final from sr_tipo_partida_digital dp
				inner join sr_config_files scf where dp.id_tipo=".$type;
	$statement = mysql_query($sql)or die(mysql_error(). "Erro al cargar el perfil");
	$row = mysql_fetch_array($statement);

	$path_final = $row['path_final'];
	$pathFinal = $path_final.$axo."/";

	$archivos= glob($pathFinal.'*.*');
	foreach ($archivos as $archivo)
	{
		$namefile = utf8_encode(basename($archivo));
		$sql = "insert into actas_digitales (nombre_completo,axo,tipo,path,fecha_creacion)
			values('$namefile','$axo','$type','$pathFinal','$fecha_creacion')";
			mysql_query($sql) or die(mysql_error());
			
	}
	
	echo "true";
		
}

function SaveTypeDG()
{
	$nombre = $_POST['name'];
	$descripcion = $_POST['descripcion'];
	$folder = $_POST['folder'];
	$estatus = $_POST['estatus'];
	$fecha_creacion = date('Y-m-d H:i:s');
	$pathraiz = $_SERVER['DOCUMENT_ROOT'];

	$sql = "select scf.name_foder from sr_config_files scf";
	$statement = mysql_query($sql)or die(mysql_error(). "Erro al cargar el perfil");
	$row = mysql_fetch_array($statement);

	$nameFolder = $row['name_foder'];

	$pathFinal = $pathraiz."/sfamiliar/".$nameFolder."/".$folder."/";
	if(!file_exists($pathFinal))
	{
		mkdir ($pathFinal);
		$sql = "insert into sr_tipo_partida_digital (nombre,descripcion,path_file,path_final,estado,fecha_creacion)
			values('$nombre','$descripcion','$folder','$pathFinal','$estatus','$fecha_creacion')";
			mysql_query($sql) or die(mysql_error());
		echo "true";
	}
	else
	{
		echo "false";
	} 
}

function CreateFolder()
{
	$namefolder = $_POST['folderName'];
	$datetime = date('Y-m-d H:i:s');
	$pathraiz = $_SERVER['DOCUMENT_ROOT'];

	$pathFinal = $pathraiz."/sfamiliar/".$namefolder."/";
	if(!file_exists($pathFinal))
	{
		mkdir ($pathFinal);
		$sql = "insert into sr_config_files (name_foder,date_created)
			values('$namefolder','$datetime')";
		mysql_query($sql) or die(mysql_error());
		echo "true";
	}
	else
	{
		echo "false";
	} 
}

function VerificarFolder()
{

	$consulta="select scf.name_foder from sr_config_files scf";
	$resultado=mysql_query($consulta) or die (mysql_error());
	if (mysql_num_rows($resultado)>0)
	{
		echo "true";
	} 
	else 
	{
	 	echo "false";
	}

}

function updatePartida()
{

//--------------Codigo para actualizar el registro del acta ----------------------
	$texto =  mysql_escape_string($_POST['textActa']);
	$idActa = $_POST['idActa'];
	$idUser = $_POST['userModifico'];

	$datetime = date('Y-m-d H:i:s');

	$sql 	= "update sr_partidas_digitales set 
					texto_partida='".$texto."',
					fecha_modificacion='".$datetime."' 
					where id_partida ='".$idActa."'";
	$statement = mysql_query($sql)or die(mysql_error(). " Actualizacion realizada con exito");

//-------------------Fin del codigo--------------------------------------

//----------------Codigo para insertar el log de modificaciones----------------

	  $sql = "insert into sr_log_modificaciones_actas(user_id,acta_digital_id,fecha_modificacion)
		values($idUser,$idActa,'$datetime')";
		mysql_query($sql) or die(mysql_error());

//-----------fin del codigo--------------------------------------------------	
}

function insertMarginacion()
{

	$marginacion = mysql_escape_string($_POST['textMarginacion']);
	$idActa = $_POST['idActa'];
	$iduser = $_POST['iduser'];
	$datetime = date('Y-m-d H:i:s');
	
//----------------Codigo para insertar el log de modificaciones----------------

	  $sql = "insert into sr_marginacion_actas_digitales(id_acta_digital,id_usuario,text_marginacion,fecha_marginacion)
		values($idActa,$iduser,'$marginacion','$datetime')";
		mysql_query($sql) or die(mysql_error());

//-----------fin del codigo--------------------------------------------------	
}
 
?>