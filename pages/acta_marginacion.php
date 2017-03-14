


<?php
session_start();
header('Content-Type: text/html; charset=UTF-8'); 
include_once("../class_db/class_a_matrimonio.php");
$pages = "partida_detalle";
$id_acta =  $_GET['id'];
$data = selectDetalleActa($id_acta);
//$marginacion = selectMarginacionActa(3,$id_acta);
$logo = logo($pages);
$empresa = empresa();
//$t_pdivorcio = template_pdefuncion(3);

$id_rol = $_SESSION['data'][11];
$nombre_rol = rol_usuario($id_rol);
?>

<script>
    $(document).ready(function(){

    	$("#marginar_partida").click(function(){        
            var id = $("#id_acta").val();                
           $(".includ").load("pages/acta_m_detalle.php?id="+id);
        });

        $("#guarda_marginacion").click(function(){          	
            var id_acta 		= $("#id_acta").val();
            var id_usuario 		= $("#id_usuario").val();
            var id_tipo_acta 	= $("#id_tipo_acta").val();
            var texto_marginacion = $("#texto_marginacion").val();
            
            var accion = "insert_marginacion_acta";
            var tipoPartida = 3;

            var dataMarginacion = {
            	accion:accion,
          		id_acta:id_acta,
          		id_usuario:id_usuario,  
          		id_tipo_acta:id_tipo_acta,        		
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
	            	var id = $("#id_acta").val();     
	            	$(".includ").load("pages/acta_m_detalle.php?id="+id);            	
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
		<input type="hidden" value="<?php echo $data['id_acta']; ?>" id="id_acta">
		<input type="hidden" id="id_usuario" value="<?php echo $_SESSION['data'][0]; ?>">
		<input type="hidden" id="id_tipo_acta" value="<?php echo $data['id_tipo_acta']; ?>">
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
		
		<div class="row">		
		<div class="col-md-12">
			<?php
			/*
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
				*/
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
