



<!--////////////////////////////-->


<div class="row">

    <?php
    $anio = $camposEncabezado['idanio'];
    $nivel = $camposEncabezado['nivel'];
    $grado = $camposEncabezado['grado'];
    $seccion = $camposEncabezado['seccion'];
    $curso = $camposEncabezado['curso'];
    ?>


    <table>
        <tr >
            <td ><h3>Promedios del curso: <?=$curso ?></h3></td>
            <td style=" padding-left: 100px"><h3>Año: <?= $anio ?></h3></td>
        </tr>
        <br>
        <tr >
            <td ><h4>Nivel: <?= $nivel ?></h4></td>
            <td style=" padding-left: 100px"><h4>Grado: <?= $grado ?></h4></td>
            <td style=" padding-left: 100px"><h4>Sección: <?= $seccion ?></h4></td>
        </tr>
    </table>

    <hr>
    <br>    


    <table class="bordered">
        <thead>

            <tr>

                <th>#</th>        
                <th>Alumno</th>
                <th>B1</th>
                <th>B2</th>
                <th>B3</th>
                <th>B4</th>
                <th>PROM.</th>

            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;

            foreach ($notasbimestrales as $fila) {
                $i++;
                ?>
                <tr>
                    <td><?= $i ?></td> 
                    <td><?= $fila['Nombre'] ?></td> 
                    <td><?= $fila['b1'] ?></td> 
                    <td><?= $fila['b2'] ?></td> 
                    <td><?= $fila['b3'] ?></td> 
                    <td><?= $fila['b4'] ?></td>   
                    <td><?= $fila['pc'] ?></td> 
                </tr>

                <?php
            }
            ?>

        </tbody>
    </table>

</div>
