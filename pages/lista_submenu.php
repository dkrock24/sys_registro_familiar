
<script>
$(document).ready(function(){
        //var id = $(this).attr('id');       
       // $(".submenu").load("pages/lista_submenus.php?id="+id);             
            
	var id;
   	$(".iconoss").click(function(){   		
   		id = $(this).attr('id');  		   		
   		var accion = 'submenu';
   		var data = { id:id,accion:accion }     
   		infoMenu(data);
   	});

   	$('.iconos1').click(function(){
   		id = $(this).attr('id');  
   		var estado = $(this).attr('name');   		
   		var accion = 'activeSubMenu';   		
   		var data = { id:id,accion:accion,estado:estado }       		

   		activeSubMenu(data);
   	});

   	function activeSubMenu(data)
   {   		
   		$.ajax({
            url: "class_db/infoMenu.php",
            type:"post",
            data: data,
            dataType: 'json',
            cache: false,

            success: function(result){             	
            	//$(".includ").load("pages/lista_menus.php"); 
            	var id_menu = result[0];             	
            	$(".submenu").load("pages/lista_submenu.php?id="+id_menu);  
            },
            error:function(){
                //alert("Error.. No se subio la imagen");
            }
        });   
   }

   	$("#saveChangeSubmenu").click(function(){   
   		var nombre 	= $('#nombre2').val();
        var url 	= $('#url2').val();
        var icon 	= $('#icon2').val();
        var accion	= "saveChangeSubmenu";

        var data = {
        	nombre:nombre,
        	url:url,
        	icon:icon,
        	id:id,
        	accion:accion
        }
        saveChangeSubmenu(data,id);
   });

   	function saveChangeSubmenu(data)
   	{
   		
   		$.ajax({
            url: "class_db/infoMenu.php",
            type:"post",
            data: data,
            dataType: 'json',
            cache: false,

            success: function(result){ 

            	var id_menu = result[0];              	
            	$(".submenu").load("pages/lista_submenu.php?id="+id_menu); 
            	return false; 

            },
            error:function(){
                //alert("Error.. Submenu");
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
        		var titulo 	= result[1];
        		var url 	= result[2];
        		var nombre_menu = result['nombre_menu'];
        		var id_menu = result['id_menu'];

        		$("#icon2 option").each(function(){
        			//alert($(this).text());
        			if(nombre_menu == $(this).text())
        			{
        				//alert($(this).text());   
        				//$("#icon2 option[value='"+$(this).attr('value')+"']").remove();   
        				//$("select#icon2 option[value='"+$(this).attr('value')+"']").remove(); 
        				$("#icon2").find("option[value='"+$(this).attr('value')+"']").remove();  				
        				$('#icon2').prepend("<option value='"+id_menu+"' selected>"+nombre_menu+"</option>");        				
        				return false;
        			}
   					//alert('opcion '+$(this).text()+' valor '+ $(this).attr('value'))
				});
        		
        		$('#nombre2').val(titulo);
        		$('#url2').val(url);   
        		
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
$id = $_GET['id'];
$submenus = selectSubMenus($id);
$menuPadre = menuPadre($id);



?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<style>
	.menu2{
		
		border:0px solid black;
		padding: 10px;
		margin-bottom: 2px;
	}
	.iconoss{
		display: inline-block;
		float: right;
		margin-left: 10px;
	}
	.submenu_titulo{
		padding: 0px;
		margin-bottom: 2px;
		height: 10px;
	}

</style>
<table>

<tr>
	<div class="row line menu bg-dark">
		<div class="col-md-12">
		<?php
			while($menu = mysql_fetch_array($menuPadre))
			{
				echo $menu['nombre_menu'];
			}
		?>
	    </div>
	</div>
</tr>

<?php
while ($row = mysql_fetch_array($submenus)) {
	?>
	<tr>	
		<div class="row line">
	    	 <div class="col-md-9">
	    	 	<div class="menu2" id='<?php echo $row['id_submenu']; ?>'>
					
					<?php echo $row['nombre_submenu']; ?>
				</div>
	    	 </div>
	    	 <div class="col-md-3 opciones">
	    	 	<div class='opciones'>	    	 		
	    	 		<i class="fa fa-edit fa-5 iconoss" data-toggle="modal" data-target="#colored-header2" id='<?php echo $row['id_submenu']; ?>'>	    	 			
	    	 		</i>
	    	 		<?php 
	    	 			if($row['estado_submen']==1)
	    	 			{
	    	 				?><i class="fa fa-dot-circle-o iconos1" id='<?php echo $row['id_submenu']; ?>' name='<?php echo $row["estado_submen"] ?>'></i><?php
	    	 			}
	    	 			else
	    	 			{
	    	 				?><i class="fa fa-circle-o iconos1" id='<?php echo $row['id_submenu']; ?>' name='<?php echo $row["estado_submen"] ?>'></i><?php
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




