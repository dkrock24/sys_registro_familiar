


<?php
session_start();
include_once("../class_db/class_p_nacimiento.php");
$id_partida =  $_GET['id'];

$data = selectDetalle($id_partida);


//var_dump($data);
?>

<script>
	$(document).ready(function(){


	        var tipo2 = $("#tipo2").val();     	        
	        if(tipo2=="pagina")
	        {
	          $(".includee").html('<input type="text" class="form-control bg-primary" name="NumeroPagina" id="NumeroPagina1" value="<?php echo $data['numero_pagina']; ?>" placeholder="Numero de Pagina">');
	        }
	        else
	        {
	           $(".includee").html('<input type="text" class="form-control bg-primary" name="NumeroFolio" id="NumeroFolio1" value="<?php echo $data['numero_folio']; ?>" placeholder="Numero de Folio">');
	        }  

	        $("#tipo2").change(function(){
	        	var tipo2 = $("#tipo2").val();     
	        
		        if(tipo2=="pagina")
		        {
		        	
		          $(".includee").html('<input type="text" class="form-control bg-primary" name="NumeroPagina" id="NumeroPagina1" value="<?php echo $data['numero_pagina']; ?>" placeholder="Numero de Pagina">');
		        }
		        else
		        {
		        	
		           $(".includee").html('<input type="text" class="form-control bg-primary" name="NumeroFolio" id="NumeroFolio1" value="<?php echo $data['numero_folio']; ?>" placeholder="Numero de Folio">');
		        }  
	        });
	});
</script>


