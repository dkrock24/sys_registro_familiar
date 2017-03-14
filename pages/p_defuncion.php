
    <a href="#" class="scrollup"><i class="fa fa-angle-up"></i></a> 
    <script src="assets/plugins/jquery/jquery-1.11.1.min.js"></script>

<?php
session_start();
?>
<script>
$(document).ready(function(){
  $("#tipo").change(function(){
        var tipo = $("#tipo").val();       

        if(tipo=="pagina")
        {
          $(".include").html('<input type="text" class="form-control bg-primary" name="NumeroPagina" id="NumeroPagina" placeholder="Numero de Pagina">');
        }
        if(tipo=="folio")
        {
           $(".include").html('<input type="text" class="form-control bg-primary" name="NumeroFolio" id="NumeroFolio" placeholder="Numero de Folio">');
        }        
  });

  $("li#menu_li").click(function(){
        var texto = $(this).text();        
            if(texto=="Buscar")        
            {                 
                $(".includ").load("pages/lista_partidas_defuncion.php");             
            }
            if(texto=="Manual")        
            {                 
                $(".manual").load("pages/manual_p_defuncion.php");             
            }
  });

$("#guardar_pdefuncion").click(function(){  

        var nombre_fallecido    = $("#nombre_fallecido").val();
        var sexo                = $("#sexo").val();       
        var edad_fallecido      = $("#edad_fallecido").val();
        var oficio_fallecido    = $("#oficio_fallecido").val();
        var estado_fallecido    = $("#estado_fallecido").val();
        var hora_fallecido      = $("#hora_fallecido").val();
        var lugar_fallecido     = $("#lugar_fallecido").val();
        var departament_fallecido  = $("#departament_fallecido").val();
        var causa_fallecido     = $("#causa_fallecido").val();
        var dui_fallecido       = $("#dui_fallecido").val();
        var padre_fallecido     = $("#padre_fallecido").val();
        var madre_fallecido     = $("#madre_fallecido").val();
        var nombre_emisor       = $("#nombre_emisor").val();

        var parentesco_emisor   = $("#parentesco_emisor").val();
        var dui_emisor          = $("#dui_emisor").val();
        var fecha_fallecido     = $("#fecha_fallecido").val();
        var detalle_fallecido   = $("#detalle_fallecido").val();
        var tipo                = $("#tipo").val();
        var NumeroPagina        = $("#NumeroPagina").val();
        var nLibro              = $("#nLibro").val();
        var nPartida            = $("#nPartida").val();
        var usuario             = $("#id_usuario").val();
        var esposoa             = $("#esposoa").val();
        var domicilio           = $("#domicilio").val();
        var nacionalidad        = $("#nacionalidad").val();
        var detalle_asentamiento = $("#detalle_asentamiento").val();

        

        
        var accion              = "insert_partida_defuncion";
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
        accion:accion
      };   
      if( nombre_fallecido!=""  && edad_fallecido!=""    && oficio_fallecido!=""&& 
          estado_fallecido!=""  &&  hora_fallecido!=""   && lugar_fallecido!="" && departament_fallecido!="" && 
          causa_fallecido!=""   && dui_fallecido!=""     &&  padre_fallecido!=""&& madre_fallecido!=""       && 
          nombre_emisor!=""     && parentesco_emisor!="" && dui_emisor!=""      && fecha_fallecido!=""       && 
          detalle_fallecido!="")
      {
        saveData(dataPartida);  
      }
      else{
        alert("Faltan Datos de Digitar");
      }

      });

});


 function saveData(dataPartida)
  {
    
    $.ajax({
        url: "class_db/saveData.php",
        type:"post",
        data: dataPartida,
        
        success: function(){
             $(".A").removeClass("active");
            $(".B").addClass("active");
            $("#tab1_1").removeClass("active");
            
            $("#tab1_2").addClass("active in");
            $("#tab1_2").load("pages/lista_partidas_defuncion.php");   
        },
        error:function(){
            alert("Error al Guardar la partida de Nacimiento");
        }
  });
}
</script>


