
<?php
include_once("../class_db/class_p_nacimiento.php");
$data = selectAD(); 

?>
<script>
  $(document).ready(function(){

     $("#procesarDocs").hide();

       //-------------vento click para guardar la informacion-
      $("#move").click(function()
      {
        
        if ($("#axo").val()=="" && $("#path").val()=="") 
        {
            alert("Todos los campos son requeridos");
        }
        else
        {
            if ($("#ad_actas").val()==0)
            {
              alert("No hay categorias disponibles");
            }
            else
            {
              var path = $("#path").val();
              var axo = $("#axo").val();
              var type = $("#ad_actas").val();
           
              $.ajax
                ({
                      url:'pages/ejecutarscript.php',
                      type:'post',
                      cache: false,
                      data: {action: 'MoveFile', path:path, axo: axo, type: type},
                    success:function(data)
                      {
                        if (data=='dir') 
                          {
                             alert("Ya existe el directorio con ese año");
                          }
                          else
                          {
                            $("#axo").val("");
                            $("#idtype").val(type);
                            $("#axoFolder").val(axo);
                            $("#valuefiles").html(data);
                            $("#procesarDocs").show();
                            $("#move").hide();
                          }
                        
                      }
              }); 
            }
              
         }      
        
        });

      $("#procesarDocs").click(function()
      {
             
              var type = $("#idtype").val();
              var axo = $("#axoFolder").val();
           
              $.ajax
                ({
                      url:'pages/procesDocument.php',
                      type:'post',
                      data: {action: 'ProceDoc', axo:axo, type: type},
                    success:function(data)
                      {
                        if (data=="true")
                        {
                           $(".success").html("Se proceso correctamente");
                           $(".success").fadeIn(3000);
                           $("#valuefiles").html("");
                           $(".success").fadeOut(5500);
                           $("#axo").val("");
                           $("#idtype").val("");
                           $("#axoFolder").val("");
                           $("#valuefiles").html("0");
                           $("#procesarDocs").hide();
                           $("#move").show();
                        }
                        else
                        {
                           $(".success").html("Error en la información");
                           $(".success").fadeIn(2000);
                           $(".success").fadeOut(4500);
                        }
                         
                      }
              });  
        
        });
    
  })
</script>
    <!-- END PAGE STYLE -->
      <div class="col-md-12">

  <br>
  <h2>Mover actas o partidas digitales al sistema.</h2>
  <hr>
<div class="col-md-6">
              <span class="input input--hoshi">
                  <input class="input__field input__field--hoshi" placeholder="C://example/file.docx" type="text" id="path" />
                  <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                  <span class="input__label-content">* Ruta de los archivos</span>
                  </label>
              </span>    

                 
                 <span class="input input--hoshi">
                    <?php
                    echo "<select size'3' name='ad_actas' id='ad_actas' class='input__field input__field--hoshi'>";
                    echo "<option value='0'>---Seleccione---</option>";   
                     while($row = mysql_fetch_array($data))
                        {
                             echo"<option value='".$row['id_tipo']."'>".utf8_decode($row['nombre'])."</option>";
                          }
                    echo "</select>";
                    ?> 
                    <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                  <span class="input__label-content">* Tipo de Acta</span>
                  </label>
                  </span>  

              <span class="input input--hoshi" style="width: 150px;">
                <input class="input__field input__field--hoshi" placeholder="1990" type="text" id="axo" />
                   <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                  <span class="input__label-content">* Año</span>
                  </label>
              </span>  
            
              <p><input type="button" id="move" class="btn btn-primary" value="Mover Documentos"></p>
              <div id="msgajax" class="alert alert-success" role="alert" style="display: none;"></div>  
            </div>
            <div class="col-md-6">
                  <div class="jumbotron" style="padding: 10px;margin: 10px;">
                  <h2  style="text-align: center;font-weight: bold;">Procesamiento de Actas</h2>
                  <hr>
                  <h3><span style="font-weight: bold;font-size: 15px;"># Total Documentos movidos:</span><span id="valuefiles" 
                  style="font-weight:bold;font-size: 34px;margin-left: 12px;color: #8DC153;"> 0</span></h3>
                  <br>
                  <input type="hidden" value="" name="idtype" id="idtype">
                  <input type="hidden" value="" name="stringData" id="stringData">
                  <input type="hidden" value="" name="axoFolder" id="axoFolder">

                  <span id="procesarDocs" class="btn btn-primary" style="margin-top: 8px;">Procesar Documentos</span> 
                  
                  <span class="fa fa-check success" style="font-weight: bold;font-weight: bold;width: 100%;height: 40px;padding-top: 10px;text-align: center;background-color: #8CC152;-webkit-border-radius: 4px;-moz-border-radius: 4px;border-radius: 4px;display:none" role="alert">&nbsp;&nbsp;&nbsp;Mensaje</span>   

                
                  
            </div>        
</div>