 <!-- END PRELOADER -->
    <a href="#" class="scrollup"><i class="fa fa-angle-up"></i></a> 
    <script src="assets/plugins/jquery/jquery-1.11.1.min.js"></script>
    <script src="assets/plugins/jquery/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/plugins/jquery-ui/jquery-ui-1.11.2.min.js"></script>
    <script src="assets/plugins/gsap/main-gsap.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/jquery-cookies/jquery.cookies.min.js"></script> <!-- Jquery Cookies, for theme -->
    <script src="assets/plugins/jquery-block-ui/jquery.blockUI.min.js"></script> <!-- simulate synchronous behavior when using AJAX -->
    <script src="assets/plugins/translate/jqueryTranslator.min.js"></script> <!-- Translate Plugin with JSON data -->
    <script src="assets/js/sidebar_hover.js"></script> <!-- Sidebar on Hover -->
    <script src="assets/js/plugins.js"></script> <!-- Main Plugin Initialization Script -->
    <script src="assets/js/widgets/notes.js"></script> <!-- Notes Widget -->
    <script src="assets/js/quickview.js"></script> <!-- Chat Script -->
    <script src="assets/js/pages/search.js"></script> <!-- Search Script -->
    <!-- BEGIN PAGE SCRIPT -->
    <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script> <!-- Tables Filtering, Sorting & Editing -->
    <script src="assets/js/pages/table_dynamic.js"></script>
    <!-- BEGIN PAGE SCRIPT -->
    <link href="assets/plugins/input-text/style.min.css" rel="stylesheet">

<!--    <script src="assets/js/pages/form_icheck.js"></script> -->
    <!-- END PAGE STYLE -->

<?php
session_start();

?>
<script>

$.ajax
    ({
        type: "POST",
        url: "pages/ejecutarscript.php",
        data: {action:'VerificarFolder'},
        success: function(data)
        {
          if (data=="true") 
            {
               $(".cont-createfolder").remove(); 
               $("#container-configTwo").show();
            }
            else
            {
              $(".cont-createfolder").show(); 
              $("#container-configTwo").hide();
            }    
        }
    });

$(document).ready(function()
{
 
  $("#saveType").click(function ()
  { 
        if ($("#nombre").val() != "" && $("#folder").val() != "")
        {
          var name = $("#nombre").val();
          var descripcion = $("#descripcion").val();
          var folder = $("#folder").val();
          var estatus = $("#estatus").val();

          $.ajax
          ({
             type: "POST",
             url: "pages/ejecutarscript.php",
             data: {name:name, descripcion:descripcion, folder:folder, estatus:estatus,action: 'SaveTypeDG'},
             success: function(msg)
             {
              if (msg=="true")
               {
                  $("#msgajax").html("Guardado Correctamente");
                  $("#msgajax").fadeIn(2000);
                  $("#msgajax").fadeOut(4500);
                  $("#nombre").val("");
                  $("#descripcion").val("");
                  $("#folder").val("");
              }
              else
              {
                $("#msgajax").html("Erro al crear el registro");
                $("#msgajax").fadeIn(2000);
                $("#msgajax").fadeOut(4500);
              }
                
             }
              
           });
        }
        else
        {

          $("#msgajax").html("Todos los campos con * son requeridos");
          $("#msgajax").fadeIn(2000);
          $("#msgajax").fadeOut(4500);
          
        }
      
  });
    
  $("#createFolder").click(function () 
  { 
       if ( $("#nombreFolder").val() != "") 
      {  

         var folderName = $("#nombreFolder").val();

        $.ajax({
             type: "POST",
             url: "pages/ejecutarscript.php",
             data: {folderName:folderName,action: 'CreateFolder'},
             success: function(msg)
             {
              if (msg=="true") 
              {
            
                 $(".cont-createfolder").remove(); 
                 $("#container-configTwo").show();
              }
              else
              {
                 alert("El foder ya existe");
                 
              }
              
             }
           });
      }
      else
      {
         alert("El nombre del folder es requerido");
         
      }
  });


   $("li#menu_li").click(function()
   {
        var texto = $(this).text();        
            if(texto=="Configurar")        
            {                                 
                $("#tab1_2").hide();
                $("#tab1_3").hide();
                $("#tab1_1").show();
            }
            if (texto=="Mover") 
            {
              $(".procesar").load("pages/procesar.php");      
              $("#tab1_1").hide();
              $("#tab1_2").show();
              $("#tab1_3").hide();

            }
            if (texto=="Categorias") 
            {
              $(".procesar").load("pages/listCategoriasDigitales.php");      
              $("#tab1_1").hide();
              $("#tab1_2").hide();
              $("#tab1_3").show();

            }
    
    });

});
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
</style>


