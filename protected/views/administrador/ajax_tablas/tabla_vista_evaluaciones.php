


<?php if (count($dataevaluaciones) > 0) {
    ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Capacidad</th>
                <th>Subcapacidad</th>
                <th>Visibilidad</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $i = 0;
            foreach ($dataevaluaciones as $fila) {
                $i++;
                if ($i % 2 == 0) {
                    $clase = "active";
                } else {
                    $clase = "success";
                }
                ?>
                <tr class="<?= $clase ?>">

                    <td><span id="area_"><?= $fila['competencia'] ?></span></td>
                    <td><span id="curso_"><?= $fila['evaluacion'] ?></span></td>

                    <td>
                        <?php
                        $idckb = "ckbevaluacionvisible_" . $fila['idcompetencia'] . "_" . $fila['idevaluacion'];
                        $idlb = "lbevaluacionvisible_" . $fila['idcompetencia'] . "_" . $fila['idevaluacion'];

                        $chekeado = "";
                        $texto = "oculto";
                        if ($fila['muestra'] == "S") {
                            $chekeado="checked";
                            $texto = "visible";
                        } 
                        echo ' <input  id=' . $idckb . ' style="width:1.5em; height:1.5em;"  type="checkbox" '.$chekeado.'> <label id=' . $idlb . '> '.$texto.' </label>';
                        ?>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <?php
}
?>
