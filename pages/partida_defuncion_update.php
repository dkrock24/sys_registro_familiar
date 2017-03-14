 <script src="assets/plugins/jquery/jquery-1.11.1.min.js"></script>
<?php
session_start();
include_once("../class_db/class_p_defuncion.php");
$id_partida =  $_GET['id'];

$data = selectDetalle($id_partida);
?>

<script>
	$(document).ready(function(){
alert("aaaa");
    $("#saveUpdatePdefuncion").click(function(){

        var nombre_fallecido    = $("#1nombre_fallecido").val();
        var sexo                = $("#1sexo").val();       
        var edad_fallecido      = $("#1edad_fallecido").val();
        var oficio_fallecido    = $("#1oficio_fallecido").val();
        var estado_fallecido    = $("#1estado_fallecido").val();
        var hora_fallecido      = $("#1hora_fallecido").val();
        var lugar_fallecido     = $("#1lugar_fallecido").val();
        var departament_fallecido  = $("#1departament_fallecido").val();
        var causa_fallecido     = $("#1causa_fallecido").val();
        var dui_fallecido       = $("#1dui_fallecido").val();
        var padre_fallecido     = $("#1padre_fallecido").val();
        var madre_fallecido     = $("#1madre_fallecido").val();
        var nombre_emisor       = $("#1nombre_emisor").val();
        var parentesco_emisor   = $("#1parentesco_emisor").val();
        var dui_emisor          = $("#1dui_emisor").val();
        var fecha_fallecido     = $("#1fecha_fallecido").val();
        var detalle_fallecido   = $("#1detalle_fallecido").val();
        var tipo                = $("#1tipo").val();
        var NumeroPagina        = $("#1NumeroPagina").val();
        var nLibro              = $("#1nLibro").val();
        var nPartida            = $("#1nPartida").val();
        var usuario             = $("#1id_usuario").val();
        var esposoa             = $("#1esposoa").val();
        var domicilio           = $("#1domicilio").val();
        var nacionalidad        = $("#1nacionalidad").val();
        var detalle_asentamiento = $("#1detalle_asentamiento").val();
        var id_partida = $("#id_partida").val();

        
        var accion              = "update_partida_defuncion";
        var tipo_partida        = 3;

      var dataPartida = {
        nombre_fallecido : nombre_fallecido,
        detalle_asentamiento:detalle_asentamiento,
        sexo:sexo,
        domicilio:domicilio,
        nacionalidad:nacionalidad,
        edad_fallecido:edad_fallecido,
        oficio_fallecido:oficio_fallecido,
        estado_fallecido:estado_fallecido,
        hora_fallecido:hora_fallecido,
        lugar_fallecido:lugar_fallecido,
        departament_fallecido:departament_fallecido,
        causa_fallecido:causa_fallecido,
        dui_fallecido:dui_fallecido,
        padre_fallecido:padre_fallecido,
        madre_fallecido:madre_fallecido,
        nombre_emisor:nombre_emisor,
        parentesco_emisor:parentesco_emisor,
        dui_emisor:dui_emisor,
        fecha_fallecido:fecha_fallecido,
        detalle_fallecido:detalle_fallecido,
        tipo:tipo,
        NumeroPagina:NumeroPagina,
        nLibro:nLibro,
        nPartida:nPartida,
        tipo_partida:tipo_partida,
        esposoa:esposoa,
        usuario:usuario,
        id_partida:id_partida,
        accion:accion
      };   
      saveData(dataPartida);  
      });
});

function saveData(dataPartida)
{
  $.ajax({
      url: "class_db/saveData.php",
      type:"post",
      data: dataPartida,
      
      success: function(){
            //$(".A").removeClass("active");
            //$(".B").addClass("active");
            //$("#tab1_1").removeClass("active");
            //$("#tab1_2").addClass("active in");
            $(".includ").load("pages/partida_defuncion_detalle.php?id="+dataPartida['id_partida']);   
        },
        error:function(){
            alert("Error al Guardar la partida de Nacimiento");
        }
  });
}

</script>


<input type="hidden" value="<?php echo $_SESSION['data'][0]; ?>" name="idusuario" id="1id_usuario">
<input type="hidden" value="<?php echo $data['id_partida'] ?>" name="id_partida" id="id_partida">
<form method="post" action="">
 <div class="tab-content">
    <div class="tab-pane fade A active in" id="tab1_1">
      <div class="row">
        <div class="col-md-12">
          <h3><strong>RELLENER LA INFORMACION DEL FORMULARIO</strong></h3>
          <br>
          <div class="row line">
                <div class="col-md-6">
                  <span class="input input--hoshi">
                      <input class="input__field input__field--hoshi" type="text" id="1nombre_fallecido" value="<?php echo $data['hombre']; ?>" required />
                      <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                      <span class="input__label-content">Nombre del Fallecido/a</span>
                      </label>
                  </span>
                </div>
                <div class="col-md-6">
                      <select name="sexo" id="1sexo" class="input input--hoshi">
                      <?php
                        if($data['genero']=='m'){
                          ?>
                          <option value="m">Masculino</option>
                          <option value="f">Femenino</option>
                          <?php
                        }else{
                           ?>
                           <option value="f">Femenino</option>
                           <option value="m">Masculino</option>                        
                          <?php
                        }

                      ?>
                      </select>
                </div>
          </div> 
          
          <div class="row line">
            <div class="col-md-6">
              <span class="input input--hoshi">
                <input class="input__field input__field--hoshi" type="text" value="<?php echo $data['edad']; ?>" id="1edad_fallecido"/>
                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                  <span class="input__label-content">Edad del Fallecido/a</span></label>
              </span>
            </div>
            <div class="col-md-6">
              <span class="input input--hoshi">
                <input class="input__field input__field--hoshi" type="text" value="<?php echo $data['oficio']; ?>" id="1oficio_fallecido"/>
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                    <span class="input__label-content">Oficio del Fallecido/a</span>
                  </label>
              </span>
            </div>
          </div>  

          <div class="row line">
            <div class="col-md-6">
              <span class="input input--hoshi">
                <input class="input__field input__field--hoshi" type="text" value="<?php echo $data['estado']; ?>" id="1estado_fallecido"/>
                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                  <span class="input__label-content">Estado </span>
                    </label>
                  </span>
            </div>
            <div class="col-md-6">
              <span class="input input--hoshi">
                <input class="input__field input__field--hoshi" type="text" value="<?php echo $data['conyugue']; ?>" id="1esposoa"/>
                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                  <span class="input__label-content">Esposo / Esposa</span>
                </label>
              </span>
            </div>
          </div> 

          <div class="row line">
            <div class="col-md-6">
              <span class="input input--hoshi">
                <input class="input__field input__field--hoshi" type="text" value="<?php echo $data['domicilio']; ?>" id="1domicilio"/>
                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                  <span class="input__label-content">Domicilio Esposo/a </span>
                    </label>
                  </span>
            </div>
            <div class="col-md-6">
              <span class="input input--hoshi">
                <input class="input__field input__field--hoshi" type="text" value="<?php echo $data['nacionalidad']; ?>" id="1nacionalidad"/>
                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                  <span class="input__label-content">Nacionalidad Esposa/a</span>
                </label>
              </span>
            </div>
          </div> 

          <div class="row line">
            <div class="col-md-6">
              <span class="input input--hoshi">
                <input class="input__field input__field--hoshi" type="text" value="<?php echo $data['lugar']; ?>" id="1lugar_fallecido"  />
                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                  <span class="input__label-content">Lugar de Fallecimiento </span>
                    </label>
                  </span>
            </div>
            <div class="col-md-6">
              <span class="input input--hoshi">
                <input class="input__field input__field--hoshi" type="text" value="<?php echo $data['departamento']; ?>" id="1departament_fallecido"  />
                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                  <span class="input__label-content">Departamento</span>
                </label>
              </span>
            </div>
          </div> 

          <div class="row line">
            <div class="col-md-6">
              <span class="input input--hoshi">
                <input class="input__field input__field--hoshi" type="text" value="<?php echo $data['causa']; ?>" id="1causa_fallecido"  />
                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                  <span class="input__label-content">Causa del Fallecimiento </span>
                    </label>
                  </span>
            </div>
            <div class="col-md-6">
              <span class="input input--hoshi">
                <input class="input__field input__field--hoshi" type="text" value="<?php echo $data['dui']; ?>" id="1dui_fallecido"  />
                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                  <span class="input__label-content">DUI del Fallecido/a</span>
                </label>
              </span>
            </div>
          </div> 

          <div class="row line">
            <div class="col-md-6">
              <span class="input input--hoshi">
                <input class="input__field input__field--hoshi" type="text" value="<?php echo $data['padre']; ?>" id="1padre_fallecido"  />
                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                  <span class="input__label-content">Padre del Fallecido/a</span>
                    </label>
                  </span>
            </div>
            <div class="col-md-6">
              <span class="input input--hoshi">
                <input class="input__field input__field--hoshi" type="text" value="<?php echo $data['madre']; ?>" id="1madre_fallecido"  />
                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                  <span class="input__label-content">Madre del Fallecido/a</span>
                </label>
              </span>
            </div>
          </div> 

          <div class="row line">
            <div class="col-md-6">
              <span class="input input--hoshi">
                <input class="input__field input__field--hoshi" type="text" value="<?php echo $data['emisor_datos']; ?>" id="1nombre_emisor"  />
                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                  <span class="input__label-content">Nombre Persona que emite los datos </span>
                    </label>
                  </span>
            </div>
            <div class="col-md-6">
              <span class="input input--hoshi">
                <input class="input__field input__field--hoshi" type="text" value="<?php echo $data['parentesco_emisor']; ?>" id="1parentesco_emisor"  />
                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                  <span class="input__label-content">Parentesco de la persona que emite los datos</span>
                </label>
              </span>
            </div>
          </div> 

          <div class="row line">
            <div class="col-md-6">
              <span class="input input--hoshi">
                <input class="input__field input__field--hoshi" type="text" value="<?php echo $data['dui_emisor']; ?>" id="1dui_emisor"  />
                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                  <span class="input__label-content">DUI del Emisor de los Datos </span>
                    </label>
                  </span>
            </div>
            <div class="col-md-6">
              <span class="input input--hoshi"> 
                <input class="input__field input__field--hoshi" type="date" value="<?php echo $data['fecha']; ?>" id="1fecha_fallecido"  />
                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                  <span class="input__label-content">Fecha de Fallecimiento</span>
                </label>
              </span>
            </div>
          </div> 

          <div class="row line">
             <div class="col-md-6">
              <span class="input input--hoshi">
                <input class="input__field input__field--hoshi" type="text" value="<?php echo $data['hora_fecha_muerte']; ?>" id="1hora_fallecido"/>
                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                  <span class="input__label-content">Hora y Fecha de Fallecimiento</span>
                </label>
              </span>
            </div>
          </div> 

          <div class="row">
            <div class="col-md-12" id="">
              <p>Detalles del Fallecimiento:</p>
            </div>             
          </div>

          <div class="row line">
            <div class="col-md-12">
             <textarea class="form-control" id="1detalle_fallecido" rows="10"><?php echo $data['detalles']; ?></textarea>     
            </div>
            
          </div> 
          <br>
          <div class="row">
            <div class="col-md-12" id="">
              <p>Detalles Fecha de Asentamiento:</p>
            </div>             
          </div>

          <div class="row line">
            <div class="col-md-12">
             <textarea class="form-control" id="1detalle_asentamiento" rows="2"><?php echo $data['fecha_asentamiento']; ?></textarea>     
            </div>
            
          </div> <br>

          <div class="row line">
            <div class="col-md-6">
              <div class="form-group">                
                <div class="input-group">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">                   
                        <select class="form-control bg-primary" id="1tipo" data-style="white" data-placeholder="Select a country...">                            
                        <?php
                        if($data['pagina_folio']=="pagina")
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
                      <div class="include">
                        <input type="text" class="form-control bg-primary" name="NumeroPagina" id="1NumeroPagina" value="<?php echo $data['numero']; ?>" placeholder="Numero de Pagina">
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
                      <input type="text" class="form-control bg-primary" name="NumeroLibroDivorcio" value="<?php echo $data['libro']; ?>" id="1nLibro" placeholder="Numero del Libro">
                    </div>
                    <div class="col-md-6">
                      <input type="text" class="form-control bg-primary" name="NumeroPartida" id="1nPartida" value="<?php echo $data['partida']; ?>" placeholder="Numero Partida" >
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        


          <input type="button" id="saveUpdatePdefuncion" class="btn btn-primary" value="Guardar">
        </div>
      </div>
    </div>
</div>
</form>








