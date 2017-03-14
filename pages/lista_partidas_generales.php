




<script>
$(document).ready(function(){

   $("a#enlance").click(function(){
        var id = $(this).attr("class");
        $(".includ").load("pages/lista_partidas_generales_detalle.php?id="+id);
    })
});


</script>

<?php
include_once("../class_db/class_p_genericas.php");
$data = select(); 
include_once("includes.php");
?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<table class="table table-hover table-dynamic filter-head">
<?php JsList(); ?>
                    <thead>
                      <tr>
                        <th>Nombre1</th>
                        <th>Nombre2</th>                        
                        <th>Fecha</th>   
                        <th>Partida</th>
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
                                <td><?php echo $row['fecha'];  ?></td>
                                <td><?php echo $row['partida_generada'];  ?></td>
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