


<div class="row">

    <?php
    $anio = $camposEncabezado['anio'];
    $fechaactual = $camposEncabezado['fecha'];
    $nivel = $camposEncabezado['nivel'];
    $grado = $camposEncabezado['grado'];
    $seccion = $camposEncabezado['seccion'];
    ?>


    <table>
        <tr >
            <td ><h3>Asistencias de: <?php
                    $date = new DateTime($fechaactual);
                    echo $date->format('d-m-Y');
                    ?></h3></td>
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


    <table class="bordered">
        <thead>
            <tr>
                <th>#</th>        
                <th>Alumno</th>
                <th>Asistencia</th>
                <th>Justifición</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;

            foreach ($dataAlumnos as $fila) {
                $i++;
                ?>
                <tr>
                    <td><?= $i ?></td> 
                    <td><?= $fila['Nombre'] ?></td> 
                    <td><?= $fila['Asistencia'] ?></td> 
                    <td><?= $fila['justificacion'] ?></td> 
                </tr>

                <?php
            }
            ?>

        </tbody>
    </table>
</div>
