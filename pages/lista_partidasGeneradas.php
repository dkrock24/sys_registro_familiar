
<script>
$(document).ready(function(){
	var id;

   $("div.menu").click(function(){
        var id = $(this).attr('id');               
		
        $(".submenu").load("pages/lista_submenu.php?id="+id);    

    });

   $(".iconos").click(function(){   		
   		id = $(this).attr('id');  		
   		
   		var accion = 'dataPartidaGenerar';
   		var data = { id:id,accion:accion }     
   		infoMenu(data)    ;
   });

   	$('.buton-circle').click(function(){
   		id = $(this).attr('id');  
   		var estado = $(this).attr('name');   		
   		var accion = 'activePartidas';
   		
   		var data = { id:id,accion:accion,estado:estado }     
   		activePartidas(data);
   	});

   $("div.menu").click(function(){
   		$(this).css('background','grey'); 
   		$(this).css('color','white'); 

   		$(this).mouseleave(function(){
   		   			$(this).css('background','none'); 
   		   			$(this).css('color','black'); 
   		});
   });

   $("#saveChange").click(function(){   		
   		var nombre 	= $('#nombre').val();
        var accion	= "savePartidaGenerada";

        var data = {
        	nombre:nombre,
        	id:id,
        	accion:accion
        }
        saveMenu(data);
   });

   function activePartidas(data)
   {
   		$.ajax({
            url: "class_db/infoMenu.php",
            type:"post",
            data: data,

            success: function(){     
            	$(".includ").load("pages/lista_partidasGeneradas.php");  
            },
            error:function(){
                //alert("Error.. No se subio la imagen");
            }
        });   
   }

   function saveMenu(data)
   {
   		$.ajax({
            url: "class_db/infoMenu.php",
            type:"post",
            data: data,

            success: function(){     
            	$(".includ").load("pages/lista_partidasGeneradas.php");  
            },
            error:function(){
                //alert("Error.. No se subio la imagen");
            }
        });   		
   }

   function infoMenu(data)
   {
   		$.ajax({
            url: "class_db/infoMenu.php",
            type:"post",
            data: data,
            dataType: 'json',
            cache: false,

            success: function(result){      

        		//alert(result[1]);
        		//$('.modal-body').text(result[1]); 
        		var titulo 	= result[1];
        		var url 	= result[2];
        		var icon 	= result[3];
        		
        		$('#nombre').val(titulo);
        		
                //alert(data["nombre_menu"]);
                //$(".perfil").load("pages/avatar.php");
            },
            error:function(){
                //alert("Error.. No se subio la imagen");
            }
        });   		
   }
});


</script>

<?php
 session_start();
 include_once("../class_db/class_menus.php");

 $partidas = selectPartidasGeneradas();


?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<style>
	.menu{
		
		border:0px solid black;
		padding: 10px;
		margin-bottom: 2px;
	}

	.opciones{

		border:0px solid black;
		float: right;
		padding: 5px;
		display: inline-block;

	}
	.iconos{
		display: inline-block;
		float: right;
		margin-left: 10px;
	}

	.fa{
		font-size: 20px;
	}
	.line:hover{
		background: grey;
		color: white;
		cursor: pointer;
	}

	.titulos{
		text-align: right;
	}
	.tab{
		padding: 5px;
	}

</style>
<table>

<tr>
	<div class="row line menu bg-dark">
		<div class="col-md-12 ">
			Menus
	    </div>
	</div>
</tr>

<?php
while ($row = mysql_fetch_array($partidas)) {
	?>
	<tr>
	 <div class="row line">
	    	 <div class="col-md-9">
	    	 	<div class="menu" id='<?php echo $row['id_generar']; ?>'>
					<?php echo $row['partida_generada']; ?>
				</div>
	    	 </div>
	    	 <div class="col-md-3 opciones">
	    	 	<div class='opciones'>	    	 		
	    	 		<i class="fa fa-edit fa-5 iconos" data-toggle="modal" data-target="#colored-header" id='<?php echo $row['id_generar']; ?>'>	    	 			
	    	 		</i>
	    	 		<?php 
	    	 			if($row['estado']==1)
	    	 			{	    	 				
	    	 				?>	    	 				
	    	 				<i class="fa fa-dot-circle-o buton-circle" id='<?php echo $row['id_generar']; ?>' name='<?php echo $row["estado"] ?>' >
	    	 				</i>
	    	 				<?php
	    	 			}
	    	 			else
	    	 			{
	    	 				?>	    	 				
	    	 				<i class="fa fa-circle-o buton-circle" id='<?php echo $row['id_generar']; ?>' name='<?php echo $row["estado"] ?>'>
	    	 				</i>
	    	 				<?php
	    	 			}	    	 		
	    	 		 ?>    	 		
	    	 			    	 		
	    	 	</div>
	    	 </div>
	 </div>
		
	</tr>
	
	<?php
}
?>
	
</table>

          <!-- BEGIN MODALS -->
          <div class="modal fade" id="colored-header" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header bg-primary">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
                  <h4 class="modal-title"><strong>Editar</strong> Menus Principales</h4>
                </div>
                <div class="modal-body">
                	<div class="row tab">
                		<div class="col-md-4 titulos">
                			<span>Nombre</span>	                			
                		</div>
                		<div class="col-md-8">
                			<input type="text" id="nombre" name="nombre">
                		</div>
                	</div>
                	
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default btn-embossed" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary btn-embossed" id='saveChange' data-dismiss="modal">Save changes</button>
                </div>
              </div>
            </div>
          </div>
          <!-- END MODALS -->

          <!-- BEGIN MODALS -->
          <div class="modal fade" id="colored-header2" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header bg-primary">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="icons-office-52"></i></button>
                  <h4 class="modal-title"><strong>Editar</strong> Menus Principales2</h4>
                </div>
                <div class="modal-body">
                	<div class="row tab">
                		<div class="col-md-4 titulos">
                			<span>Nombre SubMenu</span>	                			
                		</div>
                		<div class="col-md-8">
                			<input type="text" id="nombre2" name="nombre2">
                		</div>
                	</div>
                	<div class="row tab">
                		<div class="col-md-4 titulos">
                			<span>URL SubMenu</span>	                			
                		</div>
                		<div class="col-md-8">
                			<input type="text" id="url2" name="url2">
                		</div>
                	</div>
                	<div class="row tab">
                		<div class="col-md-4 titulos">
                			<span>Menu Padre</span>	                			
                		</div>
                		<div class="col-md-8">                			
                			<select name='menuPrincipal' id='icon2'>
                				<?php
                				while ($row = mysql_fetch_array($menusPadres)) {
                					?>
                					<option value='<?php echo $row['id_menu']; ?>'><?php echo $row['nombre_menu']; ?></option>
                					<?php    
                				}
                				?>
                			</select>
                		</div>
                	</div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default btn-embossed" id='cancelar' data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary btn-embossed" id='saveChangeSubmenu' data-dismiss="modal">Save changes</button>
                </div>
              </div>
            </div>
          </div>
          <!-- END MODALS -->



