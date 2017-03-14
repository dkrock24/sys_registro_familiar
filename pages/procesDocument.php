<?php

include_once("../validation/conexion.php");
require("doc2txt.class.php");
$conexion = login();

//----------- codigo para obtner la ruta donde estan los files a procesar
$sql = "select pd.path_final as name from sr_tipo_partida_digital pd where pd.id_tipo =".$_POST['type'];
	$statement = mysql_query($sql)or die(mysql_error(). "Erro al cargar el perfil");
	$row = mysql_fetch_array($statement);
	
//----------Finalizacion del codido de obtencion de path por categoria

//--- concatenacion de path final-------------------------------	
	$pathactual = $row["name"];
	$path_final = $pathactual.$_POST["axo"]."/";
//-----------Path final para usar en la funcion Glob

//----- Glob para recorrer todos los files y obtener la data.
$archivos= glob($path_final.'*.*');
$countFile = 1;
	foreach ($archivos as $archivo)
	{
		$filename = utf8_encode($archivo);

		$nameTemp = basename($filename, ".doc");// nombre del file
		$dirnameTemp = dirname($filename);// se obtiene la ruta del file
		$fecha_creacion = date('Y-m-d H:i:s');// fecha de creacion
		
		//---- Se construye el path con el nombre del file correcto
		$type = $_POST['type'];
		$axo = $_POST['axo'];
 
		    if (file_exists(utf8_decode($filename))) 
		    {        

			    if ( ($fh = fopen(utf8_decode($filename), 'r')) !== false ) 
			    {
				    $headers = fread($fh, 0xA00);
				    $n1 = ( ord($headers[0x21C]) - 1 );
				    $n2 = ( ( ord($headers[0x21D]) - 8 ) * 256 );
				    $n3 = ( ( ord($headers[0x21E]) * 256 ) * 256 );
				    $n4 = ( ( ( ord($headers[0x21F]) * 256 ) * 256 ) * 256 );

				    $textLength = ($n1 + $n2 + $n3 + $n4);
				    $extracted_plaintext = fread($fh, $textLength);
				    $text = utf8_encode(nl2br($extracted_plaintext));
				 
				    preg_match_all("/[\._a-zA-Z0-9-]+@[\._a-zA-Z0-9-]+/i", utf8_encode($extracted_plaintext), $matches);


		     
				    $sql = "insert into sr_partidas_digitales(nombre_partida,tipo_partida,axo_partida,texto_partida,fecha_creacion)
					values('$nameTemp',$type,$axo,'$text','$fecha_creacion')";
					mysql_query($sql) or die(mysql_error());

				
				}

		    }

		$countFile = $countFile+1;			
	}

	echo "true";
//------------------Fin de la funcion Glob-------------------------		
	
?>