
<?php
session_start();
include_once("../class_db/class_p_divorcio.php");
$id_partida =  $_GET['id'];

$data = selectDetalle($id_partida);

?>

<script>
	$(document).ready(function(){

	        var tipo3 = $("#tipo3").val();     	        
	        if(tipo3=="pagina")
	        {
	          $(".includee").html('<input type="text" class="form-control bg-primary" name="NumeroPagina" id="NumeroPagina3" value="<?php echo $data['numero_pagina']; ?>" placeholder="Numero de Pagina">');
	        }
	        else
	        {
	           $(".includee").html('<input type="text" class="form-control bg-primary" name="NumeroFolio" id="NumeroFolio3" value="<?php echo $data['numero_folio']; ?>" placeholder="Numero de Folio">');
	        }  

	        $("#tipo3").change(function(){
	        	var tipo3 = $("#tipo3").val();     
	        
		        if(tipo3=="pagina")
		        {
		        	
		          $(".includee").html('<input type="text" class="form-control bg-primary" name="NumeroPagina" id="NumeroPagina3" value="<?php echo $data['numero_pagina']; ?>" placeholder="Numero de Pagina">');
		        }
		        else
		        {
		        	
		           $(".includee").html('<input type="text" class="form-control bg-primary" name="NumeroFolio" id="NumeroFolio3" value="<?php echo $data['numero_folio']; ?>" placeholder="Numero de Folio">');
		        }  
	        });
	});
</script>


<form method="post" action="">
<div class="tab-content">
  <div class="tab-pane fade active in" id="tab1_1">
      <div class="row">
        <div class="col-md-12">
          <h3><strong>RELLENER LA INFORMACION DEL FORMULARIO</strong></h3>
          <span class="username">
            <input type="hidden" id="id_usuario" value="<?php echo $_SESSION['data'][0]; ?>">
            <input type="hidden" id="id_partida" value="<?php echo $data['id_partida']; ?>">
          </span>
          <br>
          <div class="row line">
                <div class="col-md-6">
                  <span class="input input--hoshi">
                      <input class="input__field input__field--hoshi" type="text" id="hombre" value="<?php echo $data['hombre'] ?>" />
                      <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                      <span class="input__label-content">Nombre del Señor</span>
                      </label>
                  </span>
                </div>
                <div class="col-md-6">
                  <span class="input input--hoshi">
                      <input class="input__field input__field--hoshi" type="text" id="mujer" value="<?php echo $data['mujer'] ?>" required />
                      <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                      <span class="input__label-content">Nombre de la Señora</span>
                      </label>
                  </span>
                </div>
          </div> 
          
          <div class="row line">
            <div class="col-md-6">
              <span class="input input--hoshi">
                <input class="input__field input__field--hoshi" type="text" id="edad_hombre" value="<?php echo $data['edad_hombre'] ?>" required />
                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                  <span class="input__label-content">Edad del Señor</span></label>
              </span>
            </div>
            <div class="col-md-6">
              <span class="input input--hoshi">
                <input class="input__field input__field--hoshi" type="text" id="edad_mujer" value="<?php echo $data['edad_mujer'] ?>" required />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                    <span class="input__label-content">Edad de la Señora</span>
                  </label>
              </span>
            </div>
          </div>  

          <div class="row line">
            <div class="col-md-6">
              <span class="input input--hoshi">
                <input class="input__field input__field--hoshi" type="text" id="oficio_hombre" value="<?php echo $data['oficio_domicilio_hombre'] ?>" required />
                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                  <span class="input__label-content">Oficio y Domicilio del Señor</span>
                    </label>
                  </span>
            </div>
            <div class="col-md-6">
              <span class="input input--hoshi">
                <input class="input__field input__field--hoshi" type="text" id="oficio_mujer" value="<?php echo $data['oficio_domicilio_mujer'] ?>" required />
                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                  <span class="input__label-content">Oficio y Domicilio de la Señora</span>
                </label>
              </span>
            </div>
          </div> 

          <div class="row line">
            <div class="col-md-6">
              <div class="form-group">                
                <div class="input-group">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">                   
                        <select class="form-control bg-primary" id="tipo3" data-style="white" data-placeholder="Select a country...">                            
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
                      <div class="includee">
                        <input type="text" class="form-control bg-primary" name="NumeroPagina" id="NumeroPagina3" value="<?php echo $data['anio_libro'] ?>" placeholder="Numero de Pagina">
                      </div>                             
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">                
                <div class="input-group">            
                  <div class="row">
                    <div class="col-md-6">
                      <input type="text" class="form-control bg-primary" name="NumeroLibroDivorcio" id="nLibro3" value="<?php echo $data['anio_libro'] ?>" placeholder="Numero del Libro">
                    </div>
                    <div class="col-md-6">
                      <input type="text" class="form-control bg-primary" name="NumeroPartida" id="nPartida3" value="<?php echo $data['partida_numero'] ?>" placeholder="Numero Partida" required>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12" id="">
              <p>Digite el cuerpo de la partida de divorcio..</p>
            </div>             
          </div>

          <div class="row">
            <div class="col-md-12" id="marginacion">      
              <textarea class="form-control" id="texto_cuerpo3" rows="10"><?php echo $data['cuerpo_partida'] ?>
              </textarea>
            </div>  
          </div>
          <input type="button" id="guardar_update_pdivorcio" class="btn btn-primary" value="Guardar Cambios">
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
 	

 	$("#guardar_update_pdivorcio").click(function(){
 		    var accion        = "update_partida_divorcio";
 		    var id_partida		=		  $("#id_partida").val();     
        var padre 			  = 		$("#hombre").val();
        var madre 			  = 		$("#mujer").val();      
        var edad_padre 		= 		$("#edad_hombre").val();
        var edad_madre 		= 		$("#edad_mujer").val();
        var oficio_padre 	= 		$("#oficio_hombre").val();
        var oficio_madre 	= 		$("#oficio_mujer").val();
        var pagina_folio 			= $("#tipo3").val();
        var NumeroPagina 			= $("#NumeroPagina3").val();
        var NumeroFolio 			= $("#NumeroFolio3").val();
        var nLibro 					  = $("#nLibro3").val();
        var nPartida 				  = $("#nPartida3").val();
        var usuario 				  = $("#id_usuario").val();
        var cuerpo           = $("#texto_cuerpo3").val();

        var dataPartida = {
          idPartida:id_partida,
          hombre:padre,
          mujer:madre,
          edad_hombre:edad_padre,
          edad_mujer:edad_madre,
          oficio_hombre:oficio_padre,
          oficio_mujer:oficio_madre,
          pagina_folio:pagina_folio,
          NumeroPagina:NumeroPagina,
          NumeroFolio:NumeroFolio,
          nLibro:nLibro,
          nPartida:nPartida,
          usuario:usuario,
          cuerpo:cuerpo,
          accion:accion
          };

 		updateData(dataPartida);

 	});

 	function updateData(dataPartida)
  	{	
    	$.ajax({
        	url: "class_db/saveData.php",
        	type:"post",
        	data: dataPartida,
        
        	success: function(){        		
            	//alert("success");    
               var id = $("#id_partida").val();   
            	$(".includ").load("pages/partida_divorcio_detalle.php?id="+<?php echo $id_partida; ?>);            	
        	},	
        	error:function(){
            	alert("failure");
        	}
  		});
    }
 })
 </script>







