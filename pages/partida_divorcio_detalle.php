


<?php
session_start();
header('Content-Type: text/html; charset=UTF-8'); 
include_once("../class_db/class_p_divorcio.php");
$pages = "partida_detalle";
$id_partida =  $_GET['id'];
$data = selectDetalle($id_partida);
$marginacion = selectMarginacion(4,$id_partida);
$logo = logo($pages);
$empresa = empresa();
$t_pdivorcio = template_pnacimiento(4);

$id_rol = $_SESSION['data'][0];
$id_cargo = rol_usuario($id_rol);
$nombre_cargo = cargo_usuario($id_cargo['id_cargo']);



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
        mywindow.document.write('<style type="text/css">#fecha_emision{opacity:0;} .logos_header { width:30%; } .logos_escudo{width:40%; float:right;}         		#titulo2{display: inline-block; position:relative; border:0px solid black; width:40%; text-align:center;}        		#titulo{display: inline-block; position:relative; border:0px solid black; width:25%; text-align:center;}        		#titulo_center{text-align:center;}        		#partida{width:82%; margin-left:60px; marging-right:20px; line-height:1.5;text-align:justify;} .fecha_marginacion{opacity:0;}       		</style>');
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


    	$("#actualizar_partida").click(function(){        
            var id = $("#id_partida").val();                
           $(".includ").load("pages/partida_divorcio_update.php?id="+id);
        });

        $("#eliminar_partida").click(function(){

        	

            var id = $("#id_partida").val();                
        	//$(".includ").load("pages/partida_update.php?id="+id);
           	var data = {
           			accion:"eliminarPartidaDivorcio",
           			id:id
           		}
           	deletePartida(data);

           
        });    
        function deletePartida(data)    {
        	$.ajax({
	            url: "class_db/saveActa.php",
	            type:"post",
	            data: data,

	            success: function(){   	            	  
	            	$(".includ").load("pages/lista_partidas_divorcio.php");
	            },
	            error:function(){
	                alert("Error.. No se subio la imagen");
	            }
        	});  
        }

        $("#marginar_partida").click(function(){        
            var id = $("#id_partida").val();                
           $(".includ").load("pages/partida_divorcio_marginacion.php?id="+id);
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
</style>

<div class="row">
	<div class="col-md-1" id=""></div>
	<div class="col-md-11" id="">
	<?php
	if($nombre_cargo['nombre_cargo']=='Administrador'){
		?>
			<a href="#"  data-toggle="modal" data-target="#colored-header" class="btn btn-primary">Eliminar</a>
		<?php
	}
	?>
		<a href="#" id="actualizar_partida" class="btn btn-primary">Actualizar</a>
		<a href="#" id="marginar_partida" class="btn btn-primary">Marginar</a>
		<a href="javascript:void(0)" class="btn btn-primary" onclick
		="PrintElem('#total')" id="imprime">Imprimir</a>
		<!--<a href="" class="btn btn-primary">Descargar</a>-->
		<a href="#" class="btn btn-primary" id="encabezado">Encabezado</a>
		<a href="#" class="btn btn-primary" id="piedepagina">Pie de Pagina</a>
		<input type="hidden" value="<?php echo $data['id_partida']; ?>" id="id_partida">
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
		<span class='encabezado'>
			<?php echo  $t_pdivorcio['template'][0]; ?>
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
			echo $t_pdivorcio['template'][1];echo " ";
			echo $data['pagina_folio'];echo " ";
			echo $data['numero_folio'], $data['numero_pagina'];echo ", ";
			echo $t_pdivorcio['template'][2];echo " ";
			echo $data['anio_libro'];echo ", ";

			echo $t_pdivorcio['template'][3];echo " ";
			?>
			</span>
			<?php
			echo $t_pdivorcio['template'][11];echo "  ";
			echo $data['partida_numero'];echo " - ";
			echo $t_pdivorcio['template'][4];echo "  ";
			echo $data['hombre'];echo " ";
			echo $t_pdivorcio['template'][5];echo " ";
			echo $data['mujer'];echo "";
			echo $t_pdivorcio['template'][6];echo " ";
			echo $data['edad_hombre'];echo " ";
			echo $t_pdivorcio['template'][7];echo ", ";
			echo $data['oficio_domicilio_hombre'];echo " ";
			echo $t_pdivorcio['template'][8];echo " ";
			echo $data['edad_mujer'];echo " ";
			echo $t_pdivorcio['template'][7];echo ", ";
			echo $data['oficio_domicilio_mujer'];echo ", ";
			echo $data['cuerpo_partida'];echo " ";

		?>
		<span id="fecha_partida"></span>
		
		
		
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
		<div class="row piedepagina">
			<div class="col-md-12">
				<?php
					echo "<strong>". $t_pdivorcio['template'][9];echo "</strong> ";		
					echo $t_pdivorcio['template'][10];echo " ";	
					echo $empresa['nombre_empresa'];echo ": ";	
					echo $empresa['municipio'];echo ", ";	
				?>
			</div>
		</div>

	</div>

	<div class="row">
		<div class="col-md-12" id="titulo_center">
			<h4><strong><?php  echo $_SESSION['data'][5]." ".$_SESSION['data'][6]." ".$_SESSION['data'][7]." ".$_SESSION['data'][8];	?></strong></h4>
			<h4><?php echo $nombre_cargo['nombre_cargo'] ?></h4>
		</div>	
	</div>

	<a href="#" id="fecha_emision" class="btn btn-primary">Colocar Fecha</a>

	<div class="col-md-1"></div>
	</div>

		

</div>

<!-- BEGIN MODALS -->
          <div class="modal fade" id="colored-header" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header bg-primary">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
                  <h4 class="modal-title"><strong>Editar</strong> Menus Principales</h4>
                </div>
                <div class="modal-body">
                <div class="row tab">
                		<div class="col-md-2 titulos">         		</div>
                		<div class="col-md-9">
                			<h2>Desea Eliminar La Partida !</h2>
                		</div>
                		<div class="col-md-1 titulos">         		</div>
                	</div>
                
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default btn-embossed" data-dismiss="modal">Cancelar</button>
                  <button type="button" class="btn btn-primary btn-embossed" id="eliminar_partida" data-dismiss="modal">Eliminar</button>
                </div>
              </div>
            </div>
          </div>
          <!-- END MODALS -->
