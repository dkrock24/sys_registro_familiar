<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<?php
include_once("../validation/conexion.php");
$conexion = login();
//VARIABLES

$accion							=	$_POST['accion'];


if($accion=="update")
{
	updateData();
}
if($accion=="insert")
{
	insertData();
}
if($accion == "updatePMatrimonio"){
	updatePMatrimonio();
}
if($accion=="informacion_empresa")
{
	updateInfoEmpresa();
}
if($accion=="insert_pmatrimonio")
{
	InsertPmatrimonio();
}
if($accion == "insert_partida_defuncion")
{
	InsertPDefuncion();
}
if($accion == "update_partida_defuncion")
{
	UpdatePDefuncion();
}
if($accion == "insert_marginacion_acta")
{
	insert_marginacion_acta();
}
if($accion == "deleteActa")
{
	deleteActa();
}

if($accion=='insert_marginacion')
{
	
	echo $fecha =  date("Y-m-d");echo "<br>";
	echo $id_tipo_partida	=	$_POST['id_tipo_partida'];echo "<br>";
	echo $id_partida 		=	$_POST['id_partida'];echo "<br>";
	echo $id_usuario			=	$_POST['id_usuario'];echo "<br>";
	//echo $fecha_marginacion 	=	$_POST['fecha_marginacion'];echo "<br>";
	echo $texto_marginacion 	=	$_POST['texto_marginacion'];echo "<br>";

	$sql = "insert into sr_marginaciones (id_tipo_partida,id_partida,id_usuario,texto_marginacion,fecha_marginacion)
			values('$id_tipo_partida','$id_partida','$id_usuario','$texto_marginacion','$fecha')";
	mysql_query($sql)or die(mysql_error());

}
if($accion=='insert_partida_divorcio'){
	echo $fecha =  date("Y-m-d");echo "<br>";
	$tipo_partida 		= $_POST['tipo_partida'];
	$usuario 			= $_POST['usuario'];
	$hombre 			= $_POST['hombre'];
	$mujer 				= $_POST['mujer'];
	$edad_hombre 		= $_POST['edad_hombre'];
	$edad_mujer 		= $_POST['edad_mujer'];
	$oficio_hombre 		= $_POST['oficio_hombre'];
	$oficio_mujer 		= $_POST['oficio_mujer'];
	$pagina_folio 		= $_POST['pagina_folio'];
	if(isset($_POST['NumeroPagina'])){
		$NumeroPagina 	= $_POST['NumeroPagina'];
		$NumeroFolio 	='';
	}
	else{
		$NumeroFolio 	= $_POST['NumeroFolio'];
		$NumeroPagina 	='';
	}	
	$nLibro 			= $_POST['nLibro'];
	$nPartida 			= $_POST['nPartida'];
	$cuerpo 			= $_POST['cuerpo'];
	
	$sql = "insert into sr_pdivorcio (id_tipo_partida,id_usuario,hombre,mujer,edad_hombre,edad_mujer,
				oficio_domicilio_hombre,oficio_domicilio_mujer,pagina_folio,numero_pagina,numero_folio,
				anio_libro,partida_numero,cuerpo_partida,fecha_creaccion)values(
				'$tipo_partida','$usuario','$hombre','$mujer','$edad_hombre','$edad_mujer','$oficio_hombre',
				'$oficio_mujer','$pagina_folio','$NumeroPagina','$NumeroFolio','$nLibro','$nPartida','$cuerpo',
				'$fecha')";
	mysql_query($sql)or die(mysql_error());

}

