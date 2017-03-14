<?php
session_start();
//@print_r( $_SESSION );
//echo $_SESSION['data'][0];
header('Content-Type: text/html; charset=UTF-8');
include_once("../class_db/dataQuerysDigital.php");
$pages = "partida_detalle";
$id_partida =  $_GET['id'];
$dataQuery = selectDetalleDG($id_partida);
$dataMarginacion =  selectAllarginacionDG($id_partida);
$logo = logo($pages);
$empresa = empresa();
$t_pnacimiento = template_pnacimiento(1);
$cargoDinamico = selecCargo($_SESSION['data'][0]);


?>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "#total",
		element : "total",
		theme : "advanced",
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft,visualblocks",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>
<!--<script>
tinymce.init({ selector: "#editData" });
</script>-->
<script>

	$("#imprime").click(function (){
		$("#partida").printArea();
	})

	function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data)
    {
        var mywindow = window.open('', 'Partida', 'height=400,width=800');
        mywindow.document.write('<html><head><title></title>');
        /*optional stylesheet*/ //mywindow.document.write('<link rel="stylesheet" href="main.css" type="text/css" />');
        //mywindow.document.write('<link rel="stylesheet" href="../assets/plugins/bootbox/bootbox.min.js" type="text/css" />');
        mywindow.document.write('<style type="text/css">.logos_header { width:30%; } .logos_escudo{width:40%; float:right;}         		#titulo2{display: inline-block; position:relative; border:0px solid black; width:40%; text-align:center;}        		#titulo{display: inline-block; position:relative; border:0px solid black; width:25%; text-align:center;}        		#titulo_center{text-align:center;}        		#partida{text-align:justify;}        		</style>');
        mywindow.document.write('</head><body>');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10

        mywindow.print();
        mywindow.close();

        return true;
    }

    $(document).ready(function(){

        $("#modificar").click(function()
        {

        	document.getElementById('editData').contentEditable = true;
        	$("#editData").css( "background-color", "rgba(24, 27, 27, 0.18)" );
        	$("#Saveupdate").show();
        	$("#modificar").hide();
        	$("#cancelarmodificacion").show();

        });

				$("#cargo-edit").click(function()
				{

					document.getElementById('cargo-edit').contentEditable = true;
					//$("#cargo-edit").css( "background-color", "rgba(24, 27, 27, 0.18)" );
				});

         $("#cancelarmodificacion").click(function()
        {

        	document.getElementById('editData').contentEditable = false;
        	$("#editData").css( "background-color", "#fff" );
        	$("#Saveupdate").hide();
        	$("#modificar").show();
        	$("#cancelarmodificacion").hide();

        });

         $("#marginar_partida").on("click",function()
        {

        	   var body = $('html,body');
	        	body.animate({
				    scrollTop:$("#dato-marginacion").offset().top
				}, 800);
	        	$("#dato-marginacion").show();
	        	$("#cancelarmarginacion").show();
	        	$("#marginar_partida").hide();

        });

        $("#cancelarmarginacion").click(function()
        {

        	$("#marginar_partida").show();
        	$("#dato-marginacion").hide();
        	$("#cancelarmarginacion").hide();

        });

        $("#saveMarginacion").click(function()
        {

        	var textMarginacion = tinymce.get('textmarginacion').getContent();
        	var iduser = $("#iduser").val();
        	var idActa = $("#idacta").val();
        	//alert(textMarginacion+"/"+iduser+"/"+idActa);
        	$.ajax
			    ({
			        type: "POST",
			        url: "pages/ejecutarscript.php",
			        data: {idActa:idActa,iduser:iduser,textMarginacion:textMarginacion,action:'insertMarginacion'},
			        success: function(data)
			        {

        				$("#msgMargin").html("Guardado Correctamente");
        				$("#msgMargin").fadeIn(2000);
                		$("#msgMargin").fadeOut(1000);
			            $("#dato-marginacion").hide();
	        			$("#cancelarmarginacion").hide();
	        			$("#marginar_partida").show();
	        			$(".includ").load("pages/partida_detalle_digital.php?id=<?php echo $id_partida; ?>");
			        }
			    });


        });

         $("#Saveupdate").click(function()
        {
       		var textActa = $("#editData").html();
       		var idActa = $("#idacta").val();
       		userModifico = $("#iduser").val();
        	$.ajax
			    ({
			        type: "POST",
			        url: "pages/ejecutarscript.php",
			        data: {idActa:idActa, userModifico:userModifico, textActa:textActa,action:'updatePartida'},
			        success: function(data)
			        {

			            document.getElementById('editData').contentEditable = false;
        				$("#Saveupdate").hide();
        				$("#cancelarmodificacion").hide();
        				$("#modificar").show();
        				$("#editData").css( "background-color", "#fff" );
			            $("#msgajax").html("Guardado Correctamente");
			            $("#msgajax").show();
                		$("#msgajax").fadeOut(2000);
			        }
			    });
        });

    });

