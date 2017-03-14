

 <!-- END PRELOADER -->

    <!-- BEGIN PAGE SCRIPT -->
    


<!--    <script src="assets/js/pages/form_icheck.js"></script> -->
    <!-- END PAGE STYLE -->

<script>
$(document).ready(function(){

   $("a#enlance").click(function(){
        
        var id = $(this).attr("class");
        $(".includ").load("pages/partida_divorcio_detalle.php?id="+id);
    })
});


</script>

<?php
include_once("../class_db/class_p_divorcio.php");
$data = select(); 
include_once("includes.php");
?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<table class="table table-hover table-dynamic filter-head">
<?php JsList(); ?>
                    <thead>
                      <tr>
                        <th>Hombre</th>
                        <th>Mujer</th>
                        
                        <th>Año</th>
                        <th>D</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                        while($row = mysql_fetch_array($data))
                        {
                            ?>
                             <tr>
                                <td><?php echo $row['hombre'];  ?></td>
                                <td><?php echo $row['mujer'];  ?></td>                                
                                <td><?php echo $row['anio_libro'];  ?></td>
                                <td>
                                    <a id="enlance" class="<?php echo $row['id_partida']; ?>" href="#">Detalle</a>
                                </td>                                
                             </tr>
                            
                            <?php
                        }
                    ?>                      
                    </tbody>
    </table>