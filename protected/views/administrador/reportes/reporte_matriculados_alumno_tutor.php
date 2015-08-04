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
                <th >DNI</th>
                <th  >MADRE</th>
                <th >DNI</th>
                <th >PADRE</th>
                <th >DNI</th>
            </tr>

        </thead>

        <tbody>

            <?php
            $numeroAlumno = 0;
            foreach ($arrayDataNuevo as $fila) {

                echo '<tr>';
                $numeroAlumno++;
                echo '<td  WIDTH="15" >' . $numeroAlumno . '</td>';
                
                echo '<td  WIDTH="120" >' . $fila["nombre"] . '</td>';
                echo '<td  WIDTH="60" >' . $fila["DNI"] . '</td>';
                echo '<td  WIDTH="120" >' . $fila["nombreMadre"] . '</td>';
                echo '<td  WIDTH="60" >' . $fila["dniMadre"] . '</td>';
                echo '<td  WIDTH="120" >' . $fila["nombrePadre"] . '</td>';
                echo '<td  WIDTH="60" >' . $fila["dniPadre"] . '</td>';
                
                
                
                
                
               // foreach ($fila as $key => $celda) {
                 //   if ($key != 'numero_grado')
                   //     echo '<td  WIDTH="50%" >' . $celda . '</td>';
//                    else
//                        echo '<td  >' . $celda . '</td>';
                //}
                echo '</tr>';
            }
            ?>

        </tbody>
    </table>
    <br>
    <h4>Alumnos matriculados: <strong><?= $numeroAlumno ?></strong> </h4>
</div>