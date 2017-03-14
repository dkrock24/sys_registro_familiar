
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
                $(".includ").load("pages/lista_partidas_divorcio.php");             
            }
            if(texto=="Manual")        
            {                 
                $(".manual").load("pages/manual_p_divorcio.php");             
            }
  });

$("#guardar_pdivorcio").click(function(){  
        var hombre         = $("#padre").val();
        var mujer         = $("#madre").val();       
        var edad_hombre    = $("#edad_padre").val();
        var edad_mujer    = $("#edad_madre").val();
        var oficio_hombre  = $("#oficio_padre").val();
        var oficio_mujer  = $("#oficio_madre").val();
        var pagina_folio  = $("#tipo").val();
        var NumeroPagina  = $("#NumeroPagina").val();
        var NumeroFolio   = $("#NumeroFolio").val();
        var nLibro        = $("#nLibro").val();
        var nPartida      = $("#nPartida").val();
        var usuario       = $("#id_usuario").val();
        var cuerpo        = $("#texto_cuerpo").val();
        var accion        = "insert_partida_divorcio";
        var tipo_partida  = 4;

      var dataPartida = {
          hombre:hombre,
          mujer:mujer,
          edad_hombre:edad_hombre,
          edad_mujer:edad_mujer,
          oficio_hombre:oficio_hombre,
          oficio_mujer:oficio_mujer,        
          pagina_folio:pagina_folio,
          NumeroPagina:NumeroPagina,
          NumeroFolio:NumeroFolio,
          nLibro:nLibro,
          nPartida:nPartida,
          usuario:usuario,       
          accion:accion,
          cuerpo:cuerpo,
          tipo_partida:tipo_partida
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
            $("#tab1_2").load("pages/lista_partidas_divorcio.php");  
        },
        error:function(){
            alert("Error al Guardar la Partida de Divorcio");
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
    .align{
      float: right;
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
          <h3><strong>RELLENER LA INFORMACION DEL FORMULARIO</strong></h3>
          <br>
          <div class="row line">
                <div class="col-md-6">
                  <span class="input input--hoshi">
                      <input class="input__field input__field--hoshi" type="text" id="padre" />
                      <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                      <span class="input__label-content">Nombre del Señor</span>
                      </label>
                  </span>
                </div>
                <div class="col-md-6">
                  <span class="input input--hoshi">
                      <input class="input__field input__field--hoshi" type="text" id="madre" required />
                      <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                      <span class="input__label-content">Nombre de la Señora</span>
                      </label>
                  </span>
                </div>
          </div> 
          
          <div class="row line">
            <div class="col-md-6">
              <span class="input input--hoshi">
                <input class="input__field input__field--hoshi" type="text" id="edad_padre" required />
                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                  <span class="input__label-content">Edad del Señor</span></label>
              </span>
            </div>
            <div class="col-md-6">
              <span class="input input--hoshi">
                <input class="input__field input__field--hoshi" type="text" id="edad_madre" required />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                    <span class="input__label-content">Edad de la Señora</span>
                  </label>
              </span>
            </div>
          </div>  

          <div class="row line">
            <div class="col-md-6">
              <span class="input input--hoshi">
                <input class="input__field input__field--hoshi" type="text" id="oficio_padre" required />
                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                  <span class="input__label-content">Oficio y Domicilio del Señor</span>
                    </label>
                  </span>
            </div>
            <div class="col-md-6">
              <span class="input input--hoshi">
                <input class="input__field input__field--hoshi" type="text" id="oficio_madre" required />
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
                        <select class="form-control bg-primary" id="tipo" data-style="white" data-placeholder="Select a country...">                            
                          <option value="">Seleccionar</option>
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
                      <input type="text" class="form-control bg-primary" name="NumeroPartida" id="nPartida" placeholder="Numero Partida" required>
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
              <textarea class="form-control" id="texto_cuerpo" rows="10">han obtenido el matrimonio absoluto.
              </textarea>
            </div>  
          </div>
          <br>
          <input type="button" id="guardar_pdivorcio" class="btn btn-primary align" value="Guardar">
        </div>
      </div>
    </div>

    <div class="tab-pane includ fade" id="tab1_2">
      
    </div>

    <div class="tab-pane fade manual" id="tab1_3">
      
    </div>
  </div>