if($accion=='update_partida_divorcio')
{
	$id_partida 		= $_POST['idPartida'];
	$usuario 			= $_POST['usuario'];
	echo $hombre 			= $_POST['hombre'];
	echo $mujer 				= $_POST['mujer'];
	$edad_hombre 		= $_POST['edad_hombre'];
	$edad_mujer 		= $_POST['edad_mujer'];
	$oficio_hombre 		= $_POST['oficio_hombre'];
	$oficio_mujer 		= $_POST['oficio_mujer'];
	$pagina_folio 		= $_POST['pagina_folio'];
	if(isset($_POST['NumeroPagina'])){
		$NumeroPagina 	= $_POST['NumeroPagina'];
		$NumeroFolio 	='';
	}
	else{
		$NumeroFolio 	= $_POST['NumeroFolio'];
		$NumeroPagina 	='';
	}	
	$nLibro 			= $_POST['nLibro'];
	$nPartida 			= $_POST['nPartida'];
	echo $cuerpo 			= $_POST['cuerpo'];

	$sql = "update sr_pdivorcio set 
						hombre='$hombre',
						mujer='$mujer',
						edad_hombre='$edad_hombre',
						edad_mujer='$edad_mujer',
						oficio_domicilio_hombre='$oficio_hombre',
						oficio_domicilio_mujer='$oficio_mujer',
						pagina_folio='$pagina_folio',
						numero_pagina='$NumeroPagina',
						numero_folio='$NumeroFolio',
						anio_libro='$nLibro',
						partida_numero='$nPartida',
						cuerpo_partida='$cuerpo' where id_partida=$id_partida";
	mysql_query($sql)or die(mysql_error());

	$sql = "insert into sr_user_update_partida (id_tipo_partida,id_partida,id_usuario)values(4,'$id_partida','$usuario')";
	mysql_query($sql);

}

function deleteActa(){
	echo $id = $_POST['id'];
	$sql = "delete from sr_actas where id_acta ='".$id."' ";
	mysql_query($sql)or die(mysql_error()."Error al eliminar el Acta "+$id);

	$sql2 = "delete from sr_marginaciones_actas where id_acta ='".$id."' ";
	mysql_query($sql2)or die(mysql_error()."Error al eliminar Las marginacion del Acta"+$id);


}

function insert_marginacion_acta()
{

	$id_acta 			= $_POST['id_acta'];
	$id_usuario 		= $_POST['id_usuario'];
	$id_tipo_acta 		= $_POST['id_tipo_acta'];
	$texto_marginacion 	= $_POST['texto_marginacion'];
	echo $fecha = date('Y-m-d');

	$sql = "insert into sr_marginaciones_actas(id_marginacion,id_tipo_acta,id_acta,id_usuario,texto_marginacion,fecha_marginacion)
										values(1,'$id_tipo_acta','$id_acta','$id_usuario','$texto_marginacion','".$fecha."')";

	mysql_query($sql)or die(mysql_error());

}

function UpdatePDefuncion(){
	echo "<br>".$genero =  $_POST['sexo'] ;
	echo "<br>".$edad =  $_POST['edad_fallecido'] ;
	echo "<br>".$oficio =  $_POST['oficio_fallecido'] ;
	echo "<br>".$estado = $_POST['estado_fallecido'] ;
	echo "<br>".$fallecido =  $_POST['nombre_fallecido'] ;
	echo "<br>".$hora =  $_POST['hora_fallecido'] ;
	echo "<br>".$lugar = $_POST['lugar_fallecido'] ;
	echo "<br>".$departamento =  $_POST['departament_fallecido'] ;
	echo "<br>".$causa =  $_POST['causa_fallecido'] ;
	echo "<br>".$dui =  $_POST['dui_fallecido'] ;
	echo "<br>".$padre =  $_POST['padre_fallecido'] ;
	echo "<br>".$madre =  $_POST['madre_fallecido'] ;
	echo "<br>".$emisor_datos =  $_POST['nombre_emisor'] ;
	echo "<br>".$parentesco_emisor = $_POST['parentesco_emisor'] ;
	echo "<br>".$dui_emisor = $_POST['dui_emisor'] ;
	echo "<br>".$fecha_fallecido = $_POST['fecha_fallecido'] ;
	echo "<br>".$detalle = $_POST['detalle_fallecido'] ;
	echo "<br>".$tipo_pagina =  $_POST['tipo'] ;
	echo "<br>".$domicilio =  $_POST['domicilio'] ;
	echo "<br>".$nacionalidad =  $_POST['nacionalidad'] ;
	if(empty($_POST['detalle_asentamiento'])){
		$detalle_asentamiento="";
	}else
	{
		echo "<br>".$detalle_asentamiento = $_POST['detalle_asentamiento'];
	}

	if(empty($domicilio)){
		echo "<br>".$domicilio="";
	}
	if(empty($nacionalidad)){
		echo "<br>".$nacionalidad="";
	}

	if(empty($_POST['NumeroPagina']))
	{	
		echo "<br>".$numero=""; 
	}
	else
	{
		echo "<br>".$numero  = $_POST['NumeroPagina'] ;
	}
	if(empty($_POST['esposoa'])){
		echo "<br>".$esposoa = "";
	}else
	{
		echo "<br>".$esposoa = $_POST['esposoa'];
	}

	if(empty($_POST['nLibro'])){
		echo "<br>".$libro="";
	}
	else{
		echo "<br>".$libro = $_POST['nLibro'] ;
	}
	if(empty($_POST['nPartida'])){$partida="";}else{$partida = $_POST['nPartida'] ;}	

	echo "<br>".$tipo_p =  $_POST['tipo_partida'] ;
	echo "<br>".$usuario =  $_POST['usuario'] ;	
	$id_partida = $_POST['id_partida'];

	$sql = "update sr_pdefuncion set hombre='$fallecido',genero='$genero',edad='$edad',
									oficio='$oficio',estado='$estado',conyugue='$esposoa',
									domicilio='$domicilio',nacionalidad='$nacionalidad',
									hora_fecha_muerte='$hora',lugar='$lugar',departamento='$departamento',
									causa='$causa',dui='$dui',padre='$padre',madre='$madre',
									emisor_datos='$emisor_datos',parentesco_emisor='$parentesco_emisor',
									dui_emisor='$dui_emisor',pagina_folio='$tipo_pagina',numero='$numero',
									libro='$libro',partida='$partida',detalles='$detalle',
									fecha_asentamiento='$detalle_asentamiento',fecha='$fecha_fallecido'	
									where id_partida='$id_partida'							
									
									";
	mysql_query($sql)or die(mysql_error()." Error al hacer Update de partida de defuncion");
}

