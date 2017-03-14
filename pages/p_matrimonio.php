
    <a href="#" class="scrollup"><i class="fa fa-angle-up"></i></a> 
    <script src="assets/plugins/jquery/jquery-1.11.1.min.js"></script>




<?php
session_start();

?>
<script>
$(document).ready(function(){
    $("#actualizar_partida").click(function(){
        
            var id = $("#id_partida").val();
            //alert(id);
         //   $(".includ")load("pages/partida_update.php?id="+id);
        });
});
</script>
<script>
  $(document).ready(function(){

    $("li#menu_li").click(function(){
        var texto = $(this).text();        
            if(texto=="Buscar")        
            {                 
                $(".includ").load("pages/lista_partidas_matrimonio.php");             
            }
            if(texto=="Manual")        
            {                 
                $(".manual").load("pages/manual_p_matrimonio.php");             
            }
    });

    $("a#enlance").click(function(){
        
        //$(".includ").load("pages/partida_detalle.php");
    });   

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

      // CONVERTIR FECHAS A TEXTO
      
      $("#guardar_pmatrimonio").click(function(){   




        var esposo        = $("#senior").val();
        var esposa        = $("#seniora").val();       
        var edad_esposo   = $("#edad_senior").val();
        var edad_esposa   = $("#edad_seniora").val();
        var oficio_esposo = $("#oficio_casado").val();
        var oficio_esposa = $("#oficio_casada").val();

        var nacionalidad_esposo = $("#nacionalidad_casado").val();
        var nacionalidad_esposa = $("#nacionalidad_casada").val();
        var origen_esposo       = $("#origen_casado").val();
        var origen_esposa       = $("#origen_casada").val();
        var dui_casado      = $("#dui_casado").val();
        var dui_casada      = $("#dui_casada").val();

        var estado_casado      = $("#estado_casado").val();
        var estado_casada      = $("#estado_casada").val();

        var padre_casado        = $("#padre_casado").val();
        var madre_casado        = $("#madre_casado").val();
        var padre_casada        = $("#padre_casada").val();
        var madre_casada        = $("#madre_casada").val();

        var nacionalidad_padre_esposo = $("#nacionalidad_padre_esposo").val();
        var nacionalidad_padre_esposa = $("#nacionalidad_padre_esposa").val();
        var nombre_testigo1           = $("#nombre_testigo1").val();
        var nombre_testigo2           = $("#nombre_testigo2").val();
        var fecha_matrimonio          = $("#fecha_matrimonio").val();
        var lugar_matrimonio          = $("#lugar_matrimonio").val();
        var representante_legal       = $("#representante_legal").val();
        var genero_representate_legal = $("#genero_representate_legal").val();
        
            
        var descripcion               = $("#descripcion").val();
        
        
        var pagina_folio  = $("#tipo").val();
        var NumeroPagina  = $("#NumeroPagina").val();
        var NumeroFolio   = $("#NumeroFolio").val();
        var nLibro        = $("#nLibro").val();
        var nPartida      = $("#nPartida").val();
        
        var usuario = $("#id_usuario").val();
        var accion  = "insert_pmatrimonio";

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
          NumeroPagina:NumeroPagina,
          NumeroFolio:NumeroFolio,
          nLibro:nLibro,
          nPartida:nPartida,
          usuario:usuario,        
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
            $(".A").removeClass("active");
            $(".B").addClass("active");
            $("#tab1_1").removeClass("active");
            
            $("#tab1_2").addClass("active in");
            $("#tab1_2").load("pages/lista_partidas_matrimonio.php");   

        },
        error:function(){
            alert("failure");
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

  #guardar_pmatrimonio{
    float: right;
    margin: 10px;
    margin-top: 30%;
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

<div class="tab-content">
  <div class="tab-pane fade active in" id="tab1_1">
    <div class="row">
      <div class="col-md-12">
        <h3><strong>Rellener La Informacion Del Formulario</strong>
          <span class="username"></span>
        </h3>  

        <div class="row line">
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="senior" />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Nombre del Señor</span>
                  </label>
              </span>
            </div>
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="seniora" required />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Nombre de la Señora</span>
                  </label>
              </span>
            </div>
        </div> 

        <div class="row line">
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="number" id="edad_senior" required />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Edad del Señor</span>
                  </label>
              </span>
            </div>
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="number" id="edad_seniora" required />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Edad de la Señora</span>
                  </label>
              </span>
            </div>
        </div>  

        <div class="row line">
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="oficio_casado" required />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Oficio/Profesion del Señor</span>
                  </label>
              </span>
            </div>
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="oficio_casada" required />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Oficio/Profesion de la Señora</span>
                  </label>
              </span>
            </div>
        </div> 

        <div class="row line">
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="nacionalidad_casado" value="Salvadoreño" />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Nacionalidad del Señor</span>
                  </label>
              </span>
            </div>
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="nacionalidad_casada" value="Salvadoreña" />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Nacionalidad de la Señora</span>
                  </label>
              </span>
            </div>
        </div>

        <div class="row line">
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="origen_casado" required />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Originario de </span>
                  </label>
              </span>
            </div>
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="origen_casada" required />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Originaria de </span>
                  </label>
              </span>
            </div>
        </div>

        <div class="row line">
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="dui_casado" required />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">DUI del Señor</span>
                  </label>
              </span>
            </div>
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="dui_casada" required />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">DUI de la Señora</span>
                  </label>
              </span>
            </div>
        </div>

        <div class="row line">
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="estado_casado" required />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Estado del Señor</span>
                  </label>
              </span>
            </div>
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="estado_casada" required />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Estado de la Señora</span>
                  </label>
              </span>
            </div>
        </div>

        <div class="row line">
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="padre_casado" required />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Nombre del Padre del Casado</span>
                  </label>
              </span>
            </div>
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="madre_casado" required />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Nombre de la Madre del Casado</span>
                  </label>
              </span>
            </div>
        </div>

        <div class="row line">
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="padre_casada" required />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Nombre del Padre de la Casada</span>
                  </label>
              </span>
            </div>
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="madre_casada" required />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Nombre de la Madre de la Casada</span>
                  </label>
              </span>
            </div>
        </div>

        <div class="row line">
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="nacionalidad_padre_esposo" required />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Nacionalidad Padres ( Esposo ) </span>
                  </label>
              </span>
            </div>
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="nacionalidad_padre_esposa" required />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Nacionalidad Padres ( Esposa ) </span>
                  </label>
              </span>
            </div>
        </div>

        <div class="row line">
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="fecha_matrimonio" required />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Fecha y Hora del Matrimonio</span>
                  </label>
              </span>
            </div>
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="lugar_matrimonio" required />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Lugar de Origin del Matrimonio</span>
                  </label>
              </span>
            </div>
        </div>

        <div class="row line">
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="representante_legal" required />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Nombre del Representante Legal</span>
                  </label>
              </span>
            </div>
            <div class="col-md-6">
              
                    <div class="form-group">
                          <label>Genero del Representante Legal</label><br><br>
                          <select class="form-control form-white" id="genero_representate_legal" data-style="white" data-placeholder="Select a country...">
                            <option value="si">Masculino</option>
                            <option value="no">Femenino</option>
                          </select>
                        </div>
            </div>
        </div>

        <div class="row line">
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="nombre_testigo1" />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Nombre del Primer Testigo</span>
                  </label>
              </span>
            </div>
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="nombre_testigo2" />
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
              <textarea id="descripcion" class="form-control" id="texto_marginacion" rows="10">Y los contrayentes han optado como
              </textarea>
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
                        <select class="form-control bg-primary" id="tipo" data-style="white" data-placeholder="Select a country...">                            
                          <option value="pagina">A Pagina</option>
                          <option value="folio">A Folio</option>
                        </select>
                    </div>
                  </div>

                  <div class="col-md-6">     
                    <br><br>                          
                    <div class="include">
                      <input type="text" class="form-control bg-primary" name="NumeroPagina" id="NumeroPagina" placeholder="Numero de Pagina">
                    </div>                             
                  </div>
                </div>
                
                <hr>
                <div class="row">
                  <div class="col-md-6">
                    <input type="text" class="form-control bg-primary" name="NumeroLibropartidas" id="nLibro" placeholder="Numero del Libro">
                  </div>
                  <div class="col-md-6">
                    <input type="text" class="form-control bg-primary" name="NumeroPartida" id="nPartida" placeholder="Numero Partida" required>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <input type="button" id="guardar_pmatrimonio" class="btn btn-primary" value="Guardar">
          </div>              
        </div>
      </div>
    </div>
  </div>



  <div class="tab-pane includ fade" id="tab1_2">
  </div>

  <div class="tab-pane fade manual" id="tab1_3">
    
  </div>
</div>


<style>
  .table.filter-head>thead>tr>th {min-width: 180px;}
  
</style>


