    <script src="assets/plugins/jquery/jquery-1.11.1.min.js"></script>


<?php
session_start();
header('Content-Type: text/html; charset=UTF-8'); 
//include_once("../class_db/class_p_defuncion.php");
include_once("../class_db/class_a_matrimonio.php");
$pages = "partida_detalle";
//$logo = logo($pages);
//$empresa = empresa();
$actas = selectTipoActa();
?>

<script>

function auto_grow(element) {
            element.style.height = "5px";
            element.style.height = (element.scrollHeight)+"px";
        }
    $(document).ready(function(){

    	$("li#menu_li").click(function(){
        var texto = $(this).text();        
            if(texto=="Buscar")        
            {                 
                $(".includ").load("pages/lista_actas.php");             
            }
    	});


    	$("#marginar_partida").click(function(){        
            var id = $("#id_partida").val();                
           $(".includ").load("pages/partida_defuncion_detalle.php?id="+id);
        });

        $("#save_acta_matrimonio").click(function(){          	
            var texto_actaM = $("#texto_actaM").val();
            var hombre 		= $("#hombre").val();
            var mujer 		= $("#mujer").val();
            var alcalde 	= $("#alcalde").val();
            var secretario 	= $("#secretario").val();
            var id_usuario 	= $("#id_usuario").val();
            var id_tipo_acta= $("#tipoActa").val();
            var anioLibro   = $("#anioLibro").val();
            var tipoActa    = $("#tipoActa2").val();
            var numeroFL    = $("#numeroFL").val();

            var accion = "insert_texto_actaM";

            var dataActa = {
            	hombre:hombre,
            	mujer:mujer,
            	accion:accion,
            	texto_actaM:texto_actaM,
          		alcalde:alcalde,
          		secretario:secretario,          		
          		id_usuario:id_usuario,
          		id_tipo_acta:id_tipo_acta,
          		anioLibro:anioLibro,
          		tipoActa:tipoActa,
          		numeroFL:numeroFL


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
	            	//$(".includ").load("pages/acta");            	
	            	$(".A").removeClass("active");
		            $(".B").addClass("active");
		            $("#tab1_1").removeClass("active");
		            
		            $("#tab1_2").addClass("active in");
		            $("#tab1_2").load("pages/lista_actas.php");  
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
	#menu_li{
		cursor: pointer;
	}
	 .color-icon{
        color:#319db5;
    }
	 textarea{
        resize:none;
        }
       .left{
       	text-align: left;
       	float: left;
       	color: black;

       }
</style>

<div class="row">
	<div class="col-md-7" id=""></div>
	<div class="col-md-5" id="">		
		<input type="hidden" id="id_usuario" value="<?php echo $_SESSION['data'][0]; ?>">
	</div>
</div>
<ul class="nav nav-tabs">
  <li id="menu_li" class="A active"><a href="#tab1_1" data-toggle="tab"><i class="fa fa-plus-circle color-icon"></i>Nueva</a></li>
  <li id="menu_li" class="B "><a href="#tab1_2" data-toggle="tab"><i class="fa fa-search color-icon"></i>Buscar</a></li>
  <li id="menu_li" class="C "><a href="#tab1_3" data-toggle="tab"><i class="fa fa-file color-icon"></i>Configurar</a></li>
</ul>
<br>
<div id="total">
	<div class="tab-content">
		<div class="tab-pane fade active in" id="tab1_1">
			<br>
			<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-10" id="partida">
				<br>
				<div class="row">		
					<div class="col-md-8" id="">
						<span><strong>Selecione El Tipo De Acta</strong></span>
						<br><br>
					
						<select class="input__field left" id="tipoActa" style="float: left;">
							<?php
								while($row = mysql_fetch_array($actas))
								{
									?>
									<option value="<?php echo $row['id_tipo_acta']; ?>">
										<?php echo $row['nombre_tipo']; ?>
									</option>
									<?php
								}
							?>
						</select>
					
						<br><br><br>

					</div>
						<div class="col-md-4" id="">
							<b>Digite el Año</b>                <br><br>
	        				<input type="text" class="input__field left" name="anioLibro" id="anioLibro" placeholder="Numero">                
	        			</div>
						
					</div>

				<div class="row">		
					<div class="col-md-8" id="">
						<b>Selecionar Tipo</b><br>
						<div class="form-group">                   
					        <select class="input__field left" id="tipoActa2" data-style="white" data-placeholder="Select a country...">                            
					            <option value="pagina">A Pagina</option>
					            <option value="folio">A Folio</option>
					        </select>
					    </div>
					</div>

					<div class="col-md-4" id="">
						<b>Digite el Numero de Folio o Pagina</b>                <br>
	        			<input type="text" class="input__field left" name="numeroFL" id="numeroFL" placeholder="Numero">                
	        		</div>
				</div>		
			</div>
			</div>
			<br>
				<div class="row">						
					<div class="col-md-12" id="texto_acta">		
						<span><strong>Digitar El Acta</strong></span>			
						<textarea onkeyup="auto_grow(this)" class="form-control" id="texto_actaM"></textarea>
					</div>									
				</div>

				<div class="row line">
		            <div class="col-md-6">
		              <span class="input input--hoshi">
		                <input class="input__field input__field--hoshi" type="text" id="hombre" required />
		                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
		                  <span class="input__label-content">Nombre Esposo</span></label>
		              </span>
		            </div>
		            <div class="col-md-6">
		              <span class="input input--hoshi">
		                <input class="input__field input__field--hoshi" type="text" id="mujer" required />
		                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
		                    <span class="input__label-content">Nombre Esposa</span>
		                  </label>
		              </span>
		            </div>
		        </div>

				<div class="row line">
		            <div class="col-md-6">
		              <span class="input input--hoshi">
		                <input class="input__field input__field--hoshi" type="text" id="alcalde" required />
		                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
		                  <span class="input__label-content">Nombre Alcalde</span></label>
		              </span>
		            </div>
		            <div class="col-md-6">
		              <span class="input input--hoshi">
		                <input class="input__field input__field--hoshi" type="text" id="secretario" required />
		                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
		                    <span class="input__label-content">Secretario Municipal</span>
		                  </label>
		              </span>
		            </div>
		        </div>

		        <div class="row">			
					<div class="col-md-12" id="marginacion">			
						<a href="#" id="save_acta_matrimonio" class="btn btn-primary">Guarda Acta</a>
					</div>				
				</div>
		

			<div class="col-md-1"></div>
		</div>

		<div class="tab-pane includ fade" id="tab1_2"></div>

  		<div class="tab-pane fade" id="tab1_3"></div>
		</div>		
</div>

