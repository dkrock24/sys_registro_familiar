
<script>
$(document).ready(function(){

   $("a#enlance").click(function(){
        var id = $(this).attr("class");
        $(".includ").load("pages/acta_m_detalle.php?id="+id);
    })
});


</script>

<?php
include_once("../class_db/class_a_matrimonio.php");
$data = select(); 

?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<table class="table table-hover table-dynamic filter-head">

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
    <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script> <!-- Tables Filtering, Sorting & Editing -->
    <script src="assets/js/pages/table_dynamic.js"></script>
    <link href="assets/plugins/input-text/style.min.css" rel="stylesheet">
                    <thead>
                      <tr>
                        <th>Esposo</th>
                        <th>Esposa</th>
                        <th>Tipo</th>
                        <th>D</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                        while($row = mysql_fetch_array($data))
                        {
                            ?>
                             <tr>
                                <td><?php echo $row['nombre1'];  ?></td>
                                <td><?php echo $row['nombre2'];  ?></td>
                                <td><?php echo $row['nombre_tipo'];  ?></td>
                                <td>
                                    <a id="enlance" class="<?php echo $row['id_acta']; ?>" href="#">
                                    Detalle
                                     </a>
                                </td>                                
                             </tr>
                            
                            <?php
                        }
                    ?>                      
                    </tbody>
    </table>