<form method="post" action="">
<div class="tab-content">
  <div class="tab-pane fade active in" id="tab1_1">
    <div class="row">
      <div class="col-md-12">
        <h3><strong>Rellener La Informacion Del Formulario</strong>
          <span class="username">
          	<input type="hidden" id="id_usuario" value="<?php echo $_SESSION['data'][0]; ?>">
          	<input type="hidden" id="id_partida" value="<?php echo $data['id_pnacimiento']; ?>">
          </span>
        </h3>  

          <div class="row line">
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="padre1" value="<?php echo $data['nombre_padre']; ?>" />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Nombre del Padre</span>
                  </label>
              </span>
            </div>
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="madre1" value="<?php echo $data['nombre_madre']; ?>" required />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Nombre de la Madre</span>
                  </label>
              </span>
            </div>
          </div> 
          <div class="row line">
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="edad_padre1" value="<?php echo $data['edad_padre']; ?>" required />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Edad del padre</span>
                  </label>
              </span>
            </div>
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="edad_madre1" value="<?php echo $data['edad_madre']; ?>" required />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Edad de la Madre</span>
                  </label>
              </span>
            </div>
          </div>    
          <div class="row line">
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="estado_padre1" value="<?php echo $data['estado_padre']; ?>" required />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Estado Civil del padre</span>
                  </label>
              </span>
            </div>
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="estado_madre1" value="<?php echo $data['estado_madre']; ?>" required />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Estado Civil de la Madre</span>
                  </label>
              </span>
            </div>
          </div>     
          <div class="row line">
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="oficio_padre1" value="<?php echo $data['oficio_padre']; ?>" required />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Oficio/Profesion del Padre</span>
                  </label>
              </span>
            </div>
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="oficio_madre1" value="<?php echo $data['oficio_madre']; ?>" required />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Oficio/Profesion de la Madre</span>
                  </label>
              </span>
            </div>
          </div> 
          <div class="row line">
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="nacionalidad_padre1" value="<?php echo $data['nacionalidad_padre']; ?>" />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Nacionalidad del Padre</span>
                  </label>
              </span>
            </div>
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="nacionalidad_madre1" value="<?php echo $data['nacionalidad_madre']; ?>" />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Nacionalidad de la Madre</span>
                  </label>
              </span>
            </div>
          </div>
          <div class="row line">
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="origen_padre1" value="<?php echo $data['origen_padre']; ?>" required />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Originario de </span>
                  </label>
              </span>
            </div>
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="origen_madre1" value="<?php echo $data['origen_madre']; ?>" required />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Originaria de </span>
                  </label>
              </span>
            </div>
          </div>
          <div class="row line">
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="domiclio_padre1" value="<?php echo $data['domicilio_padre']; ?>" required />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Domicilio del padre</span>
                  </label>
              </span>
            </div>
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="domiclio_madre1" value="<?php echo $data['domicilio_padre']; ?>" required />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Domicilio de la Madre</span>
                  </label>
              </span>
            </div>
          </div>
          <div class="row line">
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="parentesco_emisor1" value="<?php echo $data['parentesco_informante']; ?>" required />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Parentesco de la persona que emitio estos datos</span>
                  </label>
              </span>
            </div>
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="dui_emisor1" value="<?php echo $data['numero_identidad_informante']; ?>" required />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Numero de identidad</span>
                  </label>
              </span>
            </div>
          </div>
          <div class="row line">
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="dui_emisor_expedido1" value="<?php echo $data['documento_expedido_informante']; ?>" required />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Documento Expedido Por Las Autoridades</span>
                  </label>
              </span>
            </div>
            <div class="col-md-6">
              
                    <div class="form-group">
                          <label>Firma Esta Persona</label><br><br>
                          <select class="form-control form-white" id="firma_emisor1" data-style="white" data-placeholder="Select a country...">
                          <?php
                          	if($data['firma_informante']=="si"){
                          		?>
                          			<option value="si">SI</option>
                          			<option value="no">NO</option>
                          		<?php
                          	}
                          	else{
                          		?>
                          			<option value="no">NO</option>
                          			<option value="si">SI</option>                          			
                          		<?php
                          	}
                          ?>                  
                          </select>
                        </div>
            </div>
          </div>
          <div class="row line">
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="nombre_testigo11" value="<?php echo $data['nombre_testigo1']; ?>" />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Nombre del Primer Testigo</span>
                  </label>
              </span>
            </div>
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="nombre_testigo21" value="<?php echo $data['nombre_testigo2']; ?>" />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Nombre del Segundo Testigo</span>
                  </label>
              </span>
            </div>
          </div>
          <div class="row line">
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="dui_testigo11" value="<?php echo $data['dui_testigo1']; ?>" />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Numero Unico de Identidad Testigo 1</span>
                  </label>
              </span>
            </div>
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="dui_testigo21" value="<?php echo $data['dui_testigo2']; ?>" />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Numero Unico de Identidad Testigo 2</span>
                  </label>
              </span>
            </div>
          </div>
          <div class="row line">
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="dui_testigo1_expedicion1" value="<?php echo $data['lugar_expedicion_dui_testigo1']; ?>" />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Lugar de Expedicion DUI Testigo 1</span>
                  </label>
              </span>
            </div>
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="dui_testigo2_expedicion1" value="<?php echo $data['lugar_expedicion_dui_testigo2']; ?>" />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Lugar de Expedicion DUI Testigo 2</span>
                  </label>
              </span>
            </div>
          </div>
          <div class="row line">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                    <span class="input input--hoshi">
                      <input class="input__field input__field--hoshi" type="text" id="nombre_recienacido1" value="<?php echo $data['nombre_reciennacido']; ?>" required />
                      <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                      <span class="input__label-content">Nombres del Bebe</span>
                      </label>
                    </span>                        
                    </div>
                    <div class="col-md-6">
                        <span class="input input--hoshi">
                      <input class="input__field input__field--hoshi" type="text" id="apellido_recienacido1" value="<?php echo $data['apellido_recienacido']; ?>" required />
                      <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                      <span class="input__label-content">Apellidos del Bebe</span>
                      </label>
                    </span>    

                    </div>                    
                </div>
              
            </div>
            <div class="col-md-6">
                      <div class="form-group">
                          <label>Genero</label><br><br>
                          <select class="form-control form-white" id="genero_bebe1" data-style="white" data-placeholder="Select a country...">
                          <?php
                          	if($data['genero_reciennacido']=='masculino')
                          	{
                          		?>
                          			<option value="masculino">Masculino</option>
                            		<option value="femenino">Femenino</option>
                          		<?php
                          	}
                          	else
                          	{
                          		?>
                            		<option value="femenino">Femenino</option>
                            		<option value="masculino">Masculino</option>
                          		<?php
                          	}
                          ?>                            
                          </select>
                        </div>
            </div>
          </div>
          <div class="row line">
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="lugar_nacimiento1" value="<?php echo $data['lugar_de_nacimiento']; ?>" required />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Lugar de Nacimiento</span>
                  </label>
              </span>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-4">
                  <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="dia1" value="<?php echo $data['dia_nacimiento']; ?>" required />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                  <span class="input__label-content">DIA</span>
                  </label>
                  </span>
                </div>
                <div class="col-md-4">
                  <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="mes1" value="<?php echo $data['mes_nacimiento']; ?>" required />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                  <span class="input__label-content">MES</span>
                  </label>
                  </span>
                </div>
                <div class="col-md-4">
                  <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="anio1" value="<?php echo $data['anio_nacimiento']; ?>" required />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                  <span class="input__label-content">ANIO</span>
                  </label>
                  </span>
                </div>
              </div>
            </div>
          </div>
          <div class="row line">
            <div class="col-md-6">
             <div class="form-group">                
                  <div class="input-group">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Tipo</label><br><br>
                          <select class="form-control bg-primary" id="tipo2" data-style="white" data-placeholder="Select a country...">                            
                          <?php
                          	if($data['numero_pagina']!='')
                          	{
                          		?>
                          			<option value="pagina">A Pagina</option>
                          			<option value="folio">A Folio</option>
                          		<?php
                          	}
                          	if($data['numero_folio']!='')
                          	{
                          		?>
                          			<option value="folio">A Folio</option>
                          			<option value="pagina">A Pagina</option>                       			
                          		<?php
                          	}
                          ?>
                            
                          </select>
                        </div>
                      </div>

                      <div class="col-md-6">     
                      <br><br>                          
                        <div class="includee">
                          
                        </div>                             
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-md-6">
                      Numero del Libro
                        <input type="text" class="form-control bg-primary" name="NumeroLibropartidas" id="nLibro1" value="<?php echo $data['numero_libro']; ?>" placeholder="Numero del Libro">
                      </div>
                      <div class="col-md-6">
                      Numero Partida
                      <input type="text" class="form-control bg-primary" name="NumeroPartida" id="nPartida1" value="<?php echo $data['numero_partida']; ?>" placeholder="Numero Partida" required>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-md-6">
               	<span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="hora_nacimiento1" value="<?php echo $data['hora_nacimiento']; ?>" required />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Hora de Nacimiento</span>
                  </label>
                </span>

                <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="jurisdiccion1" value="<?php echo $data['jurisdiccion']; ?>" required />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Jurisdiccion</span>
                  </label>
                </span>

                 <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="fecha_emision1" value="<?php echo $data['fecha_emision']; ?>" required />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Fecha de Creacion de la partida</span>
                  </label>
                </span>
                <br><br><br>

              <input type="button" id="actualizar1" data-toggle="modal" data-target="#colored-header" class="btn btn-primary" value="Guardar Cambios">
            </div>
          </div>

      </div>
    </div>
  </div>
 </div>
 </form>


 <div class="modal fade" id="colored-header" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header bg-primary">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
                  <h4 class="modal-title"><strong>Importante</strong> </h4>
                </div>
                <div class="modal-body">
                  <p>Desea guardar los cambios en la informacion</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default btn-embossed" data-dismiss="modal">Cancelar</button>
                  <button type="button" id="actualizar" class="btn btn-primary btn-embossed" data-dismiss="modal">Guardar Cambios</button>
                </div>
              </div>
            </div>
          </div>


 <script>

 $(document).ready(function(){
 	

 	$("#actualizar").click(function(){
 		var accion = "update";
 		var id_partida		=		$("#id_partida").val();
 		var d 				=  		$("#dia1").val();
        var m 				=  		$("#mes1").val();        
        var padre 			= 		$("#padre1").val();
        var madre 			= 		$("#madre1").val();      
        var edad_padre 		= 		$("#edad_padre1").val();
        var edad_madre 		= 		$("#edad_madre1").val();

        var estado_padre1    =     $("#estado_padre1").val();
        var estado_madre1    =     $("#estado_madre1").val();

        
        var oficio_padre 	= 		$("#oficio_padre1").val();
        var oficio_madre 	= 		$("#oficio_madre1").val();
        var nacionalidad_padre 		= $("#nacionalidad_padre1").val();
        var nacionalidad_madre 		= $("#nacionalidad_madre1").val();
        var origen_padre 			= $("#origen_padre1").val();
        var origen_madre 			= $("#origen_madre1").val();
        var domiclio_padre 			= $("#domiclio_padre1").val();
        var domiclio_madre 			= $("#domiclio_madre1").val();
        var parentesco_emisor 		= $("#parentesco_emisor1").val();
        var dui_emisor 				= $("#dui_emisor1").val();
        var dui_emisor_expedido 	= $("#dui_emisor_expedido1").val();
        var firma_emisor 			= $("#firma_emisor1").val();
        var nombre_testigo1 		= $("#nombre_testigo11").val();
        var nombre_testigo2 		= $("#nombre_testigo21").val();
        var dui_testigo1 			= $("#dui_testigo11").val();
        var dui_testigo2 			= $("#dui_testigo21").val();
        var dui_testigo1_expedicion = $("#dui_testigo1_expedicion1").val();
        var dui_testigo2_expedicion = $("#dui_testigo2_expedicion1").val();
        var nombre_recienacido 		= $("#nombre_recienacido1").val();
        var apellido_recienacido 	= $("#apellido_recienacido1").val();
        var genero_bebe 			= $("#genero_bebe1").val();
        var lugar_nacimiento 		= $("#lugar_nacimiento1").val();
        var pagina_folio 			= $("#tipo2").val();
        var NumeroPagina 			= $("#NumeroPagina1").val();
        var NumeroFolio 			= $("#NumeroFolio1").val();
        var nLibro 					= $("#nLibro1").val();
        var nPartida 				= $("#nPartida1").val();
        var hora_nacimiento 		= $("#hora_nacimiento1").val();
        var jurisdisccion 			= $("#jurisdiccion1").val();
        var fecha_emision 			= $("#fecha_emision1").val();
        var usuario 				= $("#id_usuario").val();
        var aanio 					= $("#anio1").val();

        var dataPartida = {
          idPartida:id_partida,
          padre:padre,
          madre:madre,
          edad_padre:edad_padre,
          edad_madre:edad_madre,
          estado_padre1:estado_padre1,
          estado_madre1:estado_madre1,
          oficio_padre:oficio_padre,
          oficio_madre:oficio_madre,
          nacionalidad_padre:nacionalidad_padre,
          nacionalidad_madre:nacionalidad_madre,
          origen_padre:origen_padre,
          origen_madre:origen_madre,
          domiclio_padre:domiclio_padre,
          domiclio_madre:domiclio_madre,
          parentesco_emisor:parentesco_emisor,
          dui_emisor:dui_emisor,
          dui_emisor_expedido:dui_emisor_expedido,
          firma_emisor:firma_emisor,
          nombre_testigo1:nombre_testigo1,
          nombre_testigo2:nombre_testigo2,
          dui_testigo1:dui_testigo1,
          dui_testigo2:dui_testigo2,
          dui_testigo1_expedicion:dui_testigo1_expedicion,
          dui_testigo2_expedicion:dui_testigo2_expedicion,
          nombre_recienacido:nombre_recienacido,
          apellido_recienacido:apellido_recienacido,
          genero_bebe:genero_bebe,
          lugar_nacimiento:lugar_nacimiento,
          pagina_folio:pagina_folio,
          NumeroPagina:NumeroPagina,
          NumeroFolio:NumeroFolio,
          nLibro:nLibro,
          nPartida:nPartida,
          hora_nacimiento:hora_nacimiento,
          dia:d,
          mes:m,
          anio:aanio,
          usuario:usuario,
          jurisdisccion:jurisdisccion,
          fecha_emision:fecha_emision,
          accion:accion
          };

 		updateData(dataPartida);

 	});

 	function updateData(dataPartida)
  	{	
  		var id_partida		=		$("#id_partida").val();
    	//alert(dataPartida['padre']);
    	$.ajax({
        	url: "class_db/saveData.php",
        	type:"post",
        	data: dataPartida,
        
        	success: function(){        		
            	//alert("success");    
            	$(".includ").load("pages/partida_detalle.php?id="+id_partida);            	
        	},	
        	error:function(){
            	alert("failure");
        	}
  		});
    }
 })
 </script>







