

<?php
session_start();
header('Content-Type: text/html; charset=UTF-8'); 

include_once("../class_db/class_p_genericas.php");
$data = selectTiposPartidas();



$pages = "partida_detalle";
$id_partida =  $_GET['id'];
$data = selectDetalle($id_partida);
$tipos = selectTiposPartidas();
$tipos2 = selectTiposPartidas();
$id_rol = $_SESSION['data'][11];
$nombre_rol = rol_usuario2($id_rol);

?>

<script>

function auto_grow(element) {
            element.style.height = "5px";
            element.style.height = (element.scrollHeight)+"px";
        }

  $(document).ready(function(){




      $("#guardar1").click(function(){  

      	var tipoPartida1 = $("#tipoPartida1").val();
        var tipo1  = $("#tipoPartida1").val();
        var numeroLibro1 = $("#numeroLibro1").val();
        var tipoDcoumento1 = $("#tipo1").val();
        var numeroFL1 = $("#numeroFL1").val();
        var nombre11 = $("#nombre11").val();
        var nombre21 = $("#nombre21").val();
        var fecha_general1 = $("#fecha_general1").val();
        var detalle1 = $("#detalle1").val();
        var id_partida1 = <?php echo $id_partida; ?>;
        var action1 = "UpdatePartidaGenerica";

        

        var data1 = {        
	        id_partida1:id_partida1,
	        tipoPartida1:tipoPartida1,
	        tipo1:tipo1,
	        numeroLibro1:numeroLibro1,
	        tipoDcoumento1:tipoDcoumento1,
	        numeroFL1:numeroFL1,
	        nombre11:nombre11,
	        nombre21:nombre21,
	        fecha_general1:fecha_general1,
	        detalle1:detalle1,
	        action:action1
        }
        UpdatePartidaGenerica(data1);       

      });

      function UpdatePartidaGenerica(data1)
      {   

        $.ajax({
            url: "class_db/forms.php",
            type:"post",
            data: data1,       
            
            success: function(){            	
            	$("#tab1_2").load("pages/lista_partidas_generales_detalle.php?id="+<?php echo $id_partida; ?>);
            },
            error:function(){
                alert("Error al Guardar la partida de Nacimiento");
            }
      });
    } 
    });
</script>



<style>
#logo1{
	width: 30%;
}
#titulo{
	text-align: center;
}
#titulo_center,#titulo2{
	text-align: center;

}
#partida{
	text-align: justify;
}
.fecha_marginacion{
	border:1px solid grey;
}
.area-border{
  border:1px solid grey;
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


<br>





	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-5">
		<b>Selecionar El Tipo de Partida a Generar</b><br>
		<select name="tipoPartida" id="tipoPartida1" class="form-control bg-primary">
		<?php
			while($row = mysql_fetch_array($tipos)){
				if($data['id_tipo']==$row['id_generar']){									
				?>
				<option value="<?php echo $row['id_generar']; ?>"><?php echo $row['partida_generada']; ?></option>
				<?php
				}
			}
			while($row = mysql_fetch_array($tipos2)){
				if($data['id_tipo']!=$row['id_generar']){									
				?>
				<option value="<?php echo $row['id_generar']; ?>"><?php echo $row['partida_generada']; ?></option>
				<?php
				}
			}
		?>
		</select>
		</div>
		<div class="col-md-5">
			<div class="form-group">   
			<b>Digite el Numero del Libro</b>                <br>
	        	<input type="text" class="form-control bg-primary" value="<?php echo $data['numero_libro']; ?>" name="numeroLibro1" id="numeroLibro1" placeholder="Numero Libro">                
	        </div>
		</div>
		<div class="col-md-1"></div>
	</div>

	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-5">
		<b>Selecionar Tipo</b><br>
		<div class="form-group">                   
	        <select class="form-control bg-primary" id="tipo1" data-style="white" data-placeholder="Select a country...">                            
				<?php
					if($data['pagina']=="pagina"){
						?>
							<option value="pagina">A Pagina</option>
	            			<option value="folio">A Folio</option>
						<?php
					}else{
						?>							
	            			<option value="folio">A Folio</option>
	            			<option value="pagina">A Pagina</option>
						<?php
					}
				?>	   			   
	        </select>
	        </div>
		</div>
		<div class="col-md-5">
			<div class="form-group">   
			<b>Digite el Numero de Folio o Numero</b>                <br>
	        	<input type="text" class="form-control bg-primary" value="<?php echo $data['numero_pagina']; ?>"   name="numeroFL1" id="numeroFL1" placeholder="Numero">                
	        </div>
		</div>
		<div class="col-md-1"></div>
	</div>

	<div class="row">
	<div class="col-md-1"></div>
	  <div class="col-md-5">
	    <span class="input input--hoshi">
	      <input class="input__field input__field--hoshi" type="text" value="<?php echo $data['nombre1']; ?>"   id="nombre11" required />
	        <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
	          <span class="input__label-content">Nombre</span>
	          </label>
	        </span>
	      </div>
	    <div class="col-md-5">
	      <span class="input input--hoshi">
	      <input class="input__field input__field--hoshi" type="text" value="<?php echo $data['nombre2']; ?>"   id="nombre21" required />
	        <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
	          <span class="input__label-content">Nombre</span>
	          </label>
	        </span>
	  </div>
	  <div class="col-md-1"></div>
	</div> 

	<div class="row">
	<div class="col-md-1"></div>
	  <div class="col-md-5">
	     <span class="input input--hoshi">
	                <input class="input__field input__field--hoshi" value="<?php echo $data['fecha']; ?>"   type="date" id="fecha_general1"  />
	                <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
	                  <span class="input__label-content">Fecha</span>
	                </label>
	              </span>
	      </div>
	    <div class="col-md-5">
	     
	  </div>
	  <div class="col-md-1"></div>
	</div> 

	<div class="row">
	  <div class="col-md-1"></div>
	  <div class="col-md-10">
	  Cuerpo de la partida
	    <textarea onkeyup="auto_grow(this)" class="form-control area-border" id="detalle1"><?php echo $data['detalle'];?></textarea>
	  </div>
	  <div class="col-md-1"></div>
	</div>

	<div class="row">
	  <div class="col-md-1"></div>
	  <div class="col-md-8">
	    
	  </div>
	  <div class="col-md-2">
	  <br>
	    <input type="button" id="guardar1" class="btn btn-primary" value="Guardar">
	  </div>
	  <div class="col-md-1"></div>
	</div>








