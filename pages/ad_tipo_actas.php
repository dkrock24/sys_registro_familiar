<?php
include_once "../class_db/class.php"; 
$consultar=new Sql();
echo "<select name='ad_actas' id='ad_actas' class='form-control'>";
echo "<option value='0'>---Seleccione---</option>";   
 $sql = "Select tpd.id_tipo, tpd.nombre  from sr_tipo_partida_digital tpd where tpd.estado = 1";
 $consultar->consulta($sql);
  for($i=0;$i<($consultar->num_resultados); $i++)
 	 {
         $fila=mysql_fetch_array($consultar->resultados);  
         echo"<option value='".$fila['id_tipo']."'>".utf8_decode($fila['nombre'])."</option>";
      }
echo "</select>";
?> 