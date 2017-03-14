

<?php
session_start();

include_once("../class_db/class_p_nacimiento.php");

$data = selectTiposPartidas();

?>

<script>

function auto_grow(element) {
            element.style.height = "5px";
            element.style.height = (element.scrollHeight)+"px";
        }

  $(document).ready(function(){

  	$("li#menu_li").click(function(){
        var texto = $(this).text();        
            if(texto=="Buscar")        
            {                 
                $(".includ").load("pages/lista_partidas_generales.php");             
            }
            if(texto=="Manual")        
            {                 
                $(".manual").load("pages/manual_p_defuncion.php");             
            }
  });


      $("#guardar").click(function(){
      	var usuario = <?php echo $_SESSION['data'][0];?>;
      	var tipoPartida = $("#tipoPartida").val();
        var tipo  = $("#tipoPartida").val();
        var numeroLibro = $("#numeroLibro").val();
        var tipoDcoumento = $("#tipo").val();
        var numeroFL = $("#numeroFL").val();
        var nombre1 = $("#nombre1").val();
        var nombre2 = $("#nombre2").val();
        var fecha_general = $("#fecha_general").val();
        var detalle = $("#detalle").val();
        var action = "InsertPartidaGenerica";

        var data = {
        usuario:usuario,
        tipoPartida:tipoPartida,
        tipo:tipo,
        numeroLibro:numeroLibro,
        tipoDcoumento:tipoDcoumento,
        numeroFL:numeroFL,
        nombre1:nombre1,
        nombre2:nombre2,
        fecha_general:fecha_general,
        detalle:detalle,
        action:action
        }
        insertPartida(data);

      });

      function insertPartida(data)
      {    
        $.ajax({
            url: "class_db/forms.php",
            type:"post",
            data: data,   
            dataType: 'json',
            cache: false,      
            
            success: function(result){
            	var id = result[0];            	
            	$(".A").removeClass("active");
            	$(".B").addClass("active");
            	$("#tab1_1").removeClass("active");            
            	$("#tab1_2").addClass("active in");
            	$("#tab1_2").load("pages/lista_partidas_generales_detalle.php?id="+id);
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

<ul class="nav nav-tabs">
  <li id="menu_li" class="A active"><a href="#tab1_1" data-toggle="tab"><i class="fa fa-plus-circle color-icon"></i>Nueva</a></li>
  <li id="menu_li" class="B "><a href="#tab1_2" data-toggle="tab"><i class="fa fa-search color-icon"></i>Buscar</a></li>
  <li id="menu_li" class="C "><a href="#tab1_3" data-toggle="tab"><i class="fa fa-file color-icon"></i>Manual</a></li>
</ul>
<div class="tab-content">

<div class="tab-pane fade active in" id="tab1_1">
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-5">
		<b>Selecionar El Tipo de Partida a Generar</b><br>
		<select name="tipoPartida" id="tipoPartida" class="form-control bg-primary">
		<?php
			while($row = mysql_fetch_array($data)){
				?>
				<option value="<?php echo $row['id_generar']; ?>"><?php echo $row['partida_generada']; ?></option>
				<?php
			}
		?>
		</select>
		</div>
		<div class="col-md-5">
			<div class="form-group">   
			<b>Digite el Año</b>                <br>
	        	<input type="text" class="form-control bg-primary" name="numeroLibro" id="numeroLibro" placeholder="Numero Libro">                
	        </div>
		</div>
		<div class="col-md-1"></div>
	</div>

	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-5">
		<b>Selecionar Tipo</b><br>
		<div class="form-group">                   
	        <select class="form-control bg-primary" id="tipo" data-style="white" data-placeholder="Select a country...">                            
	            <option value="pagina">A Pagina</option>
	            <option value="folio">A Folio</option>
	        </select>
	        </div>
		</div>
		<div class="col-md-5">
			<div class="form-group">   
			<b>Digite el Numero de Folio o Pagina</b>                <br>
	        	<input type="text" class="form-control bg-primary" name="numeroFL" id="numeroFL" placeholder="Numero">                
	        </div>
		</div>
		<div class="col-md-1"></div>
	</div>

	<div class="row">
	<div class="col-md-1"></div>
	  <div class="col-md-5">
	    <span class="input input--hoshi">
	      <input class="input__field input__field--hoshi" type="text" id="nombre1" required />
	        <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
	          <span class="input__label-content">Nombre</span>
	          </label>
	        </span>
	      </div>
	    <div class="col-md-5">
	      <span class="input input--hoshi">
	      <input class="input__field input__field--hoshi" type="text" id="nombre2" required />
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
	                <input class="input__field input__field--hoshi" type="date" id="fecha_general"  />
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
	    <textarea onkeyup="auto_grow(this)" class="form-control area-border" id="detalle"></textarea>
	  </div>
	  <div class="col-md-1"></div>
	</div>

	<div class="row">
	  <div class="col-md-1"></div>
	  <div class="col-md-8">
	    
	  </div>
	  <div class="col-md-2">
	  <br>
	    <input type="button" id="guardar" class="btn btn-primary" value="Guardar">
	  </div>
	  <div class="col-md-1"></div>
	</div>
</div>

<div class="tab-pane includ fade " id="tab1_2">
</div>

<div class="tab-pane fade manual" id="tab1_3">   
</div>

</div>




