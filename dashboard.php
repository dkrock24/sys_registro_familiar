<script src="assets/js/tiny_mce/tiny_mce.js"></script>
<script src="assets/plugins/jquery/jquery-1.11.1.min.js"></script>

<script src="assets/plugins/jquery/jquery-migrate-1.2.1.min.js"></script>
<script src="assets/plugins/jquery-ui/jquery-ui-1.11.2.min.js"></script>
<link href="assets/plugins/input-text/style.min.css" rel="stylesheet">








<?php
session_start();
include_once('validation/conexion.php');
include_once("class_db/cargar_recursos.php");


$location = "dashboard";
$parte    = "header";
$lib      = laodLib($location,$parte);  
login();




//$query = "select * from sr_menu where id_rol_menu='".$_SESSION['data'][11]."'";
$query = "select M.id_menu,M.class_menu, M.nombre_menu,M.icon_menu,M.icon_menu, M.id_menu,M.estado_menu, R.nombre_rol,R.id_rol,A.id_rol,A.id_menu,A.estado from  sr_menu as M  
left join sr_accesos as A
on M.id_menu = A.id_menu
left join sr_roles as R
on R.id_rol = A.id_rol
where R.id_rol='".$_SESSION['data'][11]."' and A.estado=1";
$statement = mysql_query($query)or die(mysql_error()."Error en la generacon del menu");

