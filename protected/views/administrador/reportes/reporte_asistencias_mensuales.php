

<div class="row">

    <?php
    $anio = $camposEncabezado['anio'];
    $mes = $camposEncabezado['mes'];
    $nivel = $camposEncabezado['nivel'];
    $grado = $camposEncabezado['grado'];
    $seccion = $camposEncabezado['seccion'];
    ?>

    <table>
        <tr >
            <td ><h3>Año: <?= $anio ?></h3></td>
            <td style=" padding-left: 100px"><h3>Mes: <?= $mes ?></h3></td>
        </tr>
        <br>
        <tr >
            <td ><h4>Nivel: <?= $nivel ?></h4></td>
            <td style=" padding-left: 100px"><h4>Grado: <?= $grado ?></h4></td>
            <td style=" padding-left: 100px"><h4>Seccion: <?= $seccion ?></h4></td>
        </tr>
    </table>

    <hr>
    <br>


    <table  class="bordered" >
        <thead>

            <tr>
                <th  rowspan="2">Nº</th>
                <th WIDTH="210" rowspan="2">Apellidos y Nombres</th>

                <?php
                foreach ($arrayNombreDia as $fila) {
                    echo '<th WIDTH="11" >' . $fila . '</th>';
                }
                ?>

            </tr>
            <tr>

                <?php
                foreach ($arrayNumeroDia as $fila) {
                    echo '<th  WIDTH="11" >' . $fila . '</th>';
                }
                ?>

            </tr>

        </thead>

        <tbody>

            <?php
            $numeroAlumno = 0;
            foreach ($arrayDataNuevo as $fila) {

                echo '<tr>';
                $numeroAlumno++;

                foreach ($fila as $key => $celda) {
                    if ($key == 0)
                        echo '<td  WIDTH="11" >' . $numeroAlumno . '</td>';
                    else if ($key == 1)
                        echo '<td  WIDTH="210" >' . $celda . '</td>';
                    else
                        echo '<td WIDTH="11"  >' . $celda . '</td>';
                }
                echo '</tr>';
            }
            ?>

        </tbody>


    </table>
</div>