<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="keywords" content="yii framework, wiki, How-tos, tutorial, pdf, How to, export, excel" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />



        <script type="text/javascript">
            function imprimirSegmento(muestra)
            {
                var ficha = document.getElementById(muestra);
                var ventimp = window.open(' ', 'popimpr');
                ventimp.document.write(ficha.innerHTML);
                ventimp.document.close();
                ventimp.print();
                ventimp.close();
            }
        </script>

    </head>

    <body >



        <a href="javascript:imprimirSegmento('divimprimir_reportebimestralalumno')">Imprimir Tabla</a>

        <div class="container" id="divimprimir_reportebimestralalumno">
            
            <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/main2.css" rel="stylesheet"/>
            <link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/css/bootstrap.css" rel="stylesheet" />
            


            </br>
            </br>
            </br>
            </br>

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


                    <center><H4 >REPORTE BIMESTRAL DE NOTAS</H4></center>
                </div>
            </div>
            <br>
                <?php echo $content; ?>
        </div>

    </body>
</html>
