<?php
  include_once("consultas/consultas.php");
  $data = divorcio();

?>

<script src="assets/plugins/jquery/jquery-1.11.1.min.js"></script>


    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1.1", {packages:["bar"]});
      google.setOnLoadCallback(drawStuff);

      function mes(mes)
      {
        var nombre
        switch(mes){
          case 1 : nombre = "Enero";break;
          case 2 : nombre = "Febrero";break;
          case 3 : nombre = "Marzo";break;
          case 4 : nombre = "Abril";break;
          case 5 : nombre = "Mayo";break;
          case 6 : nombre = "Junio";break;
          case 7 : nombre = "Julio";break;
          case 8 : nombre = "Agosto";break;
          case 9 : nombre = "Septiembre";break;
          case 10 : nombre = "Octubre";break;
          case 11 : nombre = "Noviembre";break;
          case 12 : nombre = "Diciembre";break;
        }
        return nombre;
      }

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Move', 'Cantidad'],
          <?php
            while($row = mysql_fetch_array($data))
            {
              ?>
              
              [mes(<?php echo $row['fecha']; ?>), <?php echo $row['total']; ?>],
              <?php
            }
          ?>
        ]);

        var options = {
          title: 'Partidas de Divorcio',
          width: 400,
          legend: { position: 'none' },
          chart: { subtitle: 'Ultimos Meses' },
          axes: {
            x: {
              0: { side: 'top', label: 'White to move'} // Top x-axis.
            }
          },
          bar: { groupWidth: "80%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        // Convert the Classic options to Material options.
        chart.draw(data, google.charts.Bar.convertOptions(options));
      };
    </script>

    <div id="top_x_div" style="width: 300px; height: 300px;"></div>
