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
include_once("../class_db/class_p_nacimiento.php");

$data = empresa();



?>
<script>
	$(document).ready(function(){

		$("#updateInfo").click(function(){
			var id_empresa 			=$("#id").val();
			var nombre_empresa 		=$("#nombre_empresa").val();
			var rubro_empresa		=$("#rubro_empresa").val();
			var pais 				=$("#pais").val();
			var departamento 		=$("#departamento").val();
			var municipio 			=$("#municipio").val();
			var telefono 			=$("#telefono").val();
			var fax 				=$("#fax").val();
			var nit 				=$("#nit").val();
			var nombre_secretario	=$("#nombre_secretario").val();
			var jefe_registro_familiar	=$("#jefe_registro_familiar").val();
			var nombre_alcalde		=$("#nombre_alcalde").val();

			var data = {
				accion:"informacion_empresa",
				id_empresa:id_empresa,
				nombre_empresa:nombre_empresa,
				rubro_empresa:rubro_empresa,
				pais:pais,
				departamento:departamento,
				municipio:municipio,
				telefono:telefono,
				fax:fax,
				nit:nit,
				nombre_secretario:nombre_secretario,
				jefe_registro_familiar:jefe_registro_familiar,
				nombre_alcalde:nombre_alcalde
			};

			updateData(data);

		});


		function updateData(data)
  		{	
	    	//alert(dataPartida['padre']);
	    	$.ajax({
	        	url: "class_db/saveData.php",
	        	type:"post",
	        	data: data,
	        
	        	success: function(){        		
	            	alert("success");    
	            	$(".includ").load("pages/p_informacion.php");            	
	        	},	
	        	error:function(){
	            	alert("failure");
	        	}
	  		});
    	}


		
		
	})
</script>
<style>
.opciones{
	float: right;
	margin-top: -10px;
}
</style>
<input type="hidden" id="id" value="<?php echo $data['id_empresa']; ?>">
<div class="row">
    <div class="col-md-12">
    	<div class="panel">
            <div class="panel-header bg-primary">
            	Actualizacion de la Informacion de la Alcaldia
            	<div class="opciones">
            		<a href="#" id="updateInfo" class='btn btn-primary btn-small'>Guardar Cambios</a>
            	</div>
            </div>
            <div class="panel-content">
            	<div class="row">
            		<div class="col-md-4">
            			<strong>Nombre Institucion:</strong> <br>
            			
            			<span class="input input--hoshi">
		                <input class="input__field input__field--hoshi" type="text" id="nombre_empresa" value="<?php echo $data['nombre_empresa']; ?>" />
		                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
		                </label>
              			</span>            			
            		</div>
            		<div class="col-md-4"><strong>Rubro</strong>            			
            			<span class="input input--hoshi">
		                <input class="input__field input__field--hoshi" type="text" id="rubro_empresa" value="<?php echo $data['rubro_empresa']; ?>" />
		                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
		                </label>
              			</span>
            		</div>
            		<div class="col-md-4"><strong>Pais</strong><br>
            			<span class="input input--hoshi">
		                <input class="input__field input__field--hoshi" type="text" id="pais" value="<?php echo $data['pais']; ?>" />
		                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
		                </label>
              			</span>
            		</div>
            	</div>
            	<hr>
            	<div class="row">
            		<div class="col-md-4"><strong>Departamento</strong><br>            			
            			<span class="input input--hoshi">
		                <input class="input__field input__field--hoshi" type="text" id="departamento" value="<?php echo $data['departamento']; ?>" />
		                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
		                </label>
              			</span>
            		</div>
            		<div class="col-md-4"><strong>Municipio</strong><br>
            			
            			<span class="input input--hoshi">
		                <input class="input__field input__field--hoshi" type="text" id="municipio" value="<?php echo $data['municipio']; ?>" />
		                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
		                </label>
              			</span>
            		</div>
            		<div class="col-md-4"><strong>Telefono</strong><br>
            			
            			<span class="input input--hoshi">
		                <input class="input__field input__field--hoshi" type="text" id="telefono" value="<?php echo $data['telefono']; ?>" />
		                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
		                </label>
              			</span>
            		</div>
            	</div>
            	<hr>
            	<div class="row">
            		<div class="col-md-4"><strong>Fax</strong><br>
            			
            			<span class="input input--hoshi">
		                <input class="input__field input__field--hoshi" type="text" id="fax" value="<?php echo $data['fax']; ?>" />
		                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
		                </label>
              			</span>
            		</div>
            		<div class="col-md-4"><strong>Nit</strong><br>
            			
            			<span class="input input--hoshi">
		                <input class="input__field input__field--hoshi" type="text" id="nit" value="<?php echo $data['nit']; ?>" />
		                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
		                </label>
              			</span>
            		</div>
            		<div class="col-md-4"><strong>Nomnbre Alcalde</strong><br>
            			
            			<span class="input input--hoshi">
		                <input class="input__field input__field--hoshi" type="text" id="nombre_alcalde" value="<?php echo $data['nombre_alcalde']; ?>" />
		                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
		                </label>
              			</span>
            		</div>
            	</div>
            	<hr>
            	<div class="row">
            		<div class="col-md-4"><strong>Nombre Secretario</strong><br>
            			
            			<span class="input input--hoshi">
		                <input class="input__field input__field--hoshi" type="text" id="nombre_secretario" value="<?php echo $data['nombre_secretario']; ?>" />
		                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
		                </label>
              			</span>
            		</div>
            		<div class="col-md-4"><strong>Jefe del registro familiar</strong><br>
            			
            			<span class="input input--hoshi">
		                <input class="input__field input__field--hoshi" type="text" id="jefe_registro_familiar" value="<?php echo $data['jefe_registro_familiar']; ?>" />
		                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
		                </label>
              			</span>
            		</div>
            		<div class="col-md-4"><strong>Logo</strong><br>
            		<img src="assets/images/logo/<?php echo $data['logo_empresa']; ?>" width="40%">
                    <br>

                    <div class="option-group">
                                  <span class="file-button btn-primary">Choose File</span>
                                  <input type="file" class="custom-file" name="avatar" id="avatar" onchange="document.getElementById('uploader').value = this.value;" required="" aria-required="true" aria-invalid="false" aria-describedby="avatar-error">
                                  <input type="text" class="form-control" id="uploader" placeholder="no file selected" readonly="">
                                </div>
            		
            		</div>
            	</div>
            </div>
        </div>
    </div>
</div>

