


<?php
session_start();
header('Content-Type: text/html; charset=UTF-8'); 
include_once("../class_db/class_p_genericas.php");
$pages = "partida_detalle";
$id_partida =  $_GET['id'];
$data = selectDetalle($id_partida);
$marginacion = selectMarginacion($id_partida);
$logo = logo($pages);
$empresa = empresa();
$t_pdivorcio = template_pdefuncion(4);

$id_rol = $_SESSION['data'][0];
$id_cargo = rol_usuario2($id_rol);
$nombre_cargo = cargo_usuario($id_cargo['id_cargo']);


?>

<script>
function auto_grow(element) {
            element.style.height = "5px";
            element.style.height = (element.scrollHeight)+"px";
        }

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
        mywindow.document.write('<style type="text/css">#fecha_emision{opacity:0;} .logos_header { width:30%; } .logos_escudo{width:40%; float:right;}         		#titulo2{display: inline-block; position:relative; border:0px solid black; width:40%; text-align:center;}        		#titulo{display: inline-block; position:relative; border:0px solid black; width:25%; text-align:center;}        		#titulo_center{text-align:center;}        		#partida{width:82%; margin-left:60px; marging-right:20px; line-height:1.5;text-align:justify;} .fecha_marginacion{opacity:0;}  .cargo{margin-top:-20px;}  .fecha_marginacion{display: none;}   		</style>');
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

    	$(".marginacion_texto").hide();
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
           $(".includ").load("pages/partida_generales_update.php?id="+id);
        });

        $("#marginar_partida").click(function(){        
            $(".marginacion_texto").show();                
           //$(".includ").load("pages/partida_divorcio_marginacion.php?id="+id);
        });

        $("#cancelar").click(function(){        
            $(".marginacion_texto").hide();                
           //$(".includ").load("pages/partida_divorcio_marginacion.php?id="+id);
        });        

        $("#fecha_emision").click(function(){
        	
        	var fecha = prompt("digite fecha");
        	$("#fecha_partida").text(fecha);
        });

        $("#eliminar_partida").click(function(){

        	

            var id = $("#id_partida").val();                
        	//$(".includ").load("pages/partida_update.php?id="+id);
           	var data = {
           			accion:"eliminarPartidaGeneral",
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
	            	$(".includ").load("pages/lista_partidas_generales.php");
	            },
	            error:function(){
	                alert("Error.. No se subio la imagen");
	            }
        	});  
        }

        $("#guardar_m").click(function(){        	
        	
        	var id_partida = <?php echo $data['id_partida']; ?>;
        	var id_tipo    = <?php echo $data['id_tipo']; ?>;
        	var id_usuario = <?php echo $_SESSION['data'][0]; ?>;
        	var marginacion = $("#detalle_marginacion").val();
        	var action = "insert_marginacion";


        	var data = {
        		id_partida:id_partida,
        		id_tipo:id_tipo,
        		id_usuario:id_usuario,
        		marginacion:marginacion,
        		action:action
        	}
        	
        	insert(data);
        	
        });

    });
function insert(data){        	
        	$.ajax({
	            url: "class_db/forms.php",
	            type:"post",
	            data: data,          
	            
	            success: function(result){
	              $(".includ").load("pages/lista_partidas_generales_detalle.php?id="+<?php echo $data['id_partida']; ?>);
	            },
	            error:function(){
	                alert("Error al Guardar la partida de Nacimiento");
	            }
      		});
        }
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
#guardar_m,#cancelar{
	float: right;
	margin-top: 5px;
}
</style>

<div class="row">
	
	<div class="col-md-12" id="">
	<?php
	if($nombre_cargo['nombre_cargo']=='Administrador'){
		?>
			<a href="#"  data-toggle="modal" data-target="#colored-header" class="btn btn-warning">Eliminar</a>
		<?php
	}
	?>
		<a href="#" id="actualizar_partida" class="btn btn-primary">Actualizar</a>
		<a href="#" id="marginar_partida" class="btn btn-primary">Marginar</a>
		<a href="javascript:void(0)" class="btn btn-primary" onclick
		="PrintElem('#total')" id="imprime">Imprimir</a>
		<a href="#" id="fecha_emision" class="btn btn-primary">Colocar Fecha</a>
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
		<div class="col-md-10" id="partida">
		<b><hr></b>
			<span class='encabezado'>
				<?php
					echo  $t_pdivorcio['template'][0];echo "<br><br>";
					echo $t_pdivorcio['template'][1];echo " ";
					echo $data['pagina'];echo " ";
					echo $data['numero_pagina']. ", ";
					echo $t_pdivorcio['template'][12];echo " ";
					echo $data['partida_generada'];echo " ";
					echo $t_pdivorcio['template'][13];echo " ";
					echo $data['numero_libro'];echo ", ";
					echo $t_pdivorcio['template'][3];echo " ";
				?>
			</span>
			<?php
				echo $data['detalle'];echo "<br> ";	
				//echo $t_pdivorcio['template'][14];echo " ";		
			?>			
					
			<br>
			

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
					echo $t_pdivorcio['template'][14];echo " ";							
					
					}
					?>
				</div>			
			</div>

			<div class="row piedepagina">
				<div class="col-md-12">
					<?php
					echo "<strong>". $t_pdivorcio['template'][9];echo "</strong> ";		
					echo $t_pdivorcio['template'][10];echo " ";	
					echo $empresa['nombre_empresa'];echo ": ";	
					echo $empresa['municipio'];echo ", ";	
					?>
					<span id="fecha_partida"></span>
				</div>
			</div>

		

		</div>
		<div class="row">
				<div class="col-md-12" id="titulo_center">
					<h4><strong><?php  echo $_SESSION['data'][5]." ".$_SESSION['data'][6]." ".$_SESSION['data'][7]." ".$_SESSION['data'][8];	?></strong></h4>
					<h4 class="cargo"><?php echo $nombre_cargo['nombre_cargo'] ?></h4>
				</div>	
			</div>

		<div class="col-md-1"></div>
	</div>

	<div class="row marginacion_texto">
		<div class="col-md-1"></div>
				<div class="col-md-10">
					<b>Insertar Texto a Marginar</b>
					<textarea onkeyup="auto_grow(this)" class="form-control area-border" id="detalle_marginacion"></textarea>
					<input type="button" id="guardar_m" class="btn btn-primary" value="Guardar">
					<input type="button" id="cancelar" class="btn btn-primary" value="Cancelar">
					
				</div>
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


