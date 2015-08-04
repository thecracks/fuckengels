
<?php
if (count($arrayNotasEvaluaciones) > 0) {
    ?>

    <table class="table table-bordered">
        <tr>
            <th  rowspan="2">Cursos</th>
            <?php
            foreach ($arraycabeceracapacidad as $arr) {
                echo ' <th  colspan="' . $arr['ncol'] . '">' . $arr['capacidad'] . '</th>';
            }
            ?>
        </tr>
        <tr>
            <?php
            foreach ($dataaevaluaciones as $arr) {
                echo ' <th >' . $arr['evaluacion'] . '</th>';
            }
            ?>
        </tr>
        <?php
        foreach ($datacursos as $key => $arr) {

            echo '<tr>';

            echo ' <th >' . $arr['curso'] . '</th>';
            foreach ($arrayNotasEvaluaciones[$key] as $value) {

                $estilo = "color: black";
                if ($value <= 10) {
                    $estilo = "color: red";
                } else if ($value <= 20) {
                    $estilo = "color: blue";
                }

                echo ' <td style="' . $estilo . '" >' . $value . '</td>';
            }

            echo '</tr>';
        }
        ?>

    </table>

    <?php
} else
    echo 'Aún no se ha configurado esta vista';
?>
