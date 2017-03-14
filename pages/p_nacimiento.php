
    <a href="#" class="scrollup"><i class="fa fa-angle-up"></i></a> 
    <script src="assets/plugins/jquery/jquery-1.11.1.min.js"></script>




<?php
session_start();

?>
<script>
$(document).ready(function(){
    $("#actualizar_partida").click(function(){
        alert("xxxxx");
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
                $(".includ").load("pages/lista_partidas.php");             
            }
            if(texto=="Manual")        
            {                 
                $(".manual").load("pages/manual_p_nacimiento.php");             
            }
    });    

      // FFECHAS
      var a = new Date();
      var anio =a.getFullYear();
      var mes  = a.getMonth();
      $("#anio").val(anio);
      $("#mes").val(mes+1);


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
      
      $("#guardar_pnacimiento").click(function(){        
        var d =  dia($("#dia").val());
        var m =  demo($("#mes").val());
        //var a =  $("#anio").val();

        var padre = $("#padre").val();
        var madre = $("#madre").val();       

        var edad_padre = $("#edad_padre").val();
        var edad_madre = $("#edad_madre").val();

        var oficio_padre = $("#oficio_padre").val();
        var oficio_madre = $("#oficio_madre").val();

        var nacionalidad_padre = $("#nacionalidad_padre").val();
        var nacionalidad_madre = $("#nacionalidad_madre").val();

        var origen_padre = $("#origen_padre").val();
        var origen_madre = $("#origen_madre").val();

        var domiclio_padre = $("#domiclio_padre").val();
        var domiclio_madre = $("#domiclio_madre").val();

        var parentesco_emisor = $("#parentesco_emisor").val();
        var dui_emisor = $("#dui_emisor").val();
        var dui_emisor_expedido = $("#dui_emisor_expedido").val();
        var firma_emisor = $("#firma_emisor").val();

        var nombre_testigo1 = $("#nombre_testigo1").val();
        var nombre_testigo2 = $("#nombre_testigo2").val();

        var dui_testigo1 = $("#dui_testigo1").val();
        var dui_testigo2 = $("#dui_testigo2").val();

        var dui_testigo1_expedicion = $("#dui_testigo1_expedicion").val();
        var dui_testigo2_expedicion = $("#dui_testigo2_expedicion").val();

        var nombre_recienacido = $("#nombre_recienacido").val();
        var apellido_recienacido = $("#apellido_recienacido").val();
        var genero_bebe = $("#genero_bebe").val();
        var lugar_nacimiento = $("#lugar_nacimiento").val();

        var pagina_folio = $("#tipo").val();
        var NumeroPagina = $("#NumeroPagina").val();
        var NumeroFolio = $("#NumeroFolio").val();

        var nLibro = $("#nLibro").val();
        var nPartida = $("#nPartida").val();
        var hora_nacimiento = $("#hora_nacimiento").val();

        var jurisdisccion = $("#jurisdisccion").val();
        var fecha_emision = $("#fecha_emision").val();

        var usuario = $("#id_usuario").val();

        var estado_padre = $("#estado_padre").val();
        var estado_madre = $("#estado_madre").val();

        var aanio = $("#anio").val();
        var accion = "insert";

        

      var dataPartida = {
          padre:padre,
          estado_padre:estado_padre,
          estado_madre:estado_madre,
          madre:madre,
          edad_padre:edad_padre,
          edad_madre:edad_madre,
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
      //alert(dataPartida['hora_nacimiento']);
      saveData(dataPartida);     
      });

  });
  function dia(dia){
    var d;
    switch(dia)
    {
      case "1": d = "Primero"; break;
      case "2": d = "dos"; break;
      case "3": d = "tres"; break;
      case "4": d = "cuatro"; break;
      case "5": d = "cinco"; break;
      case "6": d = "seis"; break;
      case "7": d = "siete"; break;
      case "8": d = "ocho"; break;
      case "9": d = "nueve"; break;
      case "10": d = "diez"; break;
      case "11": d = "once"; break;
      case "12": d = "doce"; break;
      case "13": d = "trece"; break;
      case "14": d = "catorce"; break;
      case "15": d = "quince"; break;
      case "16": d = "dieciséis"; break;
      case "17": d = "diecisiete"; break;
      case "18": d = "dieciocho"; break;
      case "19": d = "diecinueve"; break;
      case "20": d = "veinte"; break;
      case "21": d = "veintiuno"; break;
      case "22": d = "veintidos"; break;
      case "23": d = "veintitres"; break;
      case "24": d = "veinticuatro"; break;
      case "25": d = "veinticinco"; break;
      case "26": d = "veintiseis"; break;
      case "27": d = "veintisiete"; break;
      case "28": d = "veintiocho"; break;
      case "29": d = "veintinueve"; break;
      case "30": d = "treinta"; break;
      case "31": d = "treinta y uno"; break;
      default: break;
    }
    return d;
  }

  function demo(mes){
    var d;
    switch(mes)
    {
      case "1": d = "enero"; break;
      case "2": d = "febrero"; break;
      case "3": d = "marzo"; break;
      case "4": d = "abril"; break;
      case "5": d = "mayo"; break;
      case "6": d = "junio"; break;
      case "7": d = "Julio"; break;
      case "8": d = "agosto"; break;
      case "9": d = "septiembre"; break;
      case "10": d = "octubre"; break;
      case "11": d = "noviembre"; break;
      case "12": d = "diciembre"; break;
      default: break;
    }
    return d;
  }

  function saveData(dataPartida)
  {
    $.ajax({
        url: "class_db/saveData.php",
        type:"post",
        data: dataPartida,

        
        
        success: function(){
            //alert("Se Guardo la Partida de Nacimoento");             
            $(".A").removeClass("active");
            $(".B").addClass("active");
            $("#tab1_1").removeClass("active");
            
            $("#tab1_2").addClass("active in");
            $("#tab1_2").load("pages/lista_partidas.php");  
        },
        error:function(){          
            alert("Error al Guardar la partida de Nacimiento");
        }
  });
}


