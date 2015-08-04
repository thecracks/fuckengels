

<?php if ($tipo != 'preview') { ?>


    <div class="row">

        <?php
        $anio = $camposEncabezado['anio'];
        $nivel = $camposEncabezado['nivel'];
        $grado = $camposEncabezado['grado'];
        $seccion = $camposEncabezado['seccion'];
        ?>

        <table>
            <tr>
                <td ><h3>Año: <?= $anio ?></h3></td>
            </tr>
            <br>
            <tr>
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
                    <th  >Nº</th>
                    <th >Apellidos y Nombres</th>
                    <th >Nivel</th>
                    <th  >Grado</th>
                    <th >Sección</th>
                    <th >Usuario</th>
                </tr>

            </thead>

            <tbody>

                <?php
                $numeroAlumno = 0;
                foreach ($arrayDataNuevo as $fila) {

                    echo '<tr>';
                    $numeroAlumno++;
                    echo '<td  WIDTH="15" >' . $numeroAlumno . '</td>';
                    echo '<td  WIDTH="300" >' . $fila['nombre'] . '</td>';
                    echo '<td   >' . $fila['nivel'] . '</td>';
                    echo '<td   >' . $fila['grado'] . '</td>';
                    echo '<td   >' . $fila['seccion'] . '</td>';
                    echo '<td   >' . $fila['usuario'] . '</td>';

                    echo '</tr>';
                }
                ?>

            </tbody>
        </table>
        <br>
        <h4>Alumnos matriculados: <strong><?= $numeroAlumno ?></strong> </h4>
    </div>

<?php } else { ?>


    <table  class="table table-bordered table-hover" >
        <thead>

            <tr>
                <th  >Nº</th>
                <th >Apellidos y Nombres</th>
                <th >Nivel</th>
                <th >Grado</th>
                <th >Sección</th>
                <th >Usuario</th>
            </tr>

        </thead>

        <tbody>

             <?php
                $numeroAlumno = 0;
                foreach ($arrayDataNuevo as $fila) {

                    echo '<tr>';
                    $numeroAlumno++;
                    echo '<td  WIDTH="15" >' . $numeroAlumno . '</td>';
                    echo '<td   >' . $fila['nombre'] . '</td>';
                    echo '<td   >' . $fila['nivel'] . '</td>';
                    echo '<td   >' . $fila['grado'] . '</td>';
                    echo '<td   >' . $fila['seccion'] . '</td>';
                    echo '<td   >' . $fila['usuario'] . '</td>';

                    echo '</tr>';
                }
                ?>


        </tbody>
    </table>
    <br>
    <h4>Alumnos matriculados: <strong><?= $numeroAlumno ?></strong> </h4>
    </div>

<?php } ?>