function InsertPDefuncion(){
	$fallecido =  $_POST['nombre_fallecido'] ;
	$genero =  $_POST['sexo'] ;
	$edad =  $_POST['edad_fallecido'] ;
	$oficio =  $_POST['oficio_fallecido'] ;
	$estado = $_POST['estado_fallecido'] ;
	$hora =  $_POST['hora_fallecido'] ;
	$lugar = $_POST['lugar_fallecido'] ;
	$departamento =  $_POST['departament_fallecido'] ;
	$causa =  $_POST['causa_fallecido'] ;
	$dui =  $_POST['dui_fallecido'] ;
	$padre =  $_POST['padre_fallecido'] ;
	$madre =  $_POST['madre_fallecido'] ;
	$emisor_datos =  $_POST['nombre_emisor'] ;
	$parentesco_emisor = $_POST['parentesco_emisor'] ;
	$dui_emisor = $_POST['dui_emisor'] ;
	$fecha_fallecido = $_POST['fecha_fallecido'] ;
	$detalle = $_POST['detalle_fallecido'] ;
	$tipo_pagina =  $_POST['tipo'] ;
	$domicilio =  $_POST['domicilio'] ;
	$nacionalidad =  $_POST['nacionalidad'] ;

	if(empty($_POST['detalle_asentamiento'])){
		$detalle_asentamiento="";
	}else
	{
		$detalle_asentamiento = $_POST['detalle_asentamiento'];
	}

	if(empty($domicilio)){
		$domicilio="";
	}
	if(empty($nacionalidad)){
		$nacionalidad="";
	}

	if(empty($_POST['NumeroPagina']))
	{	
		$numero=""; 
	}
	else
	{
		$numero  = $_POST['NumeroPagina'] ;
	}
	if(empty($_POST['esposoa'])){
		$esposoa = "";
	}else
	{
		$esposoa = $_POST['esposoa'];
	}

	if(empty($_POST['nLibro'])){
		$libro="";
	}
	else{
		$libro = $_POST['nLibro'] ;
	}
	if(empty($_POST['nPartida'])){$partida="";}else{$partida = $_POST['nPartida'] ;}	

	$tipo_p =  $_POST['tipo_partida'] ;
	$usuario =  $_POST['usuario'] ;	
	$a ="";
	$fecha = date('Y-m-d h:m:s');

	$sql = "insert into sr_pdefuncion values('$a',
    		'$tipo_p','$usuario','$fallecido','$genero',
    		'$edad','$oficio','$estado','$esposoa','$domicilio','$nacionalidad','$hora',
    		'$lugar','$departamento','$causa','$dui','$padre','$madre',
    		'$emisor_datos','$parentesco_emisor','$dui_emisor','$tipo_pagina',
    		'$numero','$libro','$partida','$detalle','$detalle_asentamiento','$fecha_fallecido','$fecha'
    	)";
        mysql_query($sql)or die(mysql_error());
}

