
<script>
$(document).ready(function(){

   $("a#enlance").click(function(){
        var id = $(this).attr("class");
        $(".includ").load("pages/partida_detalle.php?id="+id);
    })
});


</script>

<?php
include_once("../class_db/class_p_nacimiento.php");
include_once("includes.php");
$data = select(); 

?>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<table class="table table-hover table-dynamic filter-head">
<?php JsList(); ?>

                    <thead>
                      <tr>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Año</th>
                        <th>Mes</th>
                        <th>D</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                        while($row = mysql_fetch_array($data))
                        {
                            ?>
                             <tr>
                                <td><?php echo $row['nombre_reciennacido'];  ?></td>
                                <td><?php echo $row['apellido_recienacido'];  ?></td>
                                <td><?php echo $row['anio_nacimiento'];  ?></td>
                                <td><?php echo $row['mes_nacimiento'];  ?></td>
                                <td>
                                    <a id="enlance" class="<?php echo $row['id_pnacimiento']; ?>" href="#">
                                    Detalle
                                     </a>
                                </td>                                
                             </tr>
                            
                            <?php
                        }
                    ?>                      
                    </tbody>
    </table>