




<script>
$(document).ready(function(){

   $("a#enlance").click(function(){
        var id = $(this).attr("class");
        $(".includ").load("pages/partida_defuncion_detalle.php?id="+id);
    })
});


</script>

<?php
include_once("../class_db/class_p_defuncion.php");
$data = select(); 
include_once("includes.php");
?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<table class="table table-hover table-dynamic filter-head">
<?php JsList(); ?>
                    <thead>
                      <tr>
                        <th>Nombre</th>                        
                        <th>Fecha</th>   
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
                                <td><?php echo $row['fecha'];  ?></td>
                                <td>
                                    <a id="enlance" class="<?php echo $row['id_partida']; ?>" href="#">
                                    Detalle
                                     </a>
                                </td>                                
                             </tr>
                            
                            <?php
                        }
                    ?>                      
                    </tbody>
    </table>