<style>
  .table-dynamic{width: 100%;}
  .form-inline .form-control {
    width:85%;
    font-weight: 10px;
    padding: 4px;
  }

  .input__label-content{
    margin-top: -20px;
  }
  .line{
    
  }
  #anio{
    width: 100%;
  }
    .color-icon{
        color:#319db5;
    }
    .documentacion{
      font-family: Arial;
    }
</style>

<input type="hidden" value="<?php echo $_SESSION['data'][0]; ?>" name="idusuario" id="id_usuario">
<ul class="nav nav-tabs">
  <li id="menu_li" class="A active"><a href="#tab1_1" data-toggle="tab"><i class="fa fa-plus-circle color-icon"></i>Nueva</a></li>
  <li id="menu_li" class="B "><a href="#tab1_2" data-toggle="tab"><i class="fa fa-search color-icon"></i>Buscar</a></li>
  <li id="menu_li" class="C "><a href="#tab1_3" data-toggle="tab"><i class="fa fa-file color-icon"></i>Manual</a></li>
</ul>
<form>
  <div class="tab-content">
    <div class="tab-pane fade active in" id="tab1_1">
      <div class="row">
        <div class="col-md-12">
          <h3><strong>RELLENER LA INFORMACION DEL FORMULARIO</strong></h3>
          <br>
          <div class="row line">
                <div class="col-md-6">
                  <span class="input input--hoshi">
                      <input class="input__field input__field--hoshi" type="text" id="nombre_fallecido" required />
                      <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                      <span class="input__label-content">Nombre del Fallecido/a</span>
                      </label>
                  </span>
                </div>
                <div class="col-md-6">
                      <select name="sexo" id="sexo" class="input input--hoshi">
                        <option value="m">Masculino</option>
                        <option value="f">Femenino</option>
                      </select>
                </div>
          </div> 
          
          <div class="row line">
            <div class="col-md-6">
              <span class="input input--hoshi">
                <input class="input__field input__field--hoshi" type="text" id="edad_fallecido"/>
                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                  <span class="input__label-content">Edad del Fallecido/a</span></label>
              </span>
            </div>
            <div class="col-md-6">
              <span class="input input--hoshi">
                <input class="input__field input__field--hoshi" type="text" id="oficio_fallecido"/>
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                    <span class="input__label-content">Oficio del Fallecido/a</span>
                  </label>
              </span>
            </div>
          </div>  

          <div class="row line">
            <div class="col-md-6">
              <span class="input input--hoshi">
                <input class="input__field input__field--hoshi" type="text" id="estado_fallecido"/>
                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                  <span class="input__label-content">Estado </span>
                    </label>
                  </span>
            </div>
            <div class="col-md-6">
              <span class="input input--hoshi">
                <input class="input__field input__field--hoshi" type="text" id="esposoa"/>
                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                  <span class="input__label-content">Esposo / Esposa</span>
                </label>
              </span>
            </div>
          </div> 

          <div class="row line">
            <div class="col-md-6">
              <span class="input input--hoshi">
                <input class="input__field input__field--hoshi" type="text" id="domicilio"/>
                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                  <span class="input__label-content">Domicilio Esposo/a </span>
                    </label>
                  </span>
            </div>
            <div class="col-md-6">
              <span class="input input--hoshi">
                <input class="input__field input__field--hoshi" type="text" id="nacionalidad"/>
                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                  <span class="input__label-content">Nacionalidad Esposa/a</span>
                </label>
              </span>
            </div>
          </div> 

          <div class="row line">
            <div class="col-md-6">
              <span class="input input--hoshi">
                <input class="input__field input__field--hoshi" type="text" id="lugar_fallecido"  />
                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                  <span class="input__label-content">Lugar de Fallecimiento </span>
                    </label>
                  </span>
            </div>
            <div class="col-md-6">
              <span class="input input--hoshi">
                <input class="input__field input__field--hoshi" type="text" id="departament_fallecido"  />
                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                  <span class="input__label-content">Departamento</span>
                </label>
              </span>
            </div>
          </div> 

          <div class="row line">
            <div class="col-md-6">
              <span class="input input--hoshi">
                <input class="input__field input__field--hoshi" type="text" id="causa_fallecido"  />
                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                  <span class="input__label-content">Causa del Fallecimiento </span>
                    </label>
                  </span>
            </div>
            <div class="col-md-6">
              <span class="input input--hoshi">
                <input class="input__field input__field--hoshi" type="text" id="dui_fallecido"  />
                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                  <span class="input__label-content">DUI del Fallecido/a</span>
                </label>
              </span>
            </div>
          </div> 

          <div class="row line">
            <div class="col-md-6">
              <span class="input input--hoshi">
                <input class="input__field input__field--hoshi" type="text" id="padre_fallecido"  />
                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                  <span class="input__label-content">Padre del Fallecido/a</span>
                    </label>
                  </span>
            </div>
            <div class="col-md-6">
              <span class="input input--hoshi">
                <input class="input__field input__field--hoshi" type="text" id="madre_fallecido"  />
                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                  <span class="input__label-content">Madre del Fallecido/a</span>
                </label>
              </span>
            </div>
          </div> 

          <div class="row line">
            <div class="col-md-6">
              <span class="input input--hoshi">
                <input class="input__field input__field--hoshi" type="text" id="nombre_emisor"  />
                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                  <span class="input__label-content">Nombre Persona que emite los datos </span>
                    </label>
                  </span>
            </div>
            <div class="col-md-6">
              <span class="input input--hoshi">
                <input class="input__field input__field--hoshi" type="text" id="parentesco_emisor"  />
                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                  <span class="input__label-content">Parentesco de la persona que emite los datos</span>
                </label>
              </span>
            </div>
          </div> 

          <div class="row line">
            <div class="col-md-6">
              <span class="input input--hoshi">
                <input class="input__field input__field--hoshi" type="text" id="dui_emisor"  />
                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                  <span class="input__label-content">DUI del Emisor de los Datos </span>
                    </label>
                  </span>
            </div>
            <div class="col-md-6">
              <span class="input input--hoshi">
                <input class="input__field input__field--hoshi" type="date" id="fecha_fallecido"  />
                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                  <span class="input__label-content">Fecha de Fallecimiento</span>
                </label>
              </span>
            </div>
          </div> 

          <div class="row line">
             <div class="col-md-6">
              <span class="input input--hoshi">
                <input class="input__field input__field--hoshi" type="text" id="hora_fallecido"/>
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
             <textarea class="form-control" id="detalle_fallecido" rows="10"></textarea>     
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
             <textarea class="form-control" id="detalle_asentamiento" rows="2"></textarea>     
            </div>
            
          </div> <br>

          <div class="row line">
            <div class="col-md-6">
              <div class="form-group">                
                <div class="input-group">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">                   
                        <select class="form-control bg-primary" id="tipo" data-style="white" data-placeholder="Select a country...">                            
                          <option value="pagina">A Pagina</option>
                          <option value="folio">A Folio</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">     
                      <div class="include">
                        <input type="text" class="form-control bg-primary" name="NumeroPagina" id="NumeroPagina" placeholder="Numero de Pagina">
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
                      <input type="text" class="form-control bg-primary" name="NumeroLibroDivorcio" id="nLibro" placeholder="Numero del Libro">
                    </div>
                    <div class="col-md-6">
                      <input type="text" class="form-control bg-primary" name="NumeroPartida" id="nPartida" placeholder="Numero Partida" >
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        


          <input type="button" id="guardar_pdefuncion" class="btn btn-primary" value="Guardar">
        </div>
      </div>
    </div>

  <div class="tab-pane includ fade " id="tab1_2">
  </div>

    <div class="tab-pane fade manual" id="tab1_3">
    
    </div>
  </div>
</form>