if(!isset($_SESSION['data'])){
  if(isset($_SESSION['usuario']))
  {
    header('Location: '.'user-lockscreen.php');
  }
  header('Location: '.'login.php');
}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="admin-themes-lab">
    <meta name="author" content="themes-lab">
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/png">
    <title>Sistema Registro Familiar</title>
    <script src="assets/plugins/jquery/jquery-1.11.1.min.js"></script>
    <?php
      foreach ($lib as $value) {
      ?>
      <script src="<?php echo $value; ?>"></script>      
      <?php
    }
    ?>
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/theme.css" rel="stylesheet">
    <link href="assets/css/ui.css" rel="stylesheet">
    <!-- BEGIN PAGE STYLE -->
    <link href="assets/plugins/metrojs/metrojs.min.css" rel="stylesheet">
    <link href="assets/plugins/maps-amcharts/ammap/ammap.min.css" rel="stylesheet">
    <!-- END PAGE STYLE -->
    <script src="assets/plugins/modernizr/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
    <style>
          .nav-sidebar, .sidebar-inner{
            font-family: Arial;
          }
    </style>

  </head>

  <body class="fixed-topbar fixed-sidebar theme-sdtl color-default">

    <!--[if lt IE 7]>
    <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <section>
      <!-- BEGIN SIDEBAR -->
      <div class="sidebar">
        <div class="logopanel">
          <h3 style="float: rigth; text-align:center; margin-top:5px;">
            <a href="dashboard.php">BIENVENIDO</a>
          </h3>
        </div>
        <div class="sidebar-inner">
          <div class="sidebar-top">
            <div class="userlogged clearfix">
              <i class="icon demo">
                <img id="img_center" src="assets/images/logo/<?php echo $_SESSION['data_empresa'][2]; ?>" width="50%">
              </i>
              <!-- <i class="icon icons-faces-users-01"></i>-->
            </div>
          </div>
          <div class="menu-title">
            Configurar Menu
            <div class="pull-right menu-settings">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" data-delay="300"> 
              <i class="icon-settings"></i>
              </a>
              <ul class="dropdown-menu">
                <li><a href="#" id="reorder-menu" class="reorder-menu">Reorder menu</a></li>
                <li><a href="#" id="remove-menu" class="remove-menu">Remove elements</a></li>
                <li><a href="#" id="hide-top-sidebar" class="hide-top-sidebar">Hide user &amp; search</a></li>
              </ul>
            </div>
          </div>
          <ul class="nav nav-sidebar">
            <?php
              while($row = mysql_fetch_array($statement))
              {
                if($_SESSION['data'][12]==4)
                {
                  if($row['nombre_menu']=='Password')
                  {
                    ?>
                    <li class="nav-parent <?php echo $row['class_menu']; ?>">
                      <a href="#"><i class="<?php echo $row['icon_menu']; ?>"></i>
                        <span data-translate="builder"><?php echo $row['nombre_menu']; ?></span>
                        <span class="fa arrow"></span>
                      </a>
                      <ul class="children collapse"> 
                      <?php
                        $submenu = "select * from sr_submenu where id_menu='".$row['id_menu']."' && estado_submen = 1";
                        $statement1 = mysql_query($submenu)or die(mysql_error()." Error al Cargar Submenu");
                        while($row1 = mysql_fetch_array($statement1))
                        {
                          ?>
                            <li>
                              <a id="submenu" href="#<?php echo $row1['url_submenu']; ?>"><?php echo $row1['nombre_submenu'];?>
                                <input type='hidden' id="titulo_sub" value="<?php echo $row1['titulo_submenu']; ?>">
                              </a>
                            </li>

                          <?php
                        }
                      ?> 
                      </ul>               
                    </li>
                    <?php    
                  }
                }
                if($row['estado_menu']==1 )
                {
       
                  
                  ?>
                    <li class="nav-parent <?php echo $row['class_menu']; ?>">
                    <a href="#"><i class="<?php echo $row['icon_menu']; ?>"></i>
                      <span data-translate="builder"><?php echo $row['nombre_menu']; ?></span>
                      <span class="fa arrow"></span>
                    </a>
                    <ul class="children collapse"> 
                    <?php
                      $submenu = "select * from sr_submenu where id_menu='".$row['id_menu']."' && estado_submen = 1";
                      $statement1 = mysql_query($submenu)or die(mysql_error()." Error al Cargar Submenu");
                      while($row1 = mysql_fetch_array($statement1))
                      {
                        ?>

                          <li>
                            <a id="submenu" href="#<?php echo $row1['url_submenu']; ?>"><?php echo $row1['nombre_submenu'];?>
                              <input type='hidden' id="titulo_sub" value="<?php echo $row1['titulo_submenu']; ?>">
                            </a>
                          </li>

                        <?php
                      }
                    ?> 
                    </ul>               
                    </li>
                  <?php   
                              
                }
              }
            ?>
          </ul>
          <!-- SIDEBAR WIDGET FOLDERS -->
          <div class="sidebar-widgets">
            <p class="menu-title widget-title">Folders <span class="pull-right"><a href="#" class="new-folder"> <i class="icon-plus"></i></a></span></p>

          </div>
          <div class="sidebar-footer clearfix">
            <a class="pull-left footer-settings" href="#" data-rel="tooltip" data-placement="top" data-original-title="Settings">
            <i class="icon-settings"></i></a>
            <a class="pull-left toggle_fullscreen" href="#" data-rel="tooltip" data-placement="top" data-original-title="Fullscreen">
            <i class="icon-size-fullscreen"></i></a>
            <a class="pull-left" href="user-lockscreen.php" data-rel="tooltip" data-placement="top" data-original-title="Lockscreen">
            <i class="icon-lock"></i></a>
            <a class="pull-left btn-effect" href="logaut.php" data-modal="modal-1" data-rel="tooltip" data-placement="top" data-original-title="Logout1">
            <i class="icon-power"></i></a>
          </div>
        </div>
      </div>
      <!-- END SIDEBAR -->
      <div class="main-content">
        <!-- BEGIN TOPBAR -->
        <div class="topbar">
          <div class="header-left">
            <div class="topnav">
              <a class="menutoggle" href="#" data-toggle="sidebar-collapsed"><span class="menu__handle"><span>Menu</span></span></a>
              <ul class="nav nav-icons">
              <h3>
                <?php
                
                  $nombre       = $_SESSION['data_empresa'][0];
                  $municipio    = $_SESSION['data_empresa'][5];
                  $departamento = $_SESSION['data_empresa'][4];

                  echo $nombre.' de '.$municipio.' '.$departamento;
                  
                ?>
              </h3>
              </ul>
            </div>
          </div>
          <div class="header-right">
            <ul class="header-menu nav navbar-nav">
              
              <!-- BEGIN NOTIFICATION DROPDOWN -->           
              <!-- END NOTIFICATION DROPDOWN -->

              <!-- BEGIN MESSAGES DROPDOWN -->
              <!-- END MESSAGES DROPDOWN -->

              <!-- BEGIN USER DROPDOWN -->
              <li class="dropdown" id="user-header">
                <a href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                <?php
                  if($_SESSION["data"][10]!=null){
                    ?>
                      <img class="ava" src="assets/images/avatars/<?php echo $_SESSION['data'][10]; ?>" alt="user image">
                    <?php
                  }
                  else{
                    if($_SESSION["data"][9] == 1)
                    {
                      ?> <img src="assets/images/avatars/avatar1_big.png" alt="user image"> <?php
                    }else{
                      ?> <img src="assets/images/avatars/avatar5_big.png" alt="user image"> <?php
                    }
                  ?>
                    <img src="assets/images/avatars/user1.png" alt="user image">
                  <?php } ?>
                
                <span class="username"><?php echo $_SESSION["data"][3]; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <a id="submenu" href="#perfil.php"><i class="icon-user"></i><span>Mi Perfil</span></a>
                  </li>                 
                  <li>
                    <a href="logaut.php"><i class="icon-logout"></i><span>SALIR</span></a>
                  </li>
                </ul>
              </li>
              <!-- END USER DROPDOWN -->
              <!-- CHAT BAR ICON -->
              
            </ul>
          </div>
          <!-- header-right -->         
          </div>

          <div class="page-content">
            <div class="row">
            <div class="col-lg-12 ">
                <div class="panel">
                  <div class="panel-header">
                    <h3><i class="icon-bulb"></i><span class="titulo_submenu"></span></h3>
                  </div>
                  <div class="panel-content">
                    <div class="row">
                      <div class="col-md-12">
                      <div class="pages">
                      BIENVENIDOS
                      </div>                       
                      </div>
                      
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
              


  
        <!-- END TOPBAR -->

      
      </div>
      <!-- END MAIN CONTENT -->

      <!-- BEGIN BUILDER layout option-->

      <!-- END BUILDER -->
    </section>
    <!-- BEGIN QUICKVIEW SIDEBAR chat -->


    <!-- BEGIN PRELOADER -->
    <div class="loader-overlay">
      <div class="spinner">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
      </div>
    </div>
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
    <script src="assets/plugins/bootbox/bootbox.min.js"></script> <!-- Modal with Validation -->
    <script src="assets/plugins/mcustom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script> <!-- Custom Scrollbar sidebar -->
    <script src="assets/plugins/bootstrap-dropdown/bootstrap-hover-dropdown.min.js"></script> <!-- Show Dropdown on Mouseover -->
    <script src="assets/plugins/charts-sparkline/sparkline.min.js"></script> <!-- Charts Sparkline -->
    <script src="assets/plugins/retina/retina.min.js"></script> <!-- Retina Display -->
    <script src="assets/plugins/select2/select2.min.js"></script> <!-- Select Inputs -->
    <script src="assets/plugins/icheck/icheck.min.js"></script> <!-- Checkbox & Radio Inputs -->
    <script src="assets/plugins/backstretch/backstretch.min.js"></script> <!-- Background Image -->
    <script src="assets/plugins/bootstrap-progressbar/bootstrap-progressbar.min.js"></script> <!-- Animated Progress Bar -->
    <script src="assets/js/builder.js"></script> <!-- Theme Builder -->
    <script src="assets/js/sidebar_hover.js"></script> <!-- Sidebar on Hover -->
    <script src="assets/js/application.js"></script> <!-- Main Application Script -->
    <script src="assets/js/plugins.js"></script> <!-- Main Plugin Initialization Script -->
    <script src="assets/js/widgets/notes.js"></script> <!-- Notes Widget -->
    <script src="assets/js/quickview.js"></script> <!-- Chat Script -->
    <script src="assets/js/pages/search.js"></script> <!-- Search Script -->
    <!-- BEGIN PAGE SCRIPT -->
    <script src="assets/plugins/noty/jquery.noty.packaged.min.js"></script>  <!-- Notifications -->
    <script src="assets/plugins/bootstrap-editable/js/bootstrap-editable.min.js"></script> <!-- Inline Edition X-editable -->
    <script src="assets/plugins/bootstrap-context-menu/bootstrap-contextmenu.min.js"></script> <!-- Context Menu -->
    <script src="assets/plugins/multidatepicker/multidatespicker.min.js"></script> <!-- Multi dates Picker -->
    <script src="assets/js/widgets/todo_list.js"></script>
    <script src="assets/plugins/metrojs/metrojs.min.js"></script> <!-- Flipping Panel -->
    <script src="assets/plugins/charts-chartjs/Chart.min.js"></script>  <!-- ChartJS Chart -->
    <script src="assets/plugins/charts-highstock/js/highstock.min.js"></script> <!-- financial Charts -->
    <script src="assets/plugins/charts-highstock/js/modules/exporting.min.js"></script> <!-- Financial Charts Export Tool -->
    <script src="assets/plugins/maps-amcharts/ammap/ammap.min.js"></script> <!-- Vector Map -->
    <script src="assets/plugins/maps-amcharts/ammap/maps/js/worldLow.min.js"></script> <!-- Vector World Map  -->
    <script src="assets/plugins/maps-amcharts/ammap/themes/black.min.js"></script> <!-- Vector Map Black Theme -->
    <script src="assets/plugins/skycons/skycons.min.js"></script> <!-- Animated Weather Icons -->
    <script src="assets/plugins/simple-weather/jquery.simpleWeather.js"></script> <!-- Weather Plugin -->
    <script src="assets/js/widgets/widget_weather.js"></script>
<!--     <script src="assets/js/pages/dashboard.js"></script> -->
    <!-- END PAGE SCRIPT -->

    <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script> 
    <!-- Tables Filtering, Sorting &  -->


  </body>
</html>

