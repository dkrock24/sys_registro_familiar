
<?php
include_once("../class_db/dataQuerysDigital.php");
$data = selectCDG(); 

?>
<table class="table table-hover table-dynamic " style="margin-top: 12px;">
                    <thead>
                      <tr>
                        <th>Nombres</th>
                        <th>Descripción</th>
                        <th>Estado</th>
                      
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                        while($row = mysql_fetch_array($data))
                        {
                            $estado = ($row['estado']==1) ? "Activo" : "Inactivo" ;
                            ?>

                             <tr>
                                <td><?php echo $row['nombre'];  ?></td>
                                <td><?php echo $row['descripcion'];  ?></td>
                                <td><?php echo $estado;  ?></td>
                                                              
                             </tr>
                            
                            <?php
                        }
                    ?>                      
                    </tbody>
    </table>