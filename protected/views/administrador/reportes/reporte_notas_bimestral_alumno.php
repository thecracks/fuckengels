

<div class="row" >

    <div class="col-lg-12">

        <table  class="table table-condensed">
            <tr >
                <td colspan="2">Apellidos y Nombres:</td>
                <td colspan="4"><?= $encabezado['nombre'] ?></td>
            </tr>
            <tr >
                <td >Nivel</td>
                <td ><?= $encabezado['nivel'] ?></td>
                <td >Grado</td>
                <td ><?= $encabezado['grado'] ?></td>
                <td >Seccion</td>
                <td ><?= $encabezado['seccion'] ?></td>
            </tr>
        </table>
    </div>

</div><br>

<div class="row"  style=" font-size: 10px">


    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

        <table class="csstabla">
            <tr>
                <th rowspan="2">Promedio por Curso</th>
                <th colspan="4">Bimestre</th>
                <th rowspan="2">Promedio</th>
            </tr>
            <tr>
                <td>1°</td>
                <td>2°</td>
                <td>3°</td>
                <td>4°</td>
            </tr>

            <?php
            foreach ($datapromedioscursos as $fila) {
                echo '<tr>';
                foreach ($fila as $key => $celda) {
                    if ($key != 'idcurso') {

                        $estilo = '';

                        if ($key != 'curso') {
                            if ($celda <= 10) {
                                $estilo = 'class="notadesaprobatoria"';
                            } else if ($celda <= 20) {
                                $estilo = 'class="notaaprobatoria"';
                            }
                        }
                        echo '<td ' . $estilo . '>' . $celda . '</td>';
                    }
                }
                echo '</tr>';
            }
            ?>

        </table>
    </div>

    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">


        <div class="row">

            <table class="csstabla">
                <tr>
                    <th colspan="2" rowspan="2">Control de asistencias</th>
                    <th colspan="4">Bimestre</th>
                    <th rowspan="2">Total</th>
                </tr>
                <tr>
                    <td>1º</td>
                    <td>2º</td>
                    <td>3º</td>
                    <td>4º</td>
                </tr>
                <tr>
                    <td rowspan="2" >Tardanzas</td>
                    <td>Justificadas</td>
                    <?php
                    foreach ($arraynasistencias['tj'] as $value) {
                        echo '<td>' . $value . '</td>';
                    }
                    ?>
                    <td></td>

                </tr>
                <tr>

                    <td>Injustificadas</td>
                    <?php
                    foreach ($arraynasistencias['ti'] as $value) {
                        echo '<td>' . $value . '</td>';
                    }
                    ?>
                    <td></td>

                </tr>
                <tr>
                    <td rowspan="2">Inasistencias</td>
                    <td>Justificadas</td>
                    <?php
                    foreach ($arraynasistencias['fj'] as $value) {
                        echo '<td>' . $value . '</td>';
                    }
                    ?>
                    <td></td>

                </tr>
                <tr>
                    <td>Injustificadas</td>
                    <?php
                    foreach ($arraynasistencias['fi'] as $value) {
                        echo '<td>' . $value . '</td>';
                    }
                    ?>
                    <td></td>

                </tr>
            </table>
        </div><br>


        <div class="row">

            <table class="csstabla">
                <tr>
                    <th rowspan="2">Promedio por Área</th>
                    <th colspan="4">Bimestre</th>
                    <th rowspan="2">Promedio</th>
                </tr>
                <tr>
                    <td>1°</td>
                    <td>2°</td>
                    <td>3°</td>
                    <td>4°</td>
                </tr>

                <?php
                foreach ($datapromediosareas as $index => $fila) {
                    echo '<tr>';
                    ////////////////////
//                    foreach ($fila as $key => $celda) {
//                        if ($key != 'idarea')
//                            echo '<td>' . $celda . '</td>';
//                    }
//                    echo '<td>' . $pbarea[$index] . '</td>';
                    ////////////////////////
                    foreach ($fila as $key => $celda) {
                        if ($key != 'idarea') {

                            $estilo = '';

                            if ($celda <= 10) {
                                $estilo = 'class="notadesaprobatoria"';
                            } else if ($celda <= 20) {
                                $estilo = 'class="notaaprobatoria"';
                            }
                            echo '<td ' . $estilo . '>' . $celda . '</td>';
                        }
                    }

                    if ($pbarea[$index] <= 10) {
                        $estilo = 'class="notadesaprobatoria"';
                    } else if ($pbarea[$index] <= 20) {
                        $estilo = 'class="notaaprobatoria"';
                    }
                    echo '<td ' . $estilo . '>' . $pbarea[$index] . '</td>';


                    ///////////////////////

                    echo '</tr>';
                }
                ?>
            </table>
        </div><br>


        <div class="row">

            <table class="csstabla">
                <tr>
                    <th rowspan="2">Efectividad Académica</th>
                    <th colspan="4">Bimestre</th>
                    <th rowspan="2">Promedio Final</th>
                </tr>
                <tr>
                    <td>1º</td>
                    <td>2º</td>
                    <td>3º</td>
                    <td>4º</td>
                </tr>
                <tr>
                    <td >Orden de mérito</td>
                    <?php
                    foreach ($arrayefectividadacadem['puesto'] as $value) {
                        echo '<td>' . $value . '</td>';
                    }
                    ?>
                    <td></td>
                </tr>

                <tr>
                    <td>Comportamiento</td>
                    <?php
                    foreach ($arrayefectividadacadem['comportamiento'] as $value) {
                        echo '<td>' . $value . '</td>';
                    }
                    ?>
                    <td></td>
                </tr>
            </table>
        </div><br>
    </div>
</div>
