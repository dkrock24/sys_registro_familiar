<?php
    session_start();    
    include_once("class_db/cargar_recursos.php");


    $location = "user-lockscreen";
    $config = loadConfig($location);

    $id_usuario = (int) $_SESSION['data'][0];
    $vatar  = usuariosDetalle($id_usuario);    
    
if(isset($_SESSION['data']) )
{
    $user = array();
    $user['usuario'] = $_SESSION['data'][1];
    $user['password'] = $_SESSION['data'][2];
    $user['avatar']  = $_SESSION['data'][10];
    $_SESSION['usuario_1'] =  $user['usuario'];  
    $_SESSION['avatar'] =  $user['avatar'];
    

       
  
    unset($_SESSION['data']);  
}
elseif(isset($_SESSION['usuario_1']))
{
   
   //header('Location: '.'logaut.php');
}
else
{
    header('Location: '.'logaut.php');
}




?>

<!DOCTYPE html>
<html>
    <head>
        <!-- BEGIN META SECTION -->
        <meta charset="utf-8">
        <title>Registro Familiar</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta content="" name="description" />
        <meta content="themes-lab" name="author" />
        <link rel="shortcut icon" href="assets/img/favicon.png">
        <!-- END META SECTION -->
        <!-- BEGIN MANDATORY STYLE -->
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/css/ui.css" rel="stylesheet">
        <link href="assets/plugins/bootstrap-loading/lada.min.css" rel="stylesheet">
        <!-- END  MANDATORY STYLE -->
    </head>
    <body class="account" data-page="lockscreen">
        <!-- BEGIN LOGIN BOX -->
        <div class="container" id="lockscreen-block">
        <div class="row">
            <div class="col-sm-12 ">
                <h2 class="titulo1">Alcaldia Municipal de Santa Rosa Guachilipin Santa Ana</h2>
            </div>
        </div>
        
            <div class="row">
                <div class="col-md-8 col-md-offset-1">
                    <div class="account-wall">
                        <div class="user-image">
                            <img src="assets/images/avatars/<?php echo  $vatar['avatar']; ?>" class="img-responsive img-circle" alt="friend 8">
                            <div id="loader"></div>
                        </div>
                        <form class="form-signin" role="form" method="post" action="validation/autentificar.php">
                            <h2>Bienvenido, <strong><?php echo $_SESSION['usuario_1']; ?></strong>!</h2>
                            <p>Introdusca su Password para Retomar la Session.</p>
                            <div class="input-group"> 
        <input type="hidden" value="<?php echo $_SESSION['usuario_1']; ?>" name="usuario" id="usuario">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password"> 
                            <span class="input-group-btn"> 
                             <input type="submit" class="btn" value="Log In">
                                
                            </span> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="loader-overlay loaded">
            <div class="loader-inner">
                <div class="loader2"></div>
            </div>
        </div>
           <?php
                foreach ($config as $value) {
                               
            ?>
            <input type="checkbox" id="slide-cb" class="switch-input" checked="<?php echo $value[0]; ?>">
            <input id="slide-cb" type="checkbox" class="switch-input" checked>
            <?php
            }?>
        <script src="assets/plugins/jquery/jquery-1.11.1.min.js"></script>
        <script src="assets/plugins/jquery/jquery-migrate-1.2.1.min.js"></script>
        <script src="assets/plugins/gsap/main-gsap.min.js"></script>
        <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/plugins/backstretch/backstretch.min.js"></script>
        <script src="assets/plugins/bootstrap-loading/lada.min.js"></script>
        <script src="assets/plugins/progressbar/progressbar.min.js"></script>
        <script src="assets/js/pages/lockscreen.js"></script>
    </body>
</html>
