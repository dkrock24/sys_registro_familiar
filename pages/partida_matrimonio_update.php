
<?php
session_start();
include_once("../class_db/class_p_matrimonio.php");
$id_partida =  $_GET['id'];

$data = selectDetalle($id_partida);

 

?>

<script>

	$(document).ready(function(){

    var tipo = $("#tipo_1").val();
    
    if(tipo=="pagina"){
      $("#paginaa").show();
      $("#folioo").hide();
      $("#folioo").val("");
    }else{
      $("#folioo").show();
      $("#paginaa").hide();
      $("#paginaa").val("");
      
    }

	        $("#tipo_1").change(function(){
	        	var tipo = $("#tipo_1").val();     
          if(tipo=="pagina"){
      $("#paginaa").show();
      $("#folioo").hide();
      $("#folioo").val("");
    }else{
      $("#folioo").show();
      $("#paginaa").hide();
      $("#paginaa").val("");
      
    }  
		        
	        });

          
  $("#msg_alert").click(function(){
    
        var esposo               = $("#senior1").val();
        var esposa              = $("#seniora1").val();       
        var edad_esposo         = $("#edad_senior1").val();
        var edad_esposa         = $("#edad_seniora1").val();
        var oficio_esposo       = $("#oficio_casado1").val();
        var oficio_esposa       = $("#oficio_casada1").val();
        var nacionalidad_esposo = $("#nacionalidad_casado1").val();
        var nacionalidad_esposa = $("#nacionalidad_casada1").val();
        var origen_esposo       = $("#origen_casado1").val();
        var origen_esposa       = $("#origen_casada1").val();
        var dui_casado          = $("#dui_casado1").val();
        var dui_casada          = $("#dui_casada1").val();
        var estado_casado      = $("#estado_casado1").val();
        var estado_casada      = $("#estado_casada1").val();
        var padre_casado        = $("#padre_casado1").val();
        var madre_casado        = $("#madre_casado1").val();
        var padre_casada        = $("#padre_casada1").val();
        var madre_casada        = $("#madre_casada1").val();
        var nacionalidad_padre_esposo = $("#nacionalidad_padre_esposo1").val();
        var nacionalidad_padre_esposa = $("#nacionalidad_padre_esposa1").val();
        var nombre_testigo1           = $("#nombre_testigo11").val();
        var nombre_testigo2           = $("#nombre_testigo21").val();
        var fecha_matrimonio          = $("#fecha_matrimonio1").val();
        var lugar_matrimonio          = $("#lugar_matrimonio1").val();
        var representante_legal       = $("#representante_legal1").val();
        var genero_representate_legal = $("#genero_representate_legal1").val();
        var descripcion               = $("#descripcion1").val();
        var pagina_folio  = $("#tipo_1").val();
        var pagina_1  = $("#paginaa").val();
        var folio_1   = $("#folioo").val();
        var nLibro        = $("#nLibro1").val();
        var nPartida      = $("#nPartida1").val();
        var idpartida     = $("#idpartida").val();
        var usuario = $("#id_usuario").val();
        var accion        = "updatePMatrimonio";






        

        var dataPartida = {
          esposo:esposo,
          esposa:esposa,
          edad_esposo:edad_esposo,
          edad_esposa:edad_esposa,
          oficio_esposo:oficio_esposo,
          oficio_esposa:oficio_esposa,
          nacionalidad_esposo:nacionalidad_esposo,
          nacionalidad_esposa:nacionalidad_esposa,
          origen_esposo:origen_esposo,
          origen_esposa:origen_esposa,
          dui_casado:dui_casado,
          dui_casada:dui_casada,
          estado_casado:estado_casado,
          estado_casada:estado_casada,
          padre_casado:padre_casado,
          madre_casado:madre_casado,
          padre_casada:padre_casada,
          madre_casada:madre_casada,
          nombre_testigo1:nombre_testigo1,
          nombre_testigo2:nombre_testigo2,
          nacionalidad_padre_esposo:nacionalidad_padre_esposo,
          nacionalidad_padre_esposa:nacionalidad_padre_esposa,
          fecha_matrimonio:fecha_matrimonio,
          lugar_matrimonio:lugar_matrimonio,
          representante_legal:representante_legal,
          genero_representate_legal:genero_representate_legal,
          descripcion:descripcion,
          pagina_folio:pagina_folio,
          pagina_1:pagina_1,
          folio_1:folio_1,
          nLibro:nLibro,
          nPartida:nPartida,
          idpartida:idpartida,     
          usuario:usuario,   
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
               //var id = $("#id_partida").val();   
              $(".includ").load("pages/partida_matrimonio_detalle.php?id="+ <?php echo $id_partida; ?>);             
          },  
          error:function(){
              alert("failure");
          }
      });
    }



	});
