<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
    <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Alumno</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href='http://fonts.googleapis.com/css?family=Gloria+Hallelujah' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="<?php echo Yii::app() -> request -> baseUrl; ?>/css/bootstrap.css">
        <link rel="stylesheet" href="<?php echo Yii::app() -> request -> baseUrl; ?>/css/main2.css">
        <link rel="stylesheet" href="<?php echo Yii::app() -> request -> baseUrl; ?>/css/login.css">
        <link rel="stylesheet" href="<?php echo Yii::app() -> request -> baseUrl; ?>/css/bootstrap-combobox.css">
        <link rel="stylesheet" href="<?php echo Yii::app() -> request -> baseUrl; ?>/css/sticky-footer.css">
        
        <script src="<?php echo Yii::app() -> request -> baseUrl; ?>/js/vendor/modernizr-2.6.2.min.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/vendor/jquery-1.11.0.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
        <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <header>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <center><img src="<?php echo Yii::app() -> request -> baseUrl.'/img/logoEngels.jpg'; ?>" class="img-responsive"/></center>
                    </div>
                    <!--<div class="col-xs-12 col-sm-6 col-md-8 col-lg-9">
                        <h1 class="texto tamtexto1">Corporación Educativa ENGELS CLASS</h1>
                        <h5 class="texto tamtexto2">"Garantizando el éxito en la vida a partir de una EDUCACIÓN DE CALIDAD"</h6>
                    </div>-->
                    <!--<div class="hidden-xs col-sm-6 col-md-4  col-lg-3 centrar">

                        <a href="#"><img src="<?php echo Yii::app() -> request -> baseUrl.'/img/facebook.png'; ?>" class="tamincono" /></a>
                        <a href="#"><img src="<?php  echo Yii::app() -> request -> baseUrl.'/img/googleplus.png'; ?>" class="tamincono"/></a>
                        <a href="#"><img src="<?php  echo Yii::app() -> request -> baseUrl.'/img/twitter.png'; ?>" class="tamincono" /></a>
                        
                    </div>-->
                </div>
            </div>
        </header >

        <nav class="navbar navbar-default">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse"
                data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Cambiar Navegación</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href=" <?php  echo Yii::app() -> request -> baseUrl.'/alumno/principal'; ?>" class="navbar-brand">INICIO</a>
            </div>

            <div class="collapse navbar-collapse navbar-ex1-collapse" >
                <ul class="nav navbar-nav ">
                    <li >
                        <a href="<?php  echo Yii::app() -> request -> baseUrl.'/alumno/perfil'; ?>">Perfil</a>
                    </li>
                    <li >
                        <a href="<?php  echo Yii::app() -> request -> baseUrl.'/alumno/principal'; ?>">Foro</a>
                    </li>
                    <li>
                        <a href="<?php  echo Yii::app() -> request -> baseUrl.'/alumno/logout'; ?>">Cerrar Sesión</a>
                    </li>

                    <!--<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Mas...<b class="caret"> </b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="<?php  echo Yii::app() -> request -> baseUrl.'/docente/alumnonuevo'; ?>">Alumno nuevo</a>
                            </li>       
                        </ul>
                    </li>-->
                    
                </ul>
            </div>
        </nav>

        <div class="container">           
             <?php echo $content; ?>
        </div>
        
        <footer class="color24 footer">
            <div class="container">
                <p align="center" class="colorLetraFooter">
                    <br>
                    2007 - 2014 @ Organización Educativa Engels Class
                </p>
                <br>
            </div>
        </footer>

        <script>
            window.jQuery || document.write('<script src="<?php echo Yii::app() -> request -> baseUrl; ?>/js/vendor/jquery-1.11.0.min.js"><\/script>')
        </script>
        <script src="<?php echo Yii::app() -> request -> baseUrl; ?>/js/vendor/jquery-1.11.0.min.js"></script>
        <script src="<?php echo Yii::app() -> request -> baseUrl; ?>/js/vendor/bootstrap.js"></script>
        <script src="<?php echo Yii::app() -> request -> baseUrl; ?>/js/vendor/bootstrap.min.js"></script>
        <script src="<?php echo Yii::app() -> request -> baseUrl; ?>/js/main.js"></script>
        <script src="<?php echo Yii::app() -> request -> baseUrl; ?>/js/bootstrap-combobox.js"></script>
        <script src="<?php echo Yii::app() -> request -> baseUrl; ?>/js/bootstrap-modal.js"></script>

    </body>
</html>