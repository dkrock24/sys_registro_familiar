  <script src="assets/plugins/jquery/jquery-1.11.1.min.js"></script>
  <script src="assets/plugins/jquery/jquery-migrate-1.2.1.min.js"></script>
  <script src="assets/plugins/jquery-ui/jquery-ui-1.11.2.min.js"></script>



<?php
session_start();
include_once("../class_db/cargar_perfil.php");

$dataInfo = id();
?>
<script>
$(document).ready(function(){
 
   $("#cambiarPassword").click(function(){     
        $(".perfil").load("pages/password/password.php");
    });
   $("#cambiarAvatar").click(function(){     
        $(".perfil").load("pages/avatar.php");
    });
});

</script>

<style>
.espacios{

}

.perfil_datos{
  border:1px solid black;
  padding: 5px;
  margin-top: 5px;
}
</style>

<div class="perfil">
	<div class="row line ">
		    <div class="col-md-3 espacios">
                                    
              <span class="input__label-content">Nombres</span>
        	  
        </div>

        <div class="col-md-3 espacios">
           	
                <span class="input__label-content"><?php echo $dataInfo['primer_nombre'] ." ". $dataInfo['segundo_nombre']; ?></span>
          	
        </div>

        <div class="col-md-3 espacios">
            
                <span class="input__label-content">Apellidos</span>
        	
        </div>
        <div class="col-md-3 espacios">
          
                <span class="input__label-content"><?php echo $dataInfo['primer_apellido'] ." ". $dataInfo['segundo_apellido']; ?></span>
          
        </div>
	</div>
	
	<div class="row line">
		<div class="col-md-3">
                           
               
                <span class="input__label-content">Direccion</span>
        
          
            </div>
            <div class="col-md-3">
                           
                
                <span class="input__label-content"><?php echo $dataInfo['direccion'] ; ?></span>
               
        
        </div>
        <div class="col-md-3">
                         
                
                <span class="input__label-content">DUI</span>
                
           
            </div>
            <div class="col-md-3">
                            
                
                <span class="input__label-content"><?php echo $dataInfo['dui']; ?></span>
                
        	
        </div>
	</div>

	<div class="row line">
		<div class="col-md-3">
                              
                
                  <span class="input__label-content">Telefono</span>
                
            
            </div>
            <div class="col-md-3">
                       
                
                  <span class="input__label-content"><?php echo $dataInfo['telefono']; ?></span>
                
           
            </div>
            <div class="col-md-3">
                          
                 
                  <span class="input__label-content">Celular</span>
                 
             
            </div>
            <div class="col-md-3">
                       
                 
                  <span class="input__label-content"><?php echo $dataInfo['celular']; ?></span>
                 
             
            </div>
	</div>

	<div class="row line">
		<div class="col-md-3">
                           
               
                <span class="input__label-content">Fecha Creacion</span>
               
        	
        </div>
        <div class="col-md-3">
          	               
              
              	<span class="input__label-content"><?php echo $dataInfo['fecha_creacion']; ?></span>
              
            
        </div>
        <div class="col-md-3">
                        
               
                <span class="input__label-content">Cargo</span>
               
        	
        </div>
        <div class="col-md-3">
          	                
              
              	<span class="input__label-content"><?php echo $dataInfo['nombre_cargo']; ?></span>
              
            	
        </div>
	</div>

  <div class="row line">
    <div class="col-md-3">
      Cambiar password <a href='#' class="btn btn-success" id="cambiarPassword">aqui</a>
    </div>
    <div class="col-md-3">
      Cambiar Avatar <a href='#' class="btn btn-success" id="cambiarAvatar">aqui</a>
    </div>
  </div>
</div>




