<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="keywords" content="yii framework, wiki, How-tos, tutorial, pdf, How to, export, excel" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <!--<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/main2.css" rel="stylesheet"/>-->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/css/bootstrap.css" rel="stylesheet" />

        <style>


            /*!
 * Bootstrap v3.1.1 (http://getbootstrap.com)
 * Copyright 2011-2014 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 */

            /*! normalize.css v3.0.0 | MIT License | git.io/normalize */

            /*            * {
                            -webkit-box-sizing: border-box;
                            -moz-box-sizing: border-box;
                            box-sizing: border-box;
                        }
                        *:before,
                        *:after {
                            -webkit-box-sizing: border-box;
                            -moz-box-sizing: border-box;
                            box-sizing: border-box;
                        }
                        html {
                            font-size: 62.5%;
            
                            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
                        }
                        body {
                            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
                            font-size: 14px;
                            line-height: 1.42857143;
                            color: #333;
                            background-color: #fff;
                        }
                        
                    
                   
                        .container {
                            padding-right: 15px;
                            padding-left: 15px;
                            margin-right: auto;
                            margin-left: auto;
                              width: 1170px;
                        }
            
                      
                        .row {
                            margin-right: -15px;
                            margin-left: -15px;
                        }
                        .col-xs-6, .col-sm-6, .col-md-6, .col-lg-6, .col-xs-12, .col-sm-12, .col-md-12, .col-lg-12 {
                            position: relative;
                            min-height: 1px;
                            padding-right: 15px;
                            padding-left: 15px;
                        }
                        .col-xs-6,  .col-xs-12 {
                            float: left;
                        }
            
            
                        @media (min-width: 992px) {
                            .col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12 {
                                float: left;
                            }
                            .col-md-12 {
                                width: 100%;
                            }
                         
                            .col-md-6 {
                                width: 50%;
                            }
                         
                        @media (min-width: 1200px) {
                            .col-lg-12 {
                                float: left;
                            }
                            .col-lg-12 {
                                width: 100%;
                            }
                         
                        }
                      
                        
                        
                        
                        
                        
                        
                        
            */









            /*# sourceMappingURL=bootstrap.css.map */



            /*---------*/


            .csstabla{
                font-size: 13px;
                text-align: center;
                width:100%;
                border-collapse: collapse;
                border: 1px solid #3E8F3E ;
            }

            /*            .notadesaprobatoria{
                            color: red;    
                        }
            
                        .notaaprobatoria{
                            color: blue;    
                        }*/


            .csstabla th,
            .csstabla td {
                border: 1px solid #3E8F3E !important;
                text-align: center;

            }

        </style>

        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.js"></script>

        <script type="text/javascript">


            $(document).ready(function () {

                alert("holas");
                $(".notadesaprobatoria").css("color", "red");
                $(".notaaprobatoria").css("color", "blue");

            });


        </script>

    </head>

    <body >

        <div class="container" id="divimprimir_reportebimestralalumno">

            <div class="row">

                <div class="col-lg-12">

<!--                    <table    style="width:100%">
                        <tr>
                            <td rowspan="2"><img  src="<?php echo Yii::app()->request->baseUrl; ?>/images/logoEngels.jpg" width="70" height="70"></td>
                            <td  ><H5 >INSTITUCIÓN EDUCATIVA "ENGELS CLASS"</H5></td>
                        </tr>
                        <tr>
                            <td style="align:center" ></td> 
                        </tr>
                    </table> -->

                    <H4  align="center">REPORTE BIMESTRAL DE NOTAS</H4>
                </div>
            </div><br>

                <?php echo $content; ?>
        </div>

    </body>
</html>
