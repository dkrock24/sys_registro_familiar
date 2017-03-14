
<style type="text/css">
    #grafica{
        border:0px solid;
    }
    .color-icon{
        color:#319db5;
    }
</style>

<ul class="nav nav-tabs">

  <li id="menu_li" class="active"><a href="#tab1_1" data-toggle="tab">
  <i class="fa fa-pie-chart color-icon"></i>Estadisticas</a></li>
</ul>
<form method="post" action="">
    <div class="tab-content">
        <div class="tab-pane fade active in" id="tab1_1">
            <div class="row">
                <div class="col-md-6">
                <iframe src="pages/graficas/grafica_pnacimiento.php" width="100%" height="50%" id="grafica"></iframe>
                </div>
                <div class="col-md-6">
                <iframe src="pages/graficas/grafica_pmatrimonio.php" width="100%" height="50%" id="grafica"></iframe>
                </div>
            </div>
             <div class="row">
                <div class="col-md-6">
                <iframe src="pages/graficas/grafica_pdivorcio.php" width="100%" height="50%" id="grafica"></iframe>
                </div>
                <div class="col-md-6">
                <iframe src="pages/graficas/grafica_pdivorcio.php" width="100%" height="50%" id="grafica"></iframe>
                </div>
            </div>
        </div>
    </div>
</form>


