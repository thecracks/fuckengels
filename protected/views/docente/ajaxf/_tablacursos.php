


<?php if (count($datosCursos) > 0) {
    ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>SELECCIONAR</th>
                <th>NIVEL</th>
                <th>GRADO</th>
                <th>AREA</th>
                <th>CURSO</th>
                <th>SECCIÓN</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $i = 0;
            foreach ($datosCursos as $fila) {
                $i++;
                if ($i % 2 == 0) {
                    $clase = "active";
                } else {
                    $clase = "success";
                }
                ?>
                <tr class="<?= $clase ?>">
                    <th><a style=cursor:pointer; id="idcurso_<?= $fila['idcursoasignada'] ?>">Seleccionar</a></th>
                    <th><span id="nivel_"><?= $fila['nivel'] ?></span></th>
                    <th><span id="grado_"><?= $fila['grado'] ?></span></th>
                    <th><span id="area_"><?= $fila['area'] ?></span></th>
                    <th><span id="curso_"><?= $fila['curso'] ?></span></th>
                    <th><span id="seccion_"><?= $fila['seccion'] ?></span></th>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <?php
}
?>
