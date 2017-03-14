


<?php
session_start();
header('Content-Type: text/html; charset=UTF-8'); 
include_once("../class_db/class_p_defuncion.php");
$pages = "partida_detalle";
$id_partida =  $_GET['id'];
$data = selectDetalle($id_partida);
$marginacion = selectMarginacion(3,$id_partida);
$logo = logo($pages);
$empresa = empresa();
$t_pdivorcio = template_pdefuncion(3);

$id_rol = $_SESSION['data'][11];
$nombre_rol = rol_usuario($id_rol);
?>

<script>
    $(document).ready(function(){

    	$("#marginar_partida").click(function(){        
            var id = $("#id_partida").val();                
           $(".includ").load("pages/partida_defuncion_detalle.php?id="+id);
        });

        $("#guarda_marginacion").click(function(){          	
            var id_partida = $("#id_partida").val();
            var id_usuario = $("#id_usuario").val();
            var texto_marginacion = $("#texto_marginacion").val();
            
            var accion = "insert_marginacion";
            var tipoPartida = 3;

            var dataMarginacion = {
            	accion:accion,
            	id_tipo_partida:tipoPartida,
          		id_partida:id_partida,
          		id_usuario:id_usuario,          		
          		texto_marginacion:texto_marginacion
      		};
      		insertarMarginacion(dataMarginacion);
        });

        function insertarMarginacion(data)
	  	{	  		
	  		
	    	$.ajax({
	        	url: "class_db/saveData.php",
	        	type:"post",
	        	data: data,
	        
	        	success: function(){        		
	            	//alert("success");  
	            	var id = $("#id_partida").val();     
	            	$(".includ").load("pages/partida_defuncion_detalle.php?id="+id);            	
	        	},	
	        	error:function(){
	            	alert("failure");
	        	}
	  		});
	    }
    });
</script>


<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<style>
#logo1{
	width: 30%;
}
#titulo{
	text-align: center;
}
#titulo_center,#titulo2{
	text-align: center;

}
#partida{
	text-align: justify;
}
#texto_marginacion{
	border:1px solid grey;
}
#guarda_marginacion{
	text-align: right;

}
</style>

<div class="row">
	<div class="col-md-7" id=""></div>
	<div class="col-md-5" id="">
		<a href="#" id="marginar_partida" class="btn btn-primary">Regresar</a>
		<a href="#" id="guarda_marginacion" class="btn btn-primary">Guarda Marginacion</a>
		<input type="hidden" value="<?php echo $data['id_partida']; ?>" id="id_partida">
		<input type="hidden" id="id_usuario" value="<?php echo $_SESSION['data'][0]; ?>">
	</div>
</div>
<br>
<div id="total">
<div class="row" id="cabecera">
	<div class="col-md-4" id="titulo">
		<span>
			<img src="<?php echo $logo['logo'][0]; ?>" class="logos_header" width="30%">			
		</span>
	</div>
	<div class="col-md-4" id="titulo2">
		<strong><?php echo $empresa['nombre_empresa']; ?></strong><br>
		<strong><?php echo $empresa['municipio']; ?></strong><br>
		<strong><?php echo $empresa['departamento']; ?></strong><br>
		Tel. <strong><?php echo $empresa['telefono']; ?> Fax. <?php echo $empresa['fax']; ?></strong><br>
		NIT. <strong><?php echo $empresa['nit']; ?></strong>
	</div>
	<div class="col-md-4 " id="titulo">
		<img src="<?php echo $logo['logo'][1]; ?>" class="logos_escudo" width='30%'>	
	</div>
</div>


<br>
<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10" id="partida">
		<?php
			echo $t_pdivorcio['template'][1];echo " ";
			echo $data['pagina_folio'];echo " ";
			echo $data['numero']; echo ", ";			
			echo $t_pdivorcio['template'][4];echo " ";
			echo $data['libro'];echo ", ";
			echo $t_pdivorcio['template'][5];echo " ";
			echo $t_pdivorcio['template'][6];echo " ";
			echo $data['partida'];echo ". ";
			echo $data['hombre'];echo " ";
			if($data['genero']=="m"){
				echo $t_pdivorcio['template'][7];echo ", ";
			}else
			{
				echo $t_pdivorcio['template'][8];echo ", ";
			}
			echo $t_pdivorcio['template'][11];echo " ";
			echo $data['edad'];echo " ";
			echo $t_pdivorcio['template'][12];echo ", ";

			echo $data['oficio'];echo ", ";

			if($data['estado']=="casado" || $data['estado']=="casada"){
				if($data['genero']=="m"){
					echo $t_pdivorcio['template'][13];echo ", ";
				}else
				{
					echo $t_pdivorcio['template'][14];echo ", ";
				}
				echo $data['conyugue'];echo ", ";
				echo $data['domicilio'];echo " ";
				echo $data['nacionalidad'];echo ", ";
			}
			else
			{
				echo $data['estado'];echo ", ";
			}

			if($data['genero']=="m"){
					echo $t_pdivorcio['template'][10];echo ", ";
			}
			else
			{
				echo $t_pdivorcio['template'][9];echo ", ";
			}
			echo $data['padre'];echo " ";
			echo $t_pdivorcio['template'][15];echo " ";
			echo $data['madre'];echo ". ";
			echo $t_pdivorcio['template'][16];echo " ";
			echo $data['hora_fecha_muerte'];echo ", ";
			echo $data['lugar'];echo ", ";
			echo $t_pdivorcio['template'][17];echo " ";
			echo $data['departamento'];echo ", ";
			//echo $data['causa'];echo ", ";
			echo $data['detalles'];echo ", ";
			echo $t_pdivorcio['template'][18];echo " ";
			echo $data['emisor_datos'];echo ", ";
			echo $t_pdivorcio['template'][19];echo " ";
			echo $data['parentesco_emisor'];echo ", ";

			if($data['genero']=="m"){
					echo $t_pdivorcio['template'][21];echo ", ";
			}
			else
			{
				echo $t_pdivorcio['template'][20];echo ", ";
			}
			echo $t_pdivorcio['template'][22];echo ", ";
			echo $data['dui_emisor'];echo ", ";
			echo $t_pdivorcio['template'][23];echo ". ";

			echo $empresa['nombre_empresa']; echo ": ";
			echo $empresa['municipio']; echo ", ";

			echo $data['fecha_asentamiento'];echo ". ";





		?>
		
		<div class="row">		
		<div class="col-md-12">
			<?php
				$count = count($marginacion);
				while($row = mysql_fetch_array($marginacion))
				{
					if($_SESSION['data'][11]=='1')
					{
						?>
							<div class="fecha_marginacion">
								<?php
									echo "<strong>Fecha: </strong>". $row['fecha_marginacion'].' || <strong>Usuario: </strong>'.$row['nickname'].'<br>';
								?>
							</div>
						<?php						
					}

					echo $row['texto_marginacion'].'<br>';						
					echo "<br>";
				}
			?>
		</div>			
		</div>
		<br>
		<div class="row">		
			<div class="col-md-8" id="">
				<span><strong>Digite la Marginacion</strong></span>
			</div>
			<div class="col-md-4" id="">
				
			</div>
		</div>
<br>
		<div class="row">			
			<div class="col-md-12" id="marginacion">			
				<textarea class="form-control" id="texto_marginacion" rows="10"></textarea>
			</div>				
		</div>
		

		


	</div>
	

	<div class="row">
		<div class="col-md-12" id="titulo_center">


		</div>	
	</div>


	<div class="col-md-1"></div>
	</div>








</div>