</script>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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
</style>

<div class="row">
	<div class="col-md-4" id=""></div>
	<div class="col-md-8" id="options">

		<a href="#" id="modificar" class="btn btn-primary">Modificar</a>
		<a href="#" id="cancelarmodificacion" class="btn btn-primary" style="display:none;">Cancelar Modificacion</a>

		<!-- <a href="#" id="marginar_partida" class="btn btn-primary">Marginar</a>
		<a href="#" id="cancelarmarginacion" class="btn btn-primary" style="display:none;">Cancelar Marginacion</a>
		-->
		<a href="javascript:void(0)" class="btn btn-primary" onclick="PrintElem('#total')" id="imprime">Imprimir</a>

	</div>
</div>
<br>
<div>

<div id="total" >
<div class="row" id="cabecera">
	<div class="col-md-4" id="titulo">
		<span>
			<img src="<?php echo $logo['logo'][0]; ?>" class="logos_header" width="30%">
		</span>
	</div>
	<div class="col-md-4" id="titulo2">
		<strong><?php echo $empresa['nombre_empresa']; ?></strong><br>
		<strong><?php echo $empresa['municipio']; ?></strong><br>
		<strong><?php echo $empresa['departamento']; ?></strong><br>
		Tel. <strong><?php echo $empresa['telefono']; ?> Fax. <?php echo $empresa['fax']; ?></strong><br>
		NIT. <strong><?php echo $empresa['nit']; ?></strong>
	</div>
	<div class="col-md-4 " id="titulo">
		<img src="<?php echo $logo['logo'][1]; ?>" class="logos_escudo" width='30%'>
	</div>
</div>


<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10">
	<hr>
	</div>
	<div class="col-md-1"></div>
</div>
<br>
<div id="editData" contentEditable="false" class="row" style="text-align: justify; padding-left: 25px;padding-right: 25px; line-height: 2;font-size: 12px;">
<?php
	echo str_replace("EMBED PBrush", "", $dataQuery['texto_partida'])."<br><br>";
	while($dataMargi = mysql_fetch_array($dataMarginacion))
    {
    	echo $dataMargi['text_marginacion'];
    }

?>

</div>

<br>
<div style="display:none;" id="Saveupdate" class="btn btn-primary">Guardar Modificacion</div>
<div id="msgajax" class="alert alert-success" role="alert" style="display:none;text-align: center;color: #000;"></div>

<div class="col-md-12">
<div id="dato-marginacion" style="display:none;">
	<div class="row">
		<center>
		<div class="col-md-12" id="marginaciones">
			<textarea id="textmarginacion" class="textomar" name="elm1" rows="15" cols="50" style="width: 96%" ></textarea>
			<input type="hidden" value="<?php echo $dataQuery['id_partida']; ?>" name="idacta" id="idacta">
			<input type="hidden" value="<?php echo $_SESSION['data'][0]; ?>" name="iduser" id="iduser">
		</div>
		</center>
		<br>
		<br>
		<input style="margin-left: 20px;margin-top: 40px;" type="button" id="saveMarginacion" class="btn btn-primary" value="Guardar Marginacion">
	</div>
</div>
</div>
<br>
<div id="cargo-edit">
<?php
echo "<center>".$_SESSION['data'][5]." ".$_SESSION['data'][6]." ".$_SESSION['data'][7]." ".$_SESSION['data'][8]."</center>";
echo "<center>".$cargoDinamico['name']."</center>";
?>
</div>
</div>
<div id="msgMargin" class="alert alert-success" role="alert" style="    text-align: center;
    font-weight: bold;display:none;"></div>
