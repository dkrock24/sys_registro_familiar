


<?php
session_start();
header('Content-Type: text/html; charset=UTF-8'); 
include_once("../class_db/class_a_matrimonio.php");
$pages = "partida_detalle";
$id_partida =  $_GET['id'];
$data = selectDetalle($id_partida);
$marginacion = selectMarginacion(3,$id_partida);
$logo = logo($pages);
$empresa = empresa();
$t_pdivorcio = template_pnacimiento(3);

$id_rol = $_SESSION['data'][11];
$nombre_rol = rol_usuario($id_rol);


?>

<script>
	$("#imprime").click(function (){
		$("#partida").printArea();
	})

	function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data) 
    {
        var mywindow = window.open('', 'Partida', 'height=400,width=800');
        mywindow.document.write('<html><head><title></title>');
        /*optional stylesheet*/ //mywindow.document.write('<link rel="stylesheet" href="main.css" type="text/css" />');
        //mywindow.document.write('<link rel="stylesheet" href="../assets/plugins/bootbox/bootbox.min.js" type="text/css" />');
        mywindow.document.write('<style type="text/css">#fecha_emision{opacity:0;} .logos_header { width:30%; } .logos_escudo{width:40%; float:right;}         		#titulo2{display: inline-block; position:relative; border:0px solid black; width:40%; text-align:center;}        		#titulo{display: inline-block; position:relative; border:0px solid black; width:25%; text-align:center;}        		#titulo_center{text-align:center;}        		#partida{text-align:justify;}    .firmas1{float:left;text-align:center;border:0px solid black;}  .firmas2{float:right;text-align:center;border:0px solid black;}  .firmas{width:100%;border:0px solid red;}		</style>');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10

        mywindow.print();
        mywindow.close();

        return true;
    }

    $(document).ready(function(){
    	$(".encabezado").hide();
    	$(".piedepagina").hide();

    	$("#piedepagina").click(function(){
    		$(".piedepagina").toggle();
    	});
    	$("#encabezado").click(function(){
    		$(".encabezado").toggle();
    	});


    	$("#actualizar_actaM").click(function(){        
            var id = $("#id_actaM").val();                
           $(".includ").load("pages/acta_matrimonio_update.php?id="+id);
        });

        $("#marginar_partida").click(function(){        
            var id = $("#id_partida").val();                
           $(".includ").load("pages/partida_defuncion_marginacion.php?id="+id);
        });

        $("#fecha_emision").click(function(){
        	
        	var fecha = prompt("digite fecha");
        	$("#fecha_partida").text(fecha);
        });
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
.fecha_marginacion{
	border:1px solid grey;
}
.texto{
	text-align:justify;
}
.firmas{
	width: 100%;
	text-align: center;
}
</style>

<div class="row">
	<div class="col-md-1" id=""></div>
	<div class="col-md-11" id="">
		<a href="#" id="actualizar_actaM" class="btn btn-primary">Actualizar</a>
		<a href="#" id="marginar_partida" class="btn btn-primary">Marginar</a>
		<a href="javascript:void(0)" class="btn btn-primary" onclick
		="PrintElem('#total_a_m')" id="imprime">Imprimir</a>
		<a href="" class="btn btn-primary">Descargar</a>
		<a href="#" class="btn btn-primary" id="encabezado">Encabezado</a>
		<a href="#" class="btn btn-primary" id="piedepagina">Pie de Pagina</a>
		<input type="hidden" value="<?php echo $data['id_acta']; ?>" id="id_actaM">
	</div>
</div>
<br>
<div id="total_a_m">
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
		<span class='encabezado'>
			<?php 
				echo  $t_pdivorcio['template'][0]; 

			?>
		</span>
	</div>
	<div class="col-md-1"></div>
</div>
<br>
<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10" id="partida">
	<span class='encabezado'>
		<?php
			echo  $t_pdivorcio['template'][1];  echo " ";
			echo $data['tipo']; echo " ";
			echo $data['numero_tipo'];echo ", ";

			switch ($data['id_tipo_acta']) {
				case '1':
					echo  $t_pdivorcio['template'][29]; 
					break;
				case '2':
					echo  $t_pdivorcio['template'][28]; 
					break;
				case '3':
					echo  $t_pdivorcio['template'][27]; 
					break;
				case '4':
					echo  $t_pdivorcio['template'][26]; 
					break;
			}
			echo " ";
			echo $data['anio'];echo ", ";
			echo  $t_pdivorcio['template'][5]; 

			
			
		?>
	</span>
		
			<?php echo $data['acta_texto'];?>
		
		<br>	<br>	
				
		<div class="row piedepagina">
			<div class="col-md-12">
				<?php
					echo "<strong>". $t_pdivorcio['template'][24];echo "</strong> ";		
					echo $t_pdivorcio['template'][25];echo " ";	
					echo $empresa['nombre_empresa'];echo ": ";	
					echo $empresa['municipio'];echo ". ";	
				?>
				<span id="fecha_partida"></span>
		
			</div>
		</div>
		<a href="#" id="fecha_emision" class="btn btn-primary">Colocar Fecha</a>
	</div>

	
<!--
	<div class="row">
		<div class="col-md-12" id="titulo_center">
		<?php

				while($row = mysql_fetch_array($nombre_rol))
				{
					
					if($row['nombre_rol']=='Secretaria')
					{						
						?>
						<h4><strong><?php  echo $row['primer_nombre']." ".$row['segundo_nombre']." ".$row['primer_apellido']." ".$row['segundo_apellido'];	?></strong></h4>
						<h4>Jefe del Registro del Estado Familiar</h4>
						<?php
					}
				}
			?>
		</div>	
-->
			


	</div>

	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10">
			<table class="firmas">
				<tr>
					<td class="firmas1">
						F____________________________ <br>
						<?php echo $data['alcalde']; ?> <br>
						Alcalde Municipal.
					</td>
					<td class="firmas2">
						F____________________________ <br>
						<?php echo $data['secretario']; ?><br>
						Secretario/a Municipal.
					</td>
				</tr>
			</table>	
		</div>
		<div class="col-md-1"></div>
	</div>





	<div class="col-md-1"></div>
	</div>

		

</div>
