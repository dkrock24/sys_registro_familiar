


<?php
session_start();
header('Content-Type: text/html; charset=UTF-8'); 
include_once("../class_db/class_p_nacimiento.php");
$pages = "partida_detalle";
$id_partida =  $_GET['id'];
$data = selectDetalle($id_partida);
$marginacion = selectMarginacion(1,$id_partida);
$logo = logo($pages);
$empresa = empresa();
$t_pnacimiento = template_pnacimiento(1);
?>

<script>
    $(document).ready(function(){

    	$("#marginar_partida").click(function(){        
            var id = $("#id_partida").val();                
           $(".includ").load("pages/partida_detalle.php?id="+id);
        });

        $("#guarda_marginacion").click(function(){          	
            var id_partida = $("#id_partida").val();
            var id_usuario = $("#id_usuario").val();
            var texto_marginacion = $("#texto_marginacion").val();
            
            var accion = "insert_marginacion";
            var tipoPartida = 1;

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
	            	$(".includ").load("pages/partida_detalle.php?id="+ <?php echo $id_partida; ?>);            	
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
	<div class="col-md-10" id=""></div>
	<div class="col-md-2" id="">
		<a href="#" id="marginar_partida" class="btn btn-primary">Regresar</a>
		<input type="hidden" value="<?php echo $data['id_pnacimiento']; ?>" id="id_partida">
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


<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10">
	<hr>
		<?php
			echo $t_pnacimiento['template'][0];
		?>
	</div>
	<div class="col-md-1"></div>
</div>
<br>
<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10" id="partida">
		<?php
			echo $t_pnacimiento['template'][1];echo " ";
			echo $data['folio_pagina'];echo " ";
			echo $data['numero_folio'], $data['numero_pagina'];echo ", ";
			echo $t_pnacimiento['template'][4];echo " ";
			echo $data[36];echo ", ";
			echo $t_pnacimiento['template'][5];echo " ";
			echo $t_pnacimiento['template'][6];echo " ";
			echo $data['numero_partida'];echo " - ";
			echo $data['nombre_reciennacido'];echo " ";
			echo $data['apellido_recienacido'];echo "; ";
			if($data['genero_reciennacido']=="masculino"){
				echo "varon";
			}else{
				echo "hembra";
			}echo ", ";
			echo $t_pnacimiento['template'][9];echo " ";
			echo $data['hora_nacimiento'];echo " ";
			echo $t_pnacimiento['template'][13];echo " ";
			echo $data['dia_nacimiento'];echo " ";
			echo $t_pnacimiento['template'][14];echo " ";
			echo $data['mes_nacimiento'];echo " ";
			echo $t_pnacimiento['template'][58];echo " ";
			echo $t_pnacimiento['template'][15];echo " ";
			echo $data['lugar_de_nacimiento'];echo " ";
			echo $data['jurisdiccion'];echo ", ";
			if($data['genero_reciennacido']=="masculino"){
				echo $t_pnacimiento['template'][20];
			}else{
				echo $t_pnacimiento['template'][21];
			}echo ", ";
			echo $data['nombre_madre'];echo ", ";
			echo $data['oficio_madre'];echo " ";
			echo $t_pnacimiento['template'][14];echo " ";
			echo $data['edad_madre'];echo " ";
			echo $t_pnacimiento['template'][26];echo " ";
			echo $t_pnacimiento['template'][14];echo " ";
			echo $t_pnacimiento['template'][27];echo ", ";
			if($data['nombre_padre']!="")
			{
				echo $t_pnacimiento['template'][10];echo " ";//y
				echo $t_pnacimiento['template'][14];echo " ";//de
				echo $data['nombre_padre'];echo ", ";
				echo $data['oficio_padre'];echo ", ";
				echo $t_pnacimiento['template'][14];echo " ";//de
				echo $data['edad_padre'];echo " ";
				echo $t_pnacimiento['template'][26];echo " ";//an;os
				echo $t_pnacimiento['template'][14];echo " ";//de
				echo $t_pnacimiento['template'][27];echo ", ";//edad
			}
			echo $t_pnacimiento['template'][29];echo ", ";//edad			
			echo $data['origen_madre'];echo " ";
			//echo $t_pnacimiento['template'][31];echo " ";//de domicilio
			echo $data['domicilio_madre'];echo " ";
			echo $t_pnacimiento['template'][10];echo " ";//y
			echo $t_pnacimiento['template'][14];echo " ";//de
			echo $t_pnacimiento['template'][59];echo " ";//nacionalidad
			echo $data['nacionalidad_madre'];echo " ";
			if($data['nombre_padre']!="")
			{
				echo $t_pnacimiento['template'][10];echo " ";//y
				echo $t_pnacimiento['template'][28];echo " ";//el segundo originario de
				echo $data['origen_padre'];echo " ";
				echo $data['domicilio_padre'];echo " ";
				echo $t_pnacimiento['template'][10];echo " ";//y
				echo $t_pnacimiento['template'][14];echo " ";//de
				echo $t_pnacimiento['template'][59];echo " ";//nacionalidad
				echo $data['nacionalidad_padre'];echo ". - ";
			}

			echo $t_pnacimiento['template'][33];echo " ";//dio estos datos
			echo $t_pnacimiento['template'][34];echo " ";//el
			echo $data['parentesco_informante'];echo " ";

			if($data['genero_reciennacido']=="masculino"){
				echo $t_pnacimiento['template'][37];echo " ";//del recien nacio y exibio su dui
			}else{
				echo $t_pnacimiento['template'][36];echo " ";//de la recien nacio y exibio su dui
			}
			echo $data['numero_identidad_informante'];echo " ";
			echo $t_pnacimiento['template'][38];echo " ";//expedido por las autoridades
			echo $data['documento_expedido_informante'];echo ". ";

			if($data['firma_informante']=="si"){
				echo $t_pnacimiento['template'][39];echo " ";//Y firma juntamente con el infrascrito Alcalde y Secretario que autoriza.
			}
			else{
				echo $t_pnacimiento['template'][40];echo " ";//Y no firma por o saber firmar
			}

			if($data['nombre_testigo1']!="")
			{
				echo $t_pnacimiento['template'][41];echo " ";
				echo $data['nombre_testigo1'];echo " ";
				echo $t_pnacimiento['template'][10];echo " ";//y
				echo $data['nombre_testigo2'];echo " ";
				echo $t_pnacimiento['template'][48];echo " ";//con dui de testigo
				echo $data['dui_testigo1'];echo " ";
				echo $t_pnacimiento['template'][10];echo " ";//y
				echo $data['dui_testigo2'];echo " ";
				echo $t_pnacimiento['template'][38];echo " ";//expedido por las autoridades
				echo $data['lugar_expedicion_dui_testigo1'];echo " ";
				echo $t_pnacimiento['template'][10];echo " ";//y
				echo $data['lugar_expedicion_dui_testigo2'];echo " ";
				echo $t_pnacimiento['template'][52];echo " ";//y dan fe de conocer
				echo $data['nombre_madre'];echo " ";
				if($data['genero_reciennacido']=="masculino"){
					echo $t_pnacimiento['template'][56];echo " ";//quien dio a luz
				}
				else{
					echo $t_pnacimiento['template'][55];echo " ";//quien dio a luz
				}
				echo $data['nombre_reciennacido'];echo " ";
				echo $data['apellido_recienacido'];echo " ";
				echo $t_pnacimiento['template'][9];echo " ";
				echo $data['hora_nacimiento'];echo " ";
				echo $t_pnacimiento['template'][13];echo " ";
				echo $data['dia_nacimiento'];echo " ";
				echo $t_pnacimiento['template'][14];echo " ";
				echo $data['mes_nacimiento'];echo " ";
				echo $t_pnacimiento['template'][58];echo " ";
				echo $t_pnacimiento['template'][15];echo " ";
				echo $data['lugar_de_nacimiento'];echo " ";
				echo $data['jurisdiccion'];echo ". ";
				echo $t_pnacimiento['template'][61];echo " - ";
			}

			echo $t_pnacimiento['template'][60];echo ", a ";//Alcaldia Municipal: Santa Rosa Guachipilin
			echo $data['fecha_emision'];echo ". ";

			echo $empresa['nombre_alcalde'];echo " - ";
			echo $data['nombre_padre'];echo " - ";
			echo $empresa['nombre_secretario'];echo ". ";
		?>

		<br><br>
		<div class="row">		
		<div class="col-md-12">
			<?php
				$count = count($marginacion);
				$num=0;
				while($num <$count)
				{
					echo $marginacion[$num];
					echo "<br>";
					echo "<br>";
					$num++;
				}
			?>
		</div>			
		</div>

	</div>



	<div class="col-md-1"></div>
	</div>


	<div class="row">
		<div class="col-md-1" id=""></div>
		<div class="col-md-7" id="">
			<span><strong>Digite la Marginacion</strong></span>
		</div>
		<div class="col-md-4" id="">
			<a href="#" id="guarda_marginacion" class="btn btn-primary">Guarda Marginacion</a>
		</div>
	</div>
	<div class="row">
		<div class="col-md-1" id=""></div>
		<div class="col-md-10" id="marginacion">			
			<textarea class="form-control" id="texto_marginacion" rows="10"></textarea>
		</div>	
		<div class="col-md-1" id=""></div>
	</div>
</div>
