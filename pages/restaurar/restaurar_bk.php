

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

<script>
$(document).ready(function(){
 

  $("a.rest").click(function(){    
    var url = $(this).attr("id");    
    alert(url);

    $(".includ").load("pages/restaurar/restor_file.php?id="+url);
  });
});


</script>

<?php
include_once("../../class_db/class_bk_list.php");
$data = lista_bk(); 

?>

<ul class="nav nav-tabs">
  <li id="menu_li" class="active"><a href="#tab1_1" data-toggle="tab">Restaurar BK</a></li>
  
  
</ul>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<div class="tab-content">

      <div class="row">
          <table class="table table-hover table-dynamic filter-head">
                    <thead>
                      <tr>
                        <th>Nombres Bk</th>
                        <th>Fecha</th>
                        <th>Link</th>                       
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                        while($row = mysql_fetch_array($data))
                        {
                            ?>
                             <tr>
                                <td><?php echo $row['nombre_bk'];  ?></td>
                                <td><?php echo $row['fecha_bk'];  ?></td>
                                <td>
                                <a href="#" id='<?php echo $row['link_bk'];  ?>' class="btn btn-default rest">Restaurar</a>
                                </td>                                
                             </tr>
                            
                            <?php
                        }
                    ?>                      
                    </tbody>
    </table>               

      </div>


        <div class='includ'>
          
        </div>

</div>

