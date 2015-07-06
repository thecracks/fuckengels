
<div class="row">

    <table  class="table table-bordered table-hover" >
        <thead>
            <tr>
                <th > PUESTO </th>
                <th >Nombre</th>
                <th >Sumatoria Notas</th>
                <th >Promedio</th>
                
            </tr>

        </thead>
        <tbody>
            <?php
            $numeroPuesto = 0;
            foreach ($arrayDataNuevo as $fila) {

                echo '<tr>';
                $numeroPuesto++;
                echo '<td  WIDTH="30" >' . $fila['puesto'] . '</td>';
                echo '<td   >' . $fila['ApellidoPaterno'] . ' ' . $fila['ApellidoMaterno'] . ',  ' . $fila['Nombre'] .  ' </td>';
                echo '<td   >' . $fila['sumatoria'] . '</td>';
                echo '<td   >' . $fila['promedio'] . '</td>';
                

            echo '</tr>';
        }
        ?>


        </tbody>
    </table>
    <br>
    <h4>Numero de Alumnos: <strong><?= $numeroPuesto ?></strong> </h4>
</div>