</script>

<style>

#menu_li, .nav-tabs:hover{
  cursor: pointer;
}
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
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<input type="hidden" value="<?php echo $_SESSION['data'][0]; ?>" name="idusuario" id="id_usuario">
<ul class="nav nav-tabs">
  <li id="menu_li" class="A active"><a href="#tab1_1" data-toggle="tab"><i class="fa fa-plus-circle color-icon"></i>Nueva</a></li>
  <li id="menu_li" class="B "><a href="#tab1_2" data-toggle="tab"><i class="fa fa-search color-icon"></i>Buscar</a></li>
  <li id="menu_li" class="C "><a href="#tab1_3" data-toggle="tab"><i class="fa fa-file color-icon"></i>Manual</a></li>
</ul>
<form method="post" action="">
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
                  <input class="input__field input__field--hoshi" type="text" id="padre" />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Nombre del Padre</span>
                  </label>
              </span>
            </div>
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="madre" required />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Nombre de la Madre</span>
                  </label>
              </span>
            </div>
          </div> 
          <div class="row line">
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="edad_padre" required />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Edad del padre</span>
                  </label>
              </span>
            </div>
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="edad_madre" required />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Edad de la Madre</span>
                  </label>
              </span>
            </div>
          </div>   
          <div class="row line">
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="estado_padre" required />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Estado Civil del padre</span>
                  </label>
              </span>
            </div>
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="estado_madre" required />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Estado Civil de la Madre</span>
                  </label>
              </span>
            </div>
          </div>      
          <div class="row line">
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="oficio_padre" required />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Oficio/Profesion del Padre</span>
                  </label>
              </span>
            </div>
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="oficio_madre" required />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Oficio/Profesion de la Madre</span>
                  </label>
              </span>
            </div>
          </div> 
          <div class="row line">
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="nacionalidad_padre" value="Salvadoreño" />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Nacionalidad del Padre</span>
                  </label>
              </span>
            </div>
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="nacionalidad_madre" value="Salvadoreña" />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Nacionalidad de la Madre</span>
                  </label>
              </span>
            </div>
          </div>
          <div class="row line">
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" value="este origen" id="origen_padre" required />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Originario de </span>
                  </label>
              </span>
            </div>
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" value="este origen" id="origen_madre" required />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Originaria de </span>
                  </label>
              </span>
            </div>
          </div>
          <div class="row line">
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="domiclio_padre" required />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Domicilio del padre</span>
                  </label>
              </span>
            </div>
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="domiclio_madre" required />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Domicilio de la Madre</span>
                  </label>
              </span>
            </div>
          </div>
          <div class="row line">
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="parentesco_emisor" required />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Parentesco de la persona que emitio estos datos</span>
                  </label>
              </span>
            </div>
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="dui_emisor" required />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Numero de identidad</span>
                  </label>
              </span>
            </div>
          </div>
          <div class="row line">
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="dui_emisor_expedido" required />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Documento Expedido Por</span>
                  </label>
              </span>
            </div>
            <div class="col-md-6">
              
                    <div class="form-group">
                          <label>Firma Esta Persona</label><br><br>
                          <select class="form-control form-white" id="firma_emisor" data-style="white" data-placeholder="Select a country...">
                            <option value="si">SI</option>
                            <option value="no">NO</option>
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
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="dui_testigo1" />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Numero Unico de Identidad Testigo 1</span>
                  </label>
              </span>
            </div>
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="dui_testigo2" />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Numero Unico de Identidad Testigo 2</span>
                  </label>
              </span>
            </div>
          </div>
          <div class="row line">
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="dui_testigo1_expedicion" />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Lugar de Expedicion DUI Testigo 1</span>
                  </label>
              </span>
            </div>
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="dui_testigo2_expedicion" />
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
                      <input class="input__field input__field--hoshi" type="text" id="nombre_recienacido" required />
                      <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                      <span class="input__label-content">Nombres del Bebe</span>
                      </label>
                    </span>                        
                    </div>
                    <div class="col-md-6">
                        <span class="input input--hoshi">
                      <input class="input__field input__field--hoshi" type="text" id="apellido_recienacido" required />
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
                          <select class="form-control form-white" id="genero_bebe" data-style="white" data-placeholder="Select a country...">
                            <option value="masculino">Masculino</option>
                            <option value="femenino">Femenino</option>
                          </select>
                        </div>
            </div>
          </div>
          <div class="row line">
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="lugar_nacimiento" required />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Lugar de Nacimiento</span>
                  </label>
              </span>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-4">
                  <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="number" id="dia" min="1" max="31" required />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                  <span class="input__label-content">DIA</span>
                  </label>
                  </span>
                </div>
                <div class="col-md-4">
                  <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="number" id="mes" value="" required />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                  <span class="input__label-content">MES</span>
                  </label>
                  </span>
                </div>
                <div class="col-md-4">
                  <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="number" id="anio" value="" required />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                  <span class="input__label-content">AÑO</span>
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
                          <select class="form-control bg-primary" id="tipo" data-style="white" data-placeholder="Select a country...">                            
                            <option value="">Seleccione</option>
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
               <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="hora_nacimiento" required />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Hora de Nacimiento</span>
                  </label>
                </span>

                 <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="jurisdisccion" required />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Jurisdiccion</span>
                  </label>
                </span>

                 <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" type="text" id="fecha_emision" required />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">

                  <span class="input__label-content">Fecha de Emision</span>
                  </label>
                </span>
                <br><br><br>

              <input type="button" id="guardar_pnacimiento" class="btn btn-primary" value="Guardar">
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
</form>

<style>
  .table.filter-head>thead>tr>th {min-width: 180px;}
  
</style>