<input type="hidden" value="<?php echo $_SESSION['data'][0]; ?>" name="idusuario" id="id_usuario">
<ul class="nav nav-tabs">
  <li id="menu_li"  class="active fa fa-wrench"><a href="#tab1_1" data-toggle="tab">Configurar</a></li>
  <li id="menu_li" class="fa fa-exchange"><a href="#tab1_2" data-toggle="tab">Mover</a></li>
   <li id="menu_li"  class="fa fa-folder-open-o"><a href="#tab1_3" data-toggle="tab">Categorias</a></li>
</ul>

  <div class="tab-pane fade active in" id="tab1_1">
 
  <br>
  <div class="col-md-12">

  <div class="cont-createfolder" style="padding: 20px;
    border-bottom: 3px solid rgba(51, 51, 51, 0.69);">
              

              <div><span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" placeholder="Nombre para Folder" type="text" id="nombreFolder" />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                  <span class="input__label-content">Nombre para carpeta</span>
                  </label>
                
              </span> 
              <input type="button" id="createFolder" class="btn btn-primary" value="Crear Folder" style="margin-top: 60px;
    margin-left: 41px;">
              </div>
         
     

   

      <div class="input__label-content" style="font-weight: bold;color: #000;"><span class="fa arrow"></span> * Para poder manejar todo el sistema de actas digitales es necesario crear un folder principal en el sistema, el cual contendra todo los archivos que se moveran progresivamente segun la necesidad.
      </div>
     
  </div>
 
      <div id="container-configTwo">

      <br>
      <h2>Crear tipo de acta o partida.</h2>
      <h4>Esta opcion es para crear una nueva categoria o tipo de actas o documentos que ya se tenga en digital y se 
      se desean agregar al siste REF, con el fin de manejar esta informacion des del sistema.</h4>
      <hr>
             
            <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" placeholder="Nombre para acta" type="text" id="nombre" />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                  <span class="input__label-content"> * Nombre</span>
                  </label>
              </span>    
              </div>  
                 
               <div class="col-md-6">
              <span class="input input--hoshi">
                   <input class="input__field input__field--hoshi" placeholder="Descripción" type="text" id="descripcion" />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                  <span class="input__label-content">Descripción</span>
                  </label>
              </span>    
              </div>

              <div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" placeholder="Nombre del folder" type="text" id="folder" />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                  <span class="input__label-content"> * Nombre carpeta de documentos</span>
                  </label>
              </span>    
              </div>

             <div class="col-md-6">

             <span class="input input--hoshi">
                     <select  id="estatus"  class='input__field input__field--hoshi'>                            
                          <option value="1">Activo</option>
                          <option value="0">Inactivo</option>
                      </select>
                    <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                  <span class="input__label-content">Tipo de Acta</span>
                  </label>
              </span> 
                   
            </div>
           

              
              <hr>    
              <div class="col-md-12">
                   <p><input type="button" id="saveType" class="btn btn-primary" value="Guardar"></p>
     

              <div id="msgajax" class="alert alert-success" role="alert" style="margin: 12px;text-align: center;font-size: 16px;font-weight: bold;display: none;"></div> 
              
          
  

 </div>
 
</div>  
</div> 
  </div>  
 <div class="tab-pane procesar fade" id="tab1_2">
  
 </div> 

  <div class="tab-pane procesar fade" id="tab1_3">
 
 </div> 
 
<style>
  .table.filter-head>thead>tr>th {min-width: 180px;}
  
</style>