function updatePMatrimonio()
{
		$esposo 	= $_POST['esposo'];
        $esposa 	= $_POST['esposa'];
        $edad_esposo= $_POST['edad_esposo'];
        $edad_esposa= $_POST['edad_esposa'];
        $oficio_esposo 		= $_POST['oficio_esposo'];
        $oficio_esposa 		= $_POST['oficio_esposa'];
        $nacionalidad_esposo= $_POST['nacionalidad_esposo'];
        $nacionalidad_esposa= $_POST['nacionalidad_esposa'];
        $origen_esposo 		= $_POST['origen_esposo'];
        $origen_esposa 		= $_POST['origen_esposa' ];
        $estado_esposo 		= $_POST['estado_casado' ];
        $estado_esposa 		= $_POST['estado_casada' ];
        $dui_casado 		= $_POST['dui_casado'];
        $dui_casada 		= $_POST['dui_casada'];
        $padre_casado 		= $_POST['padre_casado'];
        $madre_casado 		= $_POST['madre_casado'];
        $padre_casada 		= $_POST['padre_casada'];
        $madre_casada 		= $_POST['madre_casada'];
        $nombre_testigo1 	= $_POST['nombre_testigo1'];
        $nombre_testigo2 	= $_POST['nombre_testigo2'];
        $nacionalidad_padre_esposo 	= $_POST['nacionalidad_padre_esposo'];
        $nacionalidad_padre_esposa 	= $_POST['nacionalidad_padre_esposa'];
        $fecha_matrimonio 	= $_POST['fecha_matrimonio'];
        $lugar_matrimonio 	= $_POST['lugar_matrimonio'];
        $representante_legal= $_POST['representante_legal'];
        echo $genero_representate_legal 	= $_POST['genero_representate_legal'];
        $descripcion 		= $_POST['descripcion'];
        $pagina_folio 		= $_POST['pagina_folio'];
        $idpartida = $_POST['idpartida'];
        echo $pagina_folio;

        

        
      
        	echo $NumeroPagina = $_POST['pagina_1'];
          
        	echo $NumeroFolio = $_POST['folio_1'];
      
        
        $nLibro 			= $_POST['nLibro'];
        $nPartida 			= $_POST['nPartida'];
        
        $sql = "update sr_pmatrimonio set nombre_esposo='".$esposo."',
        								nombre_esposa='".$esposa."',
        								edad_esposo='".$edad_esposo."',
        								edad_esposa='".$edad_esposa."',
        								oficio_esposo='".$oficio_esposo."',
        								oficio_esposa='".$oficio_esposa."',
        								nacionalidad_esposo='".$nacionalidad_esposo."',
        								nacionalidad_esposa='".$nacionalidad_esposa."',
        								origen_esposo='".$origen_esposo."',
        								origen_esposa='".$origen_esposa."',
        								estado_esposo='".$estado_esposo."',
        								estado_esposa='".$estado_esposa."',
        								dui_esposo='".$dui_casado."',
        								dui_esposa='".$dui_casada."',
        								padre_casado='".$padre_casado."',
        								madre_casado='".$madre_casado."',
        								padre_casada='".$padre_casada."',
        								madre_casada='".$madre_casada."',
        								nacionalidad_padres_esposo='".$nacionalidad_padre_esposo."',
        								nacionalidad_padres_esposa='".$nacionalidad_padre_esposa."',
        								fecha_matrimonio='".$fecha_matrimonio."',
        								lugar_matrimonio='".$lugar_matrimonio."',
        								nombre_representante_legal='".$representante_legal."',
        								genero_representante_legal='".$genero_representate_legal."',
        								primer_testigo='".$nombre_testigo1."',
        								segundo_testigo='".$nombre_testigo2."',
        								pagina='".$pagina_folio."',
        								nfolio='".$NumeroFolio."',
        								npagina='".$NumeroPagina."',
        								numero_libro='".$nLibro."',
        								numero_partida='".$nPartida."',
        								descripcion_general='".$descripcion."'

        								where id_pmatrimonio='".$idpartida."'

        ";
         mysql_query($sql)or die(mysql_error());

         $usuario = $_POST['usuario'];

        $sql = "insert into sr_user_update_partida (id_tipo_partida,id_partida,id_usuario)values(2,'$idpartida','$usuario')";
		mysql_query($sql);
}

function InsertPmatrimonio()
{

		$esposo 	= $_POST['esposo'];
        $esposa 	= $_POST['esposa'];
        $edad_esposo= $_POST['edad_esposo'];
        $edad_esposa= $_POST['edad_esposa'];
        $oficio_esposo 		= $_POST['oficio_esposo'];
        $oficio_esposa 		= $_POST['oficio_esposa'];
        $nacionalidad_esposo= $_POST['nacionalidad_esposo'];
        $nacionalidad_esposa= $_POST['nacionalidad_esposa'];
        $origen_esposo 		= $_POST['origen_esposo'];
        $origen_esposa 		= $_POST['origen_esposa' ];
        $estado_esposo 		= $_POST['estado_casado' ];
        $estado_esposa 		= $_POST['estado_casada' ];
        $dui_casado 		= $_POST['dui_casado'];
        $dui_casada 		= $_POST['dui_casada'];
        $padre_casado 		= $_POST['padre_casado'];
        $madre_casado 		= $_POST['madre_casado'];
        $padre_casada 		= $_POST['padre_casada'];
        $madre_casada 		= $_POST['madre_casada'];
        $nombre_testigo1 	= $_POST['nombre_testigo1'];
        $nombre_testigo2 	= $_POST['nombre_testigo2'];
        $nacionalidad_padre_esposo 	= $_POST['nacionalidad_padre_esposo'];
        $nacionalidad_padre_esposa 	= $_POST['nacionalidad_padre_esposa'];
        $fecha_matrimonio 	= $_POST['fecha_matrimonio'];
        $lugar_matrimonio 	= $_POST['lugar_matrimonio'];
        $representante_legal= $_POST['representante_legal'];
        $genero_representate_legal 	= $_POST['genero_representate_legal'];
        $descripcion 		= $_POST['descripcion'];
        $pagina_folio 		= $_POST['pagina_folio'];
        
        if(isset($_POST['NumeroPagina']))
        {
        	$NumeroPagina 		= $_POST['NumeroPagina'];
        	$NumeroFolio 		="";
        }
        if(isset($_POST['NumeroFolio']))
        {
        	$NumeroFolio 		= $_POST['NumeroFolio'];
        	$NumeroPagina 		= "";
        }
        
        $nLibro 			= $_POST['nLibro'];
        $nPartida 			= $_POST['nPartida'];
        $usuario 			= $_POST['usuario'];  


        $fecha =  date("Y-m-d");
        $a=0;

    $sql = "insert into sr_pmatrimonio values('$a',
    		'$esposo','$esposa','$edad_esposo','$edad_esposa',
    		'$oficio_esposo','$oficio_esposa','$nacionalidad_esposo','$nacionalidad_esposa',
    		'$origen_esposo','$origen_esposa','$estado_esposo','$estado_esposa','$dui_casado','$dui_casada',
    		'$padre_casado','$madre_casado','$padre_casada','$madre_casada',
    		'$nacionalidad_padre_esposo','$nacionalidad_padre_esposa',
    		'$fecha_matrimonio','$lugar_matrimonio','$representante_legal',
    		'$genero_representate_legal','$nombre_testigo1','$nombre_testigo2','$pagina_folio',
    		'$NumeroPagina','$NumeroFolio','$nLibro','$nPartida','$descripcion',
    		'$usuario','$fecha'
    	)";
        mysql_query($sql)or die(mysql_error());
}



function updateInfoEmpresa()
{
	echo "aqui";

				$id_empresa=$_POST['id_empresa'];
				$nombre_empresa=$_POST['nombre_empresa'];
				$rubro_empresa=$_POST['rubro_empresa'];
				$pais=$_POST['pais'];
				$departamento=$_POST['departamento'];
				$municipio=$_POST['municipio'];
				$telefono=$_POST['telefono'];
				$fax=$_POST['fax'];
				$nit=$_POST['nit'];
				$nombre_secretario=$_POST['nombre_secretario'];
				$jefe_registro_familiar=$_POST['jefe_registro_familiar'];
				$nombre_alcalde=$_POST['nombre_alcalde'];

	$sql = "update sr_empresa set nombre_empresa='$nombre_empresa',rubro_empresa='$rubro_empresa',pais='$pais',departamento='$departamento',
			municipio='$municipio',telefono='$telefono',fax='$fax',nit='$nit',nombre_secretario='$nombre_secretario',
			jefe_registro_familiar='$jefe_registro_familiar',nombre_alcalde='$nombre_alcalde'
			where id_empresa='$id_empresa'	";
	 mysql_query($sql);
}

