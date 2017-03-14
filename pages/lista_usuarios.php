

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
include_once("../class_db/class_usuarios.php");
$data = usuarios(); 

?>

<script>
$(document).ready(function(){

   $("a#enlance").click(function(){
        var id = $(this).attr("class");
        $(".includ").load("pages/usuario_detalle.php?id="+id);
    });

   $("a#borrar").click(function(){
        var id = $(this).attr("class");
        var accion = "deleteUsuario";
        var data = {
            id:id,
            accion:accion
        }
        deleteUser(data);
    })
});

function deleteUser(data){
    $.ajax({
        url: "class_db/saveUsuario.php",
        type:"post",
        data: data,
        
        success: function(){
            $(".includ").load("pages/lista_usuarios.php"); 
        },
        error:function(){
            alert("failure");
        }
    });
}

</script>


<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<table class="table table-hover table-dynamic filter-head">
                    <thead>
                      <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Usuario</th>                        
                        
                        <th>Rol</th>
                        <th>Estado</th>
                        <th>D</th>
                        <th>D</th>

                      </tr>
                    </thead>
                    <tbody>
                    <?php
                        while($row = mysql_fetch_array($data))
                        {
                            ?>
                             <tr>
                                <td><?php echo $row['primer_nombre'];  ?></td>
                                <td><?php echo $row['primer_apellido'];  ?></td>
                                <td><?php echo $row['usuario'];  ?></td>                                
                                
                                <td><?php echo $row['nombre_cargo'];  ?></td>
                                <td><?php echo $row['id_estado'];  ?></td>
                                <td>

                                    <a id="enlance" class="<?php echo $row['id_usuario']; ?>" href="#">
                                    <button type="button" class="btn btn-dark btn-transparent">Ver</button>
                                     </a>
                                     
                                </td>  
                                <td>
                                    <a id="borrar" class="<?php echo $row['id_usuario']; ?>" href="#">
                                    <button type="button" class="btn btn-dark btn-transparent">Borrar</button>
                                     </a>
                                </td>

                            
                             </tr>
                            
                            <?php
                        }
                    ?>                      
                    </tbody>
    </table>