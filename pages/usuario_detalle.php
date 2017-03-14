<script>
  $(document).ready(function(){
      $("#update_usuario").click(function(){
        
        var primer_nombre     = $("#primer_nombre1").val();        
        var segundo_nombre    = $("#segundo_nombre1").val();
        var primer_apellido   = $("#primer_apellido1").val();
        var segundo_apellido  = $("#segundo_apellido1").val();
        var telefono      = $("#telefono1").val();
        var celular       = $("#celular1").val();
        var direccion       = $("#direccion1").val();
        var dui         = $("#dui1").val();
        var usuario       = $("#usuario1").val();
        var password      = $("#password1").val();
        var fecha_nacimiento  = $("#fecha_nacimiento1").val();
        var genero        = $("#genero1").val();
        var cargo         = $("#cargo1").val();
        var rol         = $("#rol1").val();
        var id_usuario         = $("#id_usuario").val();
        var accion              = "update_usuario";  

        var dataUsuario = {
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
              id_usuario:id_usuario,
              accion:accion         
            }; 

            updateUsuario(dataUsuario);             
      });

      function updateUsuario(dataUsuario)
        {
          
          $.ajax({
              url: "class_db/saveUsuario.php",
              type:"post",
              data: dataUsuario,
              
              success: function(){
                  alert("success");    
              },
              error:function(){
                  alert("failure");
              }
          });
        }
  });
</script>


<?php
session_start();
header('Content-Type: text/html; charset=UTF-8'); 
include_once("../class_db/class_usuarios.php");
$pages = "partida_detalle";
$id_usuario =  $_GET['id'];

$data = usuariosDetalle($id_usuario);
$cargos	=	cargos();
$roles	=	roles();


?>


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
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<input type="hidden" value="<?php echo $id_usuario;  ?>" id="id_usuario">


    <div class="tab-pane fade active in" id="">
      <div class="row">
        <div class="col-md-12">
          <div class="row line">
                <div class="col-md-6">
                  <span class="input input--hoshi">
                      <input class="input__field input__field--hoshi" type="text" value="<?php echo $data['primer_nombre']; ?>" id="primer_nombre1" />
                      <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                      <span class="input__label-content">Primer Nombre</span>
                      </label>
                  </span>
                </div>
                <div class="col-md-6">
                  <span class="input input--hoshi">
                      <input class="input__field input__field--hoshi" type="text" value="<?php echo $data['segundo_nombre']; ?>" id="segundo_nombre1" required />
                      <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                      <span class="input__label-content">Segundo Nombre</span>
                      </label>
                  </span>
                </div>
          </div> 
          
          <div class="row line">
          	 <div class="col-md-6">
                  <span class="input input--hoshi">
                      <input class="input__field input__field--hoshi" type="text" value="<?php echo $data['primer_apellido']; ?>" id="primer_apellido1" />
                      <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                      <span class="input__label-content">Primer Apellido</span>
                      </label>
                  </span>
                </div>
                <div class="col-md-6">
                  <span class="input input--hoshi">
                      <input class="input__field input__field--hoshi" type="text" value="<?php echo $data['segundo_apellido']; ?>" id="segundo_apellido1" required />
                      <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                      <span class="input__label-content">Segundo Apellido</span>
                      </label>
                  </span>
                </div>
          </div>  

          <div class="row line">
         	 <div class="col-md-6">
                  <span class="input input--hoshi">
                      <input class="input__field input__field--hoshi" type="text" value="<?php echo $data['telefono']; ?>" id="telefono1" />
                      <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                      <span class="input__label-content">Telefono</span>
                      </label>
                  </span>
                </div>
                <div class="col-md-6">
                  <span class="input input--hoshi">
                      <input class="input__field input__field--hoshi" type="text" value="<?php echo $data['celular']; ?>" id="celular1" required />
                      <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                      <span class="input__label-content">Celular</span>
                      </label>
                  </span>
                </div>
          </div> 

          <div class="row line">
          	 <div class="col-md-6">
                  <span class="input input--hoshi">
                      <input class="input__field input__field--hoshi" type="text" value="<?php echo $data['direccion']; ?>" id="direccion1" />
                      <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                      <span class="input__label-content">Direccion</span>
                      </label>
                  </span>
                </div>
                <div class="col-md-6">
                  <span class="input input--hoshi">
                      <input class="input__field input__field--hoshi" type="text" value="<?php echo $data['dui']; ?>" id="dui1" required />
                      <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                      <span class="input__label-content">DUI</span>
                      </label>
                  </span>
                </div>
          </div>

          <div class="row">
            
             	 <div class="col-md-6">
                  <span class="input input--hoshi">
                      <input class="input__field input__field--hoshi" type="text" value="<?php echo $data['usuario']; ?>" id="usuario1" />
                      <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                      <span class="input__label-content">Usuario</span>
                      </label>
                  </span>
                </div>
                <div class="col-md-6">
                  <span class="input input--hoshi">
                      <input class="input__field input__field--hoshi" type="password" value="<?php echo $data['password']; ?>" id="password1" required />
                      <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                      <span class="input__label-content">Password</span>
                      </label>
                  </span>
                </div>
                  
          </div>

          <div class="row">
               
            	 <div class="col-md-6">
                  <span class="input input--hoshi">
                      <input class="input__field input__field--hoshi" type="date" value="<?php echo $data['fecha_nacimiento']; ?>" id="fecha_nacimiento1" />
                      <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
                      <span class="input__label-content">Fecha Nacimiento</span>
                      </label>
                  </span>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Genero</label><br><br>
                        <select class="form-control form-grey" id="genero1" data-style="white" data-placeholder="Select a country...">
                        	<?php
                        		if($data['genero']=='M')
                        		{
                        			?>
                        			<option value="M">Masculino</option>
                        			<option value="F">Femenino</option>
                        			<?php
                        		}
                        		else
                        		{
                        			?>
                        			<option value="F">Femenino</option>
                        			<option value="M">Masculino</option>
                        			<?php
                        		}
                        	?>
                            
                            
                        </select>
                    </div>
                </div>            
          </div>

          <div class="row">
            <div class="col-md-12">      
            	<div class="col-md-6">
                <div class="form-group">
                  <label>Cargo</label><br><br>
                  <select class="form-control form-grey" id="cargo1" data-style="white" data-placeholder="Select a country...">
							     <option value="<?php echo $data['id_cargo']; ?>"><?php echo $data['nombre_cargo']; ?></option>
							<?php

							while($row = mysql_fetch_array($cargos))
							{
								if($row['nombre_cargo']!=$data['nombre_cargo']){
								?>
									<option value="<?php echo $row['id_cargo']; ?>"><?php echo $row['nombre_cargo']; ?></option>
								<?php
								}
							}
							?>                      
                        </select>
                    </div> 
                </div>
                <div class="col-md-6">
                   <div class="form-group">
                        <label>Rol</label><br><br>
                        <select class="form-control form-grey" id="rol1" data-style="white" data-placeholder="Select a country...">
                        <option value="<?php echo $data['id_rol']; ?>"><?php echo $data['nombre_rol']; ?></option>
                            <?php
            							while($row = mysql_fetch_array($roles))
            							{
            								if($row['nombre_rol']!=$data['nombre_rol'])
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
          <input type="button" id="update_usuario" class="btn btn-primary" value="Guardar">
        </div>
      </div>
    </div>


