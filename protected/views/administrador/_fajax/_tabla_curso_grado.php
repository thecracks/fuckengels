


<?php if (count($datosCursos) > 0) {
    ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Año</th>
                <th>Filial</th>
                <th>Nivel</th>
                <th>Grado</th>
                <th>Sección</th>
                <th>Docente Asignado</th>
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

                    <th><span id="area_"><?= $fila['idanio'] ?></span></th>
                    <th><span id="curso_"><?= $fila['filial'] ?></span></th>
                    <th><span id="nivel_"><?= $fila['nivel'] ?></span></th>
                    <th><span id="grado_"><?= $fila['grado'] ?></span></th>
                    <th><span id="seccion_">A</span></th>
                    <th>
                        <select class="form-control" id="cbfilial_acd_ad">
                            <option value="0">Seleccione docente ..</option>
                            <?php
                            foreach ($docentes as $value) {
                                echo ' <option value = "' . $value['iddocente'] . '">' . $value['nombre'] . '</option>';
                            }
                            ?>
                        </select>

                    </th>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <?php
}
?>
