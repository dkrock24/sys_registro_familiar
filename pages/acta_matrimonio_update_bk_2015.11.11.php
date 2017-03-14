<script src="assets/plugins/jquery/jquery-1.11.1.min.js"></script>


<?php
session_start();
header('Content-Type: text/html; charset=UTF-8'); 

include_once("../class_db/class_a_matrimonio.php");
$pages = "partida_detalle";
$id_partida =  $_GET['id'];
$data = selectDetalle($id_partida);

$actas = selectTipoActa();



?>

<script>

function auto_grow(element) {
            element.style.height = "5px";
            element.style.height = (element.scrollHeight)+"px";
        }
    $(document).ready(function(){

var idActa = $("#id_acta1").val();


    	$("#marginar_partida").click(function(){        
            var id = $("#id_partida").val();                
           $(".includ").load("pages/partida_defuncion_detalle.php?id="+id);
        });

        $("#update_acta_matrimonio").click(function(){          	
            var texto_actaM = $("#texto_acta1").val();
            var hombre = $("#hombre1").val();
            var mujer = $("#mujer1").val();
            var alcalde = $("#alcalde1").val();
            var secretario = $("#secretario1").val();
            var id_usuario = $("#id_usuario1").val();
            var idActa = $("#id_acta1").val();
            var tipoActa = $("#tipoActa2").val();
            
            var accion = "update_texto_acta";

            var dataActa = {
            	hombre:hombre,
            	mujer:mujer,
            	accion:accion,
            	texto_actaM:texto_actaM,
          		alcalde:alcalde,
          		secretario:secretario,          		
          		id_usuario:id_usuario,
          		idActa:idActa,
          		tipoActa:tipoActa
      		};
      		insertarTextActaMatrimonio(dataActa);
        });

        function insertarTextActaMatrimonio(data)
	  	{	  		
	    	$.ajax({
	        	url: "class_db/saveActa.php",
	        	type:"post",
	        	data: data,
	        
	        	success: function(){        		
	            	//alert("success");    
	            	$(".includ").load("pages/acta_m_detalle.php?id="+idActa);            	
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
	  .input__label-content{
	    margin-top: -20px;
	}

	#save_acta_matrimonio{
		float: right;
	}
	 textarea{
        resize:none;
        height: 100%;
        }
</style>
<input type="hidden" id="id_usuario1" value="<?php echo $_SESSION['data'][0]; ?>">
<input type="hidden" id="id_acta1" value="<?php echo $data['id_acta']; ?>">



			<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-10" id="partida">
				<br>
				<div class="row">	
				<span><strong>Selecione El Tipo De Acta</strong></span>


					<div class="col-md-8" id="">
								<br><br>
					
					<select class="input__field left" id="tipoActa2" style="float: left;">

						<option value="<?php echo $data['id_tipo_acta']; ?>">
							<?php echo $data['nombre_tipo']; ?>
						</option>
						<?php
							while($row = mysql_fetch_array($actas))
							{
								if($data['nombre_tipo'] != $row['nombre_tipo'])
								{
								?>
								<option value="<?php echo $row['id_tipo_acta']; ?>">
									<?php echo $row['nombre_tipo']; ?>
								</option>
								<?php
								}
							}
						?>
					</select>
					
					<br><br><br>


						<span><strong>Digitar El Acta de Matrimonio</strong></span>
					</div>
					<div class="col-md-4" id="">
						
					</div>
				</div>
				<br>
				<div class="row">			
					<div class="col-md-12" id="texto_acta">			
						<textarea onkeyup="auto_grow(this)" class="form-control" id="texto_acta1"><?php echo $data['acta_texto']; ?></textarea>
					</div>				
				</div>

				<div class="row line">
		            <div class="col-md-6">
		              <span class="input input--hoshi">
		                <input class="input__field input__field--hoshi" type="text" id="hombre1" value="<?php echo $data['nombre1']; ?>" />
		                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
		                  <span class="input__label-content">Nombre Esposo</span></label>
		              </span>
		            </div>
		            <div class="col-md-6">
		              <span class="input input--hoshi">
		                <input class="input__field input__field--hoshi" type="text" id="mujer1" value="<?php echo $data['nombre2']; ?>" />
		                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
		                    <span class="input__label-content">Nombre Esposa</span>
		                  </label>
		              </span>
		            </div>
		        </div>

				<div class="row line">
		            <div class="col-md-6">
		              <span class="input input--hoshi">
		                <input class="input__field input__field--hoshi" type="text" id="alcalde1" value="<?php echo $data['alcalde']; ?>" />
		                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
		                  <span class="input__label-content">Nombre Alcalde</span></label>
		              </span>
		            </div>
		            <div class="col-md-6">
		              <span class="input input--hoshi">
		                <input class="input__field input__field--hoshi" type="text" id="secretario1" value="<?php echo $data['secretario']; ?>" />
		                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
		                    <span class="input__label-content">Secretario Municipal</span>
		                  </label>
		              </span>
		            </div>
		        </div>

		        <div class="row">			
					<div class="col-md-12" id="marginacion">			
						<a href="#" id="update_acta_matrimonio" class="btn btn-primary">Guarda Acta</a>
					</div>				
				</div>
			</div>

			
			



			<div class="col-md-1"></div>
			</div>


