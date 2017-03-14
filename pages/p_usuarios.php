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
header('Content-Type: text/html; charset=UTF-8'); 
include_once("../class_db/class_usuarios.php");
$pages = "administrar_usuarios";

$data   = selectCargos();
$roles  = selectRoles();
$avatar = avatar();
$avatar2 = avatar();
//$marginacion = selectMarginacion(1,$id_partida);
//$logo = logo($pages);
//$empresa = empresa();
//$t_pnacimiento = template_pnacimiento(1);




?>

<script>
  $(document).ready(function(){
      // CONVERTIR FECHAS A TEXTO
      $("li#menu_li").click(function(){
        var texto = $(this).text();        
            if(texto=="Buscar")        
            {                 
                $(".includ").load("pages/lista_usuarios.php");             
            }
        });

      $(".femenino").hide();

      $("#genero").change(function (){
        var genero = $("#genero").val();
          if(genero == "F")
          {
            $(".femenino").show();
            $(".masculino").hide();
          }
          else
          {
            $(".femenino").hide();
            $(".masculino").show();
          }
      });

      
      
      $("#guardar_usuario").click(function(){   

        var avatar              = $('input:radio[name=avatar]:checked').attr("id");
        var primer_nombre 		= $("#primer_nombre").val();        
        var segundo_nombre 		= $("#segundo_nombre").val();
        var primer_apellido 	= $("#primer_apellido").val();
        var segundo_apellido 	= $("#segundo_apellido").val();
        var telefono 			= $("#telefono").val();
        var celular 			= $("#celular").val();
        var direccion 			= $("#direccion").val();
        var dui 				= $("#dui").val();
        var usuario 			= $("#usuario").val();
        var password 			= $("#password").val();
        var fecha_nacimiento 	= $("#fecha_nacimiento").val();
        var genero 				= $("#genero").val();
        var cargo 				= $("#cargo").val();
        var rol 				= $("#rol").val();
        var accion              = "insert_usuario";        

          var dataPartida = {
              primer_nombre:primer_nombre,
              segundo_nombre:segundo_nombre,
              primer_apellido:primer_apellido,
              segundo_apellido:segundo_apellido,
              telefono:telefono,
              celular:celular,
              direccion:direccion,
              dui:dui,
              usuario:usuario,
              password:password,
              fecha_nacimiento:fecha_nacimiento,
              genero:genero,
              cargo:cargo,
              rol:rol,
              avatar:avatar,
              accion:accion         
            };      
        if(primer_nombre!="" && segundo_nombre!="" && primer_apellido!="" && usuario!="" && password!="")
        {
            if(avatar!="")
            {
                saveData1(dataPartida);         
            }
            else
            {
                alert("Selecionar un Avatar");
            }
        }
        else
        {
            alert("Campos Requeridos");
        }
        

      });

  });

  function saveData1(dataPartida)
  {
    
    $.ajax({
        url: "class_db/saveUsuario.php",
        type:"post",
        data: dataPartida,
        
        success: function(){
          //alert("Se Guardo Correctamente El usuario");
          $(".A").removeClass("active");
          $(".B").addClass("active");
          $("#tab1_1").removeClass("active");
            
          $("#tab1_2").addClass("active in");
          $("#tab1_2").load("pages/lista_usuarios.php");  
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
  .avatar{
    padding: 10px;
    display: inline-block;
  }



</style>


<ul class="nav nav-tabs">
  <li id="menu_li" class="A active"><a href="#tab1_1" data-toggle="tab"><i class='fa fa-user'></i>Nuevo Usuario</a></li>
  <li id="menu_li" class="B "><a href="#tab1_2" data-toggle="tab"><i class='fa fa-search'></i>Buscar</a></li>
  <li id="menu_li" class="C "><a href="#tab1_3" data-toggle="tab">Configurar</a></li>
</ul>

  <div class="tab-content">
    <div class="tab-pane fade active in" id="tab1_1">
      <div class="row">
        <div class="col-md-12">
          <div class="row line">
                <div class="col-md-6">
                  <span class="input input--hoshi">
                      <input class="input__field input__field--hoshi" type="text" id="primer_nombre" required />
                      <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                      <span class="input__label-content">Primer Nombre</span>
                      </label>
                  </span>
                </div>
                <div class="col-md-6">
                  <span class="input input--hoshi">
                      <input class="input__field input__field--hoshi" type="text" id="segundo_nombre" required />
                      <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                      <span class="input__label-content">Segundo Nombre</span>
                      </label>
                  </span>
                </div>
          </div> 
          
          <div class="row line">
          	 <div class="col-md-6">
                  <span class="input input--hoshi">
                      <input class="input__field input__field--hoshi" type="text" id="primer_apellido" required />
                      <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                      <span class="input__label-content">Primer Apellido</span>
                      </label>
                  </span>
                </div>
                <div class="col-md-6">
                  <span class="input input--hoshi">
                      <input class="input__field input__field--hoshi" type="text" id="segundo_apellido" required />
                      <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                      <span class="input__label-content">Segundo Apellido</span>
                      </label>
                  </span>
                </div>
          </div>  

          <div class="row line">
         	 <div class="col-md-6">
                  <span class="input input--hoshi">
                      <input class="input__field input__field--hoshi" type="text" id="telefono" required />
                      <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                      <span class="input__label-content">Teléfono Fijo</span>
                      </label>
                  </span>
                </div>
                <div class="col-md-6">
                  <span class="input input--hoshi">
                      <input class="input__field input__field--hoshi" type="text" id="celular" required />
                      <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                      <span class="input__label-content">Teléfono Móvil</span>
                      </label>
                  </span>
                </div>
          </div> 

          <div class="row line">
          	 <div class="col-md-6">
                  <span class="input input--hoshi">
                      <input class="input__field input__field--hoshi" type="text" id="direccion" required />
                      <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                      <span class="input__label-content">Dirección</span>
                      </label>
                  </span>
                </div>
                <div class="col-md-6">
                  <span class="input input--hoshi">
                      <input class="input__field input__field--hoshi" type="text" id="dui" required />
                      <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                      <span class="input__label-content">DUI</span>
                      </label>
                  </span>
                </div>
          </div>

          <div class="row">
            
             	 <div class="col-md-6">
                  <span class="input input--hoshi">
                      <input class="input__field input__field--hoshi" type="text" id="usuario" required/>
                      <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                      <span class="input__label-content">Usuario</span>
                      </label>
                  </span>
                </div>
                <div class="col-md-6">
                  <span class="input input--hoshi">
                      <input class="input__field input__field--hoshi" type="text" id="password" required />
                      <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                      <span class="input__label-content">Password</span>
                      </label>
                  </span>
                </div>
                  
          </div>

          <div class="row">
               
            	 <div class="col-md-6">
                  <span class="input input--hoshi">
                      <input class="input__field input__field--hoshi" type="date" id="fecha_nacimiento" />
                      <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                      <span class="input__label-content">Fecha Nacimiento</span>
                      </label>
                  </span>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Genero</label><br><br>
                        <select class="form-control form-grey" id="genero" data-style="white" data-placeholder="Select a country...">
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>
                        </select>
                    </div>
                </div>            
          </div>

          <div class="row">
            <div class="col-md-12">      
            	<div class="col-md-6">
                	 <div class="form-group">
                        <label>Cargo</label><br><br>
                        <select class="form-control form-grey" id="cargo" data-style="white" data-placeholder="Select a country...">
							<?php
							while($row = mysql_fetch_array($data))
							{
								?>
									<option value="<?php echo $row['id_cargo']; ?>"><?php echo $row['nombre_cargo']; ?></option>
								<?php
							}
							?>                      
                        </select>
                    </div> 
                </div>
                <div class="col-md-6">
                   <div class="form-group">
                        <label>Rol</label><br><br>
                        <select class="form-control form-grey" id="rol" data-style="white" data-placeholder="Select a country...">
                            <?php
							while($row = mysql_fetch_array($roles))
							{
								if($row['id_rol']!=1)
								{								
								?>
									<option value="<?php echo $row['id_rol']; ?>"><?php echo $row['nombre_rol']; ?></option>
								<?php
								}
							}
							?>  
                        </select>
                    </div>
                </div>            
            </div>  
          </div>

          <div class="row">
            <div class="col-md-6">Avatar Masculinos</div>
            <div class="col-md-6">Avatar Femeninos</div>
          </div>
          <div class="row line">            
               <div class="col-md-6">
                  <span class="input input--hoshi masculino">
                     <table>
                     <tr>
                     <?php
                     $path = 'assets/images/avatars/';

                     while($row = mysql_fetch_array($avatar))
                     {
                      if($row['genero_avatar'] == 'm')
                      {
                      ?>
                        <div class='avatar'>
                          <img src="<?php echo $path.$row['url_avatar']; ?>" width="70px">
                          <input type="radio" class="avatar" name="avatar" id="<?php echo $row['url_avatar']; ?>">
                        </div>
                      <?php                      
                      }
                     }
                     ?>
                     </tr>
                     </table>
                  </span>
                </div>
                <div class="col-md-6">
                  <span class="input input--hoshi femenino">
                    <table>
                      <tr>
                       <?php
                         $path = 'assets/images/avatars/';

                         while($row1 = mysql_fetch_array($avatar2))
                         {
                          if($row1['genero_avatar'] == 'f')
                          {
                            ?>
                              <div class='avatar'>
                                <img src="<?php echo $path.$row1['url_avatar']; ?>" width="70px">
                                <input type="radio" class='avatar' name="avatar" id="<?php echo $row1['url_avatar']; ?>">
                              </div>
                            <?php                      
                          }
                         }
                       ?>
                      </tr>
                    </table>
                  </span>
                </div>
                  
          </div>


          <input type="button" id="guardar_usuario" class="btn btn-primary" value="Guardar">
        </div>
      </div>
    </div>

    <div class="tab-pane includ fade" id="tab1_2">
      
    </div>

    <div class="tab-pane fade" id="tab1_3">
      <p></p>
    </div>
  </div>