function insertData(){
	$conexion = login();

	if(isset($_POST['NumeroPagina']))
	{
		$numero_pagina	=	$_POST['NumeroPagina'];	
	}
	else
	{
		$numero_pagina	=	"";
	}
	if(isset($_POST['NumeroFolio']))
	{
		$numero_folio	=	$_POST['NumeroFolio'];	
	}
	else
	{
		$numero_folio	=	"";
	}

	$estado_padre 							=	$_POST['estado_padre'];
	$estado_madre 							=	$_POST['estado_madre'];
	$id_u 							=	$_POST['usuario'];
	$padre 							= 	$_POST['padre'];
	$madre 							=	$_POST['madre'];
	$edad_padre						=	$_POST['edad_padre'];
	$edad_madre						=	$_POST['edad_madre'];
	$oficio_padre					=	$_POST['oficio_padre'];
	$oficio_madre					=	$_POST['oficio_madre'];
	$nacionalidad_padre				=	$_POST['nacionalidad_padre'];
	$nacionalidad_madre				=	$_POST['nacionalidad_madre'];
	$origen_padre					=	$_POST['origen_padre'];
	$origin_madre					=	$_POST['origen_madre'];
	$domicilio_padre				=	$_POST['domiclio_padre'];
	$domicilio_madre				=	$_POST['domiclio_madre'];
	$parentesco_informante			=	$_POST['parentesco_emisor'];
	$numero_identidad_informante	=	$_POST['dui_emisor'];
	$documento_expedido_informante	=	$_POST['dui_emisor_expedido'];
	$firma_informante				=	$_POST['firma_emisor'];
	$nombre_testigo1				=	$_POST['nombre_testigo1'];
	$nombre_testigo2				=	$_POST['nombre_testigo2'];
	$dui_testigo1					=	$_POST['dui_testigo1'];
	$dui_testigo2					=	$_POST['dui_testigo2'];
	$lugar_expedicion_dui_testigo1	=	$_POST['dui_testigo1_expedicion'];
	$lugar_expedicion_dui_testigo2	=	$_POST['dui_testigo2_expedicion'];
	$nombre_reciennacido			=	$_POST['nombre_recienacido'];
	$apellido_recienacido			=	$_POST['apellido_recienacido'];
	$genero_reciennacido			=	$_POST['genero_bebe'];
	$lugar_nacimiento				=	$_POST['lugar_nacimiento'];
	$dia_nacimiento					=	$_POST['dia'];
	$mes_nacimiento					=	$_POST['mes'];
	$anio_nacimiento				=	$_POST['anio'];
	$hora_nacimiento				=	$_POST['hora_nacimiento'];
	$folio_pagina					=	$_POST['pagina_folio'];
	$numero_libro					=	$_POST['nLibro'];
	$numero_partida					=	$_POST['nPartida'];
	$jurisdiccion					=	$_POST['jurisdisccion'];
	$fecha_emision					=	$_POST['fecha_emision'];

	if($conexion)
	{
		$sql = "
			insert into sr_pnacimiento (
				id_usuario,	id_tipo_partida,nombre_padre,nombre_madre,	edad_padre,	edad_madre,estado_padre,estado_madre,
				oficio_padre, oficio_madre,	nacionalidad_padre,	nacionalidad_madre,	origen_padre,origen_madre,
				domicilio_padre,domicilio_madre,parentesco_informante,numero_identidad_informante,documento_expedido_informante,
				firma_informante,nombre_testigo1,nombre_testigo2,dui_testigo1,dui_testigo2,	lugar_expedicion_dui_testigo1,
				lugar_expedicion_dui_testigo2,nombre_reciennacido,apellido_recienacido,	genero_reciennacido,lugar_de_nacimiento,
				dia_nacimiento,	mes_nacimiento,	anio_nacimiento,hora_nacimiento,folio_pagina,numero_pagina,
				numero_folio,numero_libro,	numero_partida,jurisdiccion,fecha_emision)
				values(
				'$id_u', '1', '$padre', '$madre',
				'$edad_padre',
				'$edad_madre',
				'$estado_padre',
				'$estado_madre',
				'$oficio_padre',
				'$oficio_madre',
				'$nacionalidad_padre',
				'$nacionalidad_madre',
				'$origen_padre',
				'$origin_madre',
				'$domicilio_padre',
				'$domicilio_madre',
				'$parentesco_informante',
				'$numero_identidad_informante',
				'$documento_expedido_informante',
				'$firma_informante',
				'$nombre_testigo1',
				'$nombre_testigo2',
				'$dui_testigo1',
				'$dui_testigo2',
				'$lugar_expedicion_dui_testigo1',
				'$lugar_expedicion_dui_testigo2',
				'$nombre_reciennacido',
				'$apellido_recienacido',
				'$genero_reciennacido',
				'$lugar_nacimiento',
				'$dia_nacimiento',
				'$mes_nacimiento',
				'$anio_nacimiento',
				'$hora_nacimiento',
				'$folio_pagina',
				'$numero_pagina',
				'$numero_folio',
				'$numero_libro',
				'$numero_partida',
				'$jurisdiccion',
				'$fecha_emision'
			)";
		mysql_query($sql)or die(mysql_error()." Error al insertar");

		$rs = mysql_query("SELECT @@identity AS id");
		if ($row = mysql_fetch_row($rs))
		{
			$ultimo_id = trim($row[0]);
		}
		
	}
	echo json_encode(1);
}

function updateData()
{
	if(isset($_POST['NumeroPagina']))
	{
		echo $numero_pagina	=	$_POST['NumeroPagina'];	
	}
	else
	{
		$numero_pagina	=	"";
	}
	if(isset($_POST['NumeroFolio']))
	{
		echo $numero_folio	=	$_POST['NumeroFolio'];	
	}
	else
	{
		$numero_folio	=	"";
	}

	$id_partida						=	$_POST['idPartida'];
	$id_u 							=	$_POST['usuario'];
	$padre 							= 	$_POST['padre'];
	$madre 							=	$_POST['madre'];
	$edad_padre						=	$_POST['edad_padre'];
	$edad_madre						=	$_POST['edad_madre'];
	$estado_padre						=	$_POST['estado_padre1'];
	$estado_madre						=	$_POST['estado_madre1'];
	$oficio_padre					=	$_POST['oficio_padre'];
	$oficio_madre					=	$_POST['oficio_madre'];
	$nacionalidad_padre				=	$_POST['nacionalidad_padre'];
	$nacionalidad_madre				=	$_POST['nacionalidad_madre'];
	$origen_padre					=	$_POST['origen_padre'];
	$origin_madre					=	$_POST['origen_madre'];
	$domicilio_padre				=	$_POST['domiclio_padre'];
	$domicilio_madre				=	$_POST['domiclio_madre'];
	$parentesco_informante			=	$_POST['parentesco_emisor'];
	$numero_identidad_informante	=	$_POST['dui_emisor'];
	$documento_expedido_informante	=	$_POST['dui_emisor_expedido'];
	$firma_informante				=	$_POST['firma_emisor'];
	$nombre_testigo1				=	$_POST['nombre_testigo1'];
	$nombre_testigo2				=	$_POST['nombre_testigo2'];
	$dui_testigo1					=	$_POST['dui_testigo1'];
	$dui_testigo2					=	$_POST['dui_testigo2'];
	$lugar_expedicion_dui_testigo1	=	$_POST['dui_testigo1_expedicion'];
	$lugar_expedicion_dui_testigo2	=	$_POST['dui_testigo2_expedicion'];
	$nombre_reciennacido			=	$_POST['nombre_recienacido'];
	$apellido_recienacido			=	$_POST['apellido_recienacido'];
	$genero_reciennacido			=	$_POST['genero_bebe'];
	$lugar_nacimiento				=	$_POST['lugar_nacimiento'];
	$dia_nacimiento					=	$_POST['dia'];
	$mes_nacimiento					=	$_POST['mes'];
	$anio_nacimiento				=	$_POST['anio'];
	$hora_nacimiento				=	$_POST['hora_nacimiento'];
	$folio_pagina					=	$_POST['pagina_folio'];
	$numero_libro					=	$_POST['nLibro'];
	$numero_partida					=	$_POST['nPartida'];
	$jurisdiccion					=	$_POST['jurisdisccion'];
	$fecha_emision					=	$_POST['fecha_emision'];

	mysql_query("SET NAMES 'utf8'");
	mysql_query("SET CHARACTER SET 'utf8'");

	$sql = "update sr_pnacimiento set 
					nombre_padre='$padre',
					nombre_madre='$madre',
					edad_padre='$edad_padre',
					edad_madre='$edad_madre',
					estado_padre='$estado_padre',
					estado_madre='$estado_madre',
					oficio_padre='$oficio_padre',
					oficio_madre='$oficio_madre',
					nacionalidad_padre='$nacionalidad_padre',
					nacionalidad_madre='$nacionalidad_madre',
					origen_padre='$origen_padre',
					origen_madre='$origin_madre',
					domicilio_padre='$domicilio_padre',
					domicilio_madre='$domicilio_madre',
					parentesco_informante='$parentesco_informante',
					numero_identidad_informante='$numero_identidad_informante',
					documento_expedido_informante='$documento_expedido_informante',
					firma_informante='$firma_informante',
					nombre_testigo1='$nombre_testigo1',
					nombre_testigo2='$nombre_testigo2',
					dui_testigo1='$dui_testigo1',
					dui_testigo2='$dui_testigo2',
					lugar_expedicion_dui_testigo1='$lugar_expedicion_dui_testigo1',
					lugar_expedicion_dui_testigo2='$lugar_expedicion_dui_testigo2',
					nombre_reciennacido='$nombre_reciennacido',
					apellido_recienacido='$apellido_recienacido',
					genero_reciennacido='$genero_reciennacido',
					lugar_de_nacimiento='$lugar_nacimiento',
					dia_nacimiento='$dia_nacimiento',
					mes_nacimiento='$mes_nacimiento',
					anio_nacimiento='$anio_nacimiento',
					hora_nacimiento='$hora_nacimiento',
					folio_pagina='$folio_pagina',
					numero_pagina='$numero_pagina',
					numero_folio='$numero_folio',
					numero_libro='$numero_libro',
					numero_partida='$numero_partida',
					hora_nacimiento='$hora_nacimiento',
					jurisdiccion='$jurisdiccion',
					fecha_emision='$fecha_emision'

					where id_pnacimiento=$id_partida";
	mysql_query($sql)or die(mysql_error());

	$sql = "insert into sr_user_update_partida (id_tipo_partida,id_partida,id_usuario)values(1,'$id_partida','$id_u')";
	mysql_query($sql);
}
function postData()
{
	$id_partida						=	$_POST['idPartida'];
	$id_u 							=	$_POST['usuario'];
	$padre 							= 	$_POST['padre'];
	$madre 							=	$_POST['madre'];
	$edad_padre						=	$_POST['edad_padre'];
	$edad_madre						=	$_POST['edad_madre'];
	$oficio_padre					=	$_POST['oficio_padre'];
	$oficio_madre					=	$_POST['oficio_madre'];
	$nacionalidad_padre				=	$_POST['nacionalidad_padre'];
	$nacionalidad_madre				=	$_POST['nacionalidad_madre'];
	$origen_padre					=	$_POST['origen_padre'];
	$origin_madre					=	$_POST['origen_madre'];
	$domicilio_padre				=	$_POST['domiclio_padre'];
	$domicilio_madre				=	$_POST['domiclio_madre'];
	$parentesco_informante			=	$_POST['parentesco_emisor'];
	$numero_identidad_informante	=	$_POST['dui_emisor'];
	$documento_expedido_informante	=	$_POST['dui_emisor_expedido'];
	$firma_informante				=	$_POST['firma_emisor'];
	$nombre_testigo1				=	$_POST['nombre_testigo1'];
	$nombre_testigo2				=	$_POST['nombre_testigo2'];
	$dui_testigo1					=	$_POST['dui_testigo1'];
	$dui_testigo2					=	$_POST['dui_testigo2'];
	$lugar_expedicion_dui_testigo1	=	$_POST['dui_testigo1_expedicion'];
	$lugar_expedicion_dui_testigo2	=	$_POST['dui_testigo2_expedicion'];
	$nombre_reciennacido			=	$_POST['nombre_recienacido'];
	$apellido_recienacido			=	$_POST['apellido_recienacido'];
	$genero_reciennacido			=	$_POST['genero_bebe'];
	$lugar_nacimiento				=	$_POST['lugar_nacimiento'];
	$dia_nacimiento					=	$_POST['dia'];
	$mes_nacimiento					=	$_POST['mes'];
	$anio_nacimiento				=	$_POST['anio'];
	$hora_nacimiento				=	$_POST['hora_nacimiento'];
	$folio_pagina					=	$_POST['pagina_folio'];
	$numero_libro					=	$_POST['nLibro'];
	$numero_partida					=	$_POST['nPartida'];
	$jurisdiccion					=	$_POST['jurisdisccion'];
	$fecha_emision					=	$_POST['fecha_emision'];

}



?>