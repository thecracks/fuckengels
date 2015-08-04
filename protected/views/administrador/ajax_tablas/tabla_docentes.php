


<?php if (count($datadocentes) > 0) {
    ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>SELECCIONAR</th>
                <th>DOCENTE</th>
<!--                <th>GRADO</th>
                <th>AREA</th>
                <th>CURSO</th>
                <th>SECCIÓN</th>-->
            </tr>
        </thead>
        <tbody>

            <?php
            $i = 0;
            foreach ($datadocentes as $fila) {
                $i++;
                if ($i % 2 == 0) {
                    $clase = "active";
                } else {
                    $clase = "success";
                }
                ?>
                <tr class="<?= $clase ?>">
                    <th><a style=cursor:pointer; id="iddocente_<?= $fila['iddocente'] ?>_<?= $fila['docente'] ?>">Seleccionar</a></th>
                    <th><span ><?= $fila['docente'] ?></span></th>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <?php
}
?>
