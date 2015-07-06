<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>ENGELS CLASS</title>
        <!-- Bootstrap Core CSS -->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/modern-business.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body style="background: rgba(5,26,46,1);
background: -moz-linear-gradient(left, rgba(5,26,46,1) 0%, rgba(5,22,41,1) 100%);
background: -webkit-gradient(left top, right top, color-stop(0%, rgba(5,26,46,1)), color-stop(100%, rgba(5,22,41,1)));
background: -webkit-linear-gradient(left, rgba(5,26,46,1) 0%, rgba(5,22,41,1) 100%);
background: -o-linear-gradient(left, rgba(5,26,46,1) 0%, rgba(5,22,41,1) 100%);
background: -ms-linear-gradient(left, rgba(5,26,46,1) 0%, rgba(5,22,41,1) 100%);
background: linear-gradient(to right, rgba(5,26,46,1) 0%, rgba(5,22,41,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#051a2e', endColorstr='#051629', GradientType=1 );">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo Yii::app()->request->baseUrl . '/principal'; ?>">ENGELS CLASS</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <!--<li>
                            <a href="about.html">NOSOTROS</a>
                        </li>
                        <li>
                            <a href="services.html">Services</a>
                        </li>
                        <li>
                            <a href="contact.html">Contact</a>
                        </li>-->
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown">NOSOTROS<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?php echo Yii::app()->request->baseUrl . '/principal/nuestraHistoria'; ?>">Nuestra Historia</a>
                                </li>
                                <li>
                                    <a href="<?php echo Yii::app()->request->baseUrl . '/principal/enfoque'; ?>">Misión y Visión</a>
                                </li>
                                <li>
                                    <a href="<?php echo Yii::app()->request->baseUrl . '/principal/valores'; ?>">Valores Institucionales</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown">INFORMES <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?php echo Yii::app()->request->baseUrl . '/principal/nuevos'; ?>">Alumnos Nuevos</a>
                                </li>
                                <li>
                                    <a href="<?php echo Yii::app()->request->baseUrl . '/principal/regulares'; ?>">Alumnos Regulares</a>
                                </li>
                                <li>
                                    <a href="<?php echo Yii::app()->request->baseUrl . '/principal/traslados'; ?>">Traslados</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown">UBICANOS<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?php echo Yii::app()->request->baseUrl . '/principal/sedePorvenir'; ?>">El Porvenir</a>
                                </li>
                                <li>
                                    <a href="<?php echo Yii::app()->request->baseUrl . '/principal/sedeLaredo'; ?>">Laredo</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?php echo Yii::app()->request->baseUrl . '/principal/login'; ?>">INTRANET</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>

        <div class="container">
            <?php echo $content; ?>     
        </div>
        <!-- Footer -->
        <div class="container">
            <div class="well" style="background-image: url(<?php echo Yii::app()->request->baseUrl; ?>/images/footer.jpg); color: white;">
                <div class="row">
                    <div class="col-md-12">
                        <br />
                        <p>Copyright &copy; 2014 Corporación Educativa Engels Class</p>  
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container -->

        <!-- jQuery -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js"></script>
        <!-- Script to Activate the Carousel -->
        <script>
            $('.carousel').carousel({
                interval: 5000 //changes the speed
            });
        </script>
    </body>
</html>

