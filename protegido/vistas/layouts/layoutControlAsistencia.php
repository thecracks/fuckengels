<!DOCTYPE html>
<html lang="en">

    <head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title> ENGELS CLASS - Control de Asistencia </title>
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

    <body >
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <a class="navbar-brand">Engels Class </a>
                </div>
            </div>
            <!-- /.container -->
        </nav>

        <div class="container">
            <?php echo $content; ?>     
        </div>
        
        <!-- Footer -->
        <div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div>
        <div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div><div>&nbsp;</div>
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
    </body>
</html>
