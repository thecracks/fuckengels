
<script type="text/javascript">
//    function imprSelec(muestra)
//    {
//        var ficha = document.getElementById(muestra);
//        var ventimp = window.open(' ', 'popimpr');
//        ventimp.document.write(ficha.innerHTML);
//        ventimp.document.close();
//        ventimp.print();
//        ventimp.close();
//    }
</script>

<div class="row">



    <div class="col-md-12 col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <center><h3>REPORTE PROMEDIOS</h3></center>
            </div>
            <div class="panel-body">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#vernotas" id="tab_asistencia" data-toggle="tab">Ver Promedios</a>   </li>


                </ul>

                <div class="tab-content">

                    <br>
                    <br>

                    <div class="tab-pane fade active in" id="vernotas">

                        <div class="container-fluid">


                            <div class="row">

                                <div class="table-responsive">

                                    <h4>Cuadro Resumen</h4>
                                    <table class = "tg table table-bordered">

                                        <thead>
                                            <tr>
                                                <th>Curso</th>        
                                                <th>Bimestre 1</th>
                                                <th>Bimestre 2</th>   
                                                <th>Bimestre 3</th>
                                                <th>Bimestre 4</th>
                                                <th>Promedio Curso</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 0;

                                            foreach ($promedioBimestre as $fila) {
                                                ?>
                                                <tr>
                                                    <td><?= $fila['Curso'] ?></td> 
                                                    <td><?= $fila['b1'] ?></td> 
                                                    <td><?= $fila['b2'] ?></td> 
                                                    <td><?= $fila['b3'] ?></td> 
                                                    <td><?= $fila['b4'] ?></td> 
                                                    <td><strong><?= $fila['pc'] ?></strong></td> 
                                                </tr>

                                                <?php
                                            }
                                            ?>
                                            <tr>
                                                <td><strong><?= 'Promedio' ?></strong></td> 
                                                <td><strong><?= $pb1 ?></strong></td> 
                                                <td><strong><?= $pb2 ?></strong></td> 
                                                <td><strong><?= $pb3 ?></strong></td> 
                                                <td><strong><?= $pb4 ?></strong></td> 
                                                <td><strong><?= $pf ?></strong></td> 
                                            </tr>

                                        </tbody>


                                    </table>
                                </div>


                            </div>

                            <br>
                            <br>

                            <!--<a href="javascript:imprSelec('muestra')">Imprimir Tabla</a>-->

                            <!-- 4:3 aspect ratio -->
                            
                            <iframe class="embed-responsive-item row" src="alumno/estadistica2" width="100%" height="500px"></iframe>
                            
<!--                            <div >
                                <iframe  src="alumno/estadistica2"></iframe>
                            </div>-->


                            <!--<div class="row" id="muestra">-->

                            <?php
//                                $this->Widget('ext.highcharts.HighchartsWidget', array(
//                                    'scripts' => array(
//                                        'modules/exporting',
//                                        'themes/grid-light'),
//                                    'options' => array(
//                                        'title' => array('text' => 'Estadísticas Notas 2015'),
//                                        'xAxis' => array(
//                                            'categories' => array('Bimestre 1', 'Bimestre 2', 'Bimestre 3', 'Bimestre 4')
//                                        ),
//                                        'yAxis' => array(
//                                            'title' => array('text' => 'Nota')
//                                        ),
//                                        'series' => $arrayNotasBimetres
//                                    )
//                                ));
//        
//        
//        
//        
//        
//        $this->Widget('ext.highcharts.HighchartsWidget', array(
//            'options' => array(
//                'gradient' => array('enabled' => true),
//                'credits' => array('enabled' => false),
//                'exporting' => array('enabled' => true),
//                'chart' => array(
//                    'plotBackgroundColor' => null,
//                    'plotBorderWidth' => null,
//                    'plotShadow' => false,
//                    'height' => 400,
//                    'width' => 750,
//                ),
//                'legend' => array(
//                    'enabled' => TRUE,
//                ),
//                'title' => array(
//                    'text' => 'Title of the chart'
//                ),
//                'tooltip' => array(
//                    'pointFormat' => '{series.name}: <b>{point.percentage}%</b>',
//                    'percentageDecimals' => 1,
//                ),
//                'plotOptions' => array(
//                    'pie' => array(
//                        'allowPointSelect' => true,
//                        'cursor' => 'pointer',
//                        'dataLabels' => array(
//                            'enabled' => true,
//                            'color' => '#000000',
//                            'connectorColor' => '#000000',
//                            'formatter' => "js:function(){return '<b>'+ this.point.name +'</b>: '+ this.percentage.toFixed(2) +' %';}",
//                        ),
//                    )
//                ),
//                'series' => array(
//                    array(
//                        'type' => 'pie',
//                        'name' => '% d\'utilisation',
//                        'data' => array(array('label1', 63.51), array('label2', 35.14), array('label3', 1.35)),
//                    )
//                ),
//        )));
//        
//        
//        
//        
//        $this->widget('ext.highcharts.HighchartsWidget', array(
//            'scripts' => array(
//                'modules/exporting',
//                'themes/grid-light',
//            ),
//            'options' => array(
//                'exporting' => array('enabled' => true),
//                'title' => array(
//                    'text' => 'Combination chart',
//                ),
//                'xAxis' => array(
//                    'categories' => array('Apples', 'Oranges', 'Pears', 'Bananas', 'Plums'),
//                ),
//                'labels' => array(
//                    'items' => array(
//                        array(
//                            'html' => 'Total fruit consumption',
//                            'style' => array(
//                                'left' => '50px',
//                                'top' => '18px',
//                                'color' => 'js:(Highcharts.theme && Highcharts.theme.textColor) || \'black\'',
//                            ),
//                        ),
//                    ),
//                ),
//                'series' => array(
//                    array(
//                        'type' => 'column',
//                        'name' => 'Jane',
//                        'data' => array(3, 2, 1, 3, 4),
//                    ),
//                    array(
//                        'type' => 'column',
//                        'name' => 'John',
//                        'data' => array(2, 3, 5, 7, 6),
//                    ),
//                    array(
//                        'type' => 'column',
//                        'name' => 'Joe',
//                        'data' => array(4, 3, 3, 9, 0),
//                    ),
//                    array(
//                        'type' => 'spline',
//                        'name' => 'Average',
//                        'data' => array(3, 2.67, 3, 6.33, 3.33),
//                        'marker' => array(
//                            'lineWidth' => 2,
//                            'lineColor' => 'js:Highcharts.getOptions().colors[3]',
//                            'fillColor' => 'white',
//                        ),
//                    ),
//                    array(
//                        'type' => 'pie',
//                        'name' => 'Total consumption',
//                        'data' => array(
//                            array(
//                                'name' => 'Jane',
//                                'y' => 13,
//                                'color' => 'js:Highcharts.getOptions().colors[0]', // Jane's color
//                            ),
//                            array(
//                                'name' => 'John',
//                                'y' => 23,
//                                'color' => 'js:Highcharts.getOptions().colors[1]', // John's color
//                            ),
//                            array(
//                                'name' => 'Joe',
//                                'y' => 19,
//                                'color' => 'js:Highcharts.getOptions().colors[2]', // Joe's color
//                            ),
//                        ),
//                        'center' => array(100, 80),
//                        'size' => 100,
//                        'showInLegend' => false,
//                        'dataLabels' => array(
//                            'enabled' => false,
//                        ),
//                    ),
//                ),
//            )
//        ));
                            ?>

                            <!--</div>-->

                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>