</script>

<style type="text/css">
  #btn_guardar{
    float: right;
  }
</style>
<input type="hidden" value="<?php echo $_SESSION['data'][0]; ?>" name="idusuario" id="id_usuario">
<input type="hidden" value="<?php echo $id_partida; ?>" id="idpartida">
<form method="post" action="">
<div class="tab-content">
  <div class="tab-pane fade active in" id="tab1_1">
      <div class="row">
        <div class="col-md-12">
        <h3><strong>Actualizar La Informacion Del Formulario de Partidas de Matrimonio</strong>
          <span class="username"></span>
        </h3>  

        <div class="row line">
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="senior1" value="<?php echo $data['nombre_esposo'];?>" />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Nombre del Señor</span>
                  </label>
              </span>
            </div>
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="seniora1" value="<?php echo $data['nombre_esposa'];?>"  />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Nombre de la Señora</span>
                  </label>
              </span>
            </div>
        </div> 

        <div class="row line">
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="edad_senior1" value="<?php echo $data['edad_esposo'];?>" />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Edad del Señor</span>
                  </label>
              </span>
            </div>
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="edad_seniora1" value="<?php echo $data['edad_esposa'];?>" />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Edad de la Señora</span>
                  </label>
              </span>
            </div>
        </div>  

        <div class="row line">
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="oficio_casado1" value="<?php echo $data['oficio_esposo'];?>" />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Oficio/Profesion del Señor</span>
                  </label>
              </span>
            </div>
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="oficio_casada1" value="<?php echo $data['oficio_esposa'];?>" />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Oficio/Profesion de la Señora</span>
                  </label>
              </span>
            </div>
        </div> 

        <div class="row line">
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="nacionalidad_casado1" value="<?php echo $data['nacionalidad_esposo'];?>" />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Nacionalidad del Señor</span>
                  </label>
              </span>
            </div>
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="nacionalidad_casada1" value="<?php echo $data['nacionalidad_esposa'];?>" />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Nacionalidad de la Señora</span>
                  </label>
              </span>
            </div>
        </div>

        <div class="row line">
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="origen_casado1" value="<?php echo $data['origen_esposo'];?>" />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Originario de </span>
                  </label>
              </span>
            </div>
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="origen_casada1" value="<?php echo $data['origen_esposa'];?>" />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Originaria de </span>
                  </label>
              </span>
            </div>
        </div>

        <div class="row line">
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="dui_casado1" value="<?php echo $data['dui_esposo'];?>" />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">DUI del Señor</span>
                  </label>
              </span>
            </div>
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="dui_casada1" value="<?php echo $data['dui_esposa'];?>" />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">DUI de la Señora</span>
                  </label>
              </span>
            </div>
        </div>

        <div class="row line">
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="estado_casado1" value="<?php echo $data['estado_esposo'];?>" />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Estado del Señor</span>
                  </label>
              </span>
            </div>
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="estado_casada1" value="<?php echo $data['estado_esposa'];?>" />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Estado de la Señora</span>
                  </label>
              </span>
            </div>
        </div>

        <div class="row line">
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="padre_casado1" value="<?php echo $data['padre_casado'];?>" />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Nombre del Padre del Casado</span>
                  </label>
              </span>
            </div>
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="madre_casado1" value="<?php echo $data['madre_casado'];?>" />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Nombre de la Madre del Casado</span>
                  </label>
              </span>
            </div>
        </div>

        <div class="row line">
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="padre_casada1" value="<?php echo $data['padre_casada'];?>" />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Nombre del Padre de la Casada</span>
                  </label>
              </span>
            </div>
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="madre_casada1" value="<?php echo $data['madre_casada'];?>" />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Nombre de la Madre de la Casada</span>
                  </label>
              </span>
            </div>
        </div>

        <div class="row line">
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="nacionalidad_padre_esposo1" value="<?php echo $data['nacionalidad_padres_esposo'];?>" />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Nacionalidad Padres ( Esposo ) </span>
                  </label>
              </span>
            </div>
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="nacionalidad_padre_esposa1" value="<?php echo $data['nacionalidad_padres_esposa'];?>" />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Nacionalidad Padres ( Esposa ) </span>
                  </label>
              </span>
            </div>
        </div>

        <div class="row line">
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="fecha_matrimonio1" value="<?php echo $data['fecha_matrimonio'];?>" />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Fecha y Hora del Matrimonio</span>
                  </label>
              </span>
            </div>
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="lugar_matrimonio1" value="<?php echo $data['lugar_matrimonio'];?>" />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Lugar de Origin del Matrimonio</span>
                  </label>
              </span>
            </div>
        </div>

        <div class="row line">
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="representante_legal1" value="<?php echo $data['nombre_representante_legal'];?>" />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Nombre del Representante Legal</span>
                  </label>
              </span>
            </div>
            <div class="col-md-6">
              
                    <div class="form-group">
                          <label>Genero del Representante Legal</label><br><br>
                          <select class="form-control form-white" id="genero_representate_legal1" data-style="white" data-placeholder="Select a country...">
                            <?php
                            if($data['genero_representante_legal']=='m')
                            {
                              ?>
                              <option value="m">Masculino</option>
                              <option value="f">Femenino</option>
                              <?php
                            }
                            else
                            {
                              ?>                              
                              <option value="f">Femenino</option>
                              <option value="m">Masculino</option>
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
                  <input class="input__field input__field--hoshi" type="text" id="nombre_testigo11" value="<?php echo $data['primer_testigo'];?>" />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Nombre del Primer Testigo</span>
                  </label>
              </span>
            </div>
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="nombre_testigo21" value="<?php echo $data['segundo_testigo'];?>" />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Nombre del Segundo Testigo</span>
                  </label>
              </span>
            </div>
        </div>

        <div class="row line">
            <div class="col-md-12">
            <div class="row line">
            <div class="col-md-12">
              <span class="input__label-content">Descripcion General</span>
              <textarea id="descripcion1" class="form-control" id="texto_marginacion" rows="10"><?php echo $data['descripcion_general'];?>              </textarea>
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
                        <select class="form-control bg-primary" id="tipo_1" data-style="white" data-placeholder="Select a country...">                            

                          <?php
                            if($data['pagina']!='folio')
                            {
                              ?>
                                <option value="pagina">A Pagina</option>
                                <option value="folio">A Folio</option>
                              <?php
                            }
                            else
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
                    <div class="col-md-6">
                    <br><br> 
                      <div class="include">
                          <input type="text" class="form-control bg-primary"  name="Pagina_1" id="paginaa" value="<?php echo $data['npagina']; ?>" placeholder="N Pagina">
                          <input type="text" class="form-control bg-primary"  name="Folio_1" id="folioo" value="<?php echo $data['nfolio']; ?>" placeholder="N Folio">
                        </div>  
                      </div>                          
                  </div>
                </div>
                
                <hr>
                <div class="row">
                  <div class="col-md-6">
                  <label>Numero Libro</label>
                    <input type="text" class="form-control bg-primary" name="NumeroLibropartidas" id="nLibro1" placeholder="Numero del Libro" value="<?php echo $data['numero_libro'];?>">
                  </div>
                  <div class="col-md-6">
                  <label>Numero Partida</label>
                    <input type="text" class="form-control bg-primary" name="NumeroPartida" id="nPartida1" placeholder="Numero Partida" value="<?php echo $data['numero_partida'];?>">
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
          <br><br><br><br><br><br><br>
            <input type="button" id="btn_guardar" data-toggle="modal" data-target="#msg_alert" class="btn btn-primary" value="Guardar">
          </div>              
        </div>
      </div>
      </div>
    </div>
 </div>
 </form>


 <div class="modal fade" id="msg_alert" tabindex="-1" role="dialog" aria-hidden="true">
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
                  <button type="button" id="msg_alert" class="btn btn-primary btn-embossed" data-dismiss="modal">Guardar Cambios</button>
                </div>
              </div>
            </div>
</div>









