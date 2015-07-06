



<link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/css/bootstrap.css" rel="stylesheet" />
<link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/css/font-awesome.css" rel="stylesheet" />
<link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
<link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/css/custom-styles.css" rel="stylesheet" />

<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main2.css"/>



<table class = "tg table table-bordered" id="tablenotasxcursobim_rn_do">
    <tr>
        <th class = "tg-031e" colspan="2">AREA: <?= $datoscurso['area'] ?></th>
        <th class = "tg-s6z2" colspan = "25">BIMESTRE <?= $idbimestre ?></th>
    </tr>
    <tr>
        <th class = "tg-031e" colspan="2">CURSO: <?= $datoscurso['curso'] ?></th>

        <?php
        foreach ($arrayCompetencias as $key => $value) {
            ?>
            <th class = "classname" colspan = "<?= $value ?>" rowspan = "2"><?= $key ?></th>
            <th class = "tg-s6z2" rowspan = "4">P<br>R<br>O<br>M<br>E<br>D<br>I<br>O</th>
            <?php
        }
        ?>
        <th class = "tg-s6z2" rowspan = "4">P.<br><br>B<br>I<br>M<br>E<br>S<br>T<br>R<br>E</th>


    </tr>
    <tr>
        <th class = "tg-031e" colspan="2">NIVEL: <?= $datoscurso['nivel'] ?></th>
    </tr>
    <tr>
        <th class = "tg-031e" colspan="2"  >GRADO: <?= $datoscurso['grado'] ?> <?= $datoscurso['seccion'] ?></th>
        <?php
        foreach ($arrayCabecera as $value) {
            if ($value !== 'P' && $value !== 'AN' && $value !== 'id') {
                ?>
                <th class = "tg-s6z2" rowspan = "2"><?= $value ?> </th>
                <?php
            }
        }
        ?>
    </tr>
    <tr>
        <th class = "tg-031e">Nº</th>
        <th class = "tg-031e">APELLIDOS Y NOMBRES</th>
    </tr>

    <?php
    $nfilas = count($arrayDataNuevo);
    $ncolumnas = count($arrayDataNuevo[0]);

    for ($idfila = 0; $idfila < $nfilas; $idfila++) {
        echo '<tr>';
        echo '<th class = "tg-031e">' . ($idfila + 1) . '</th>';
        $idalumno = $arrayDataNuevo[$idfila][0];
        for ($idcolu = 1; $idcolu < $ncolumnas; $idcolu++) {

            $estilo = "color: black";
            if ($arrayDataNuevo[$idfila][$idcolu] <= 10 && $idcolu !== 1) {
                $estilo = "color: red";
            } else if ($arrayDataNuevo[$idfila][$idcolu] <= 20 && $idcolu !== 1) {
                $estilo = "color: blue";
            }
            if ($arrayCabecera[$idcolu] !== "P" and $arrayCabecera[$idcolu] !== "AN") {
                ?>
                <td > <input class="masterTooltip"  title="<?= $arrayCabecera[$idcolu] ?>" id="<?= "CEL-" . $idcolu . "_A-" . $idalumno . "_" . $arrayIdsCabecera[$idcolu] . "_FIL-" . $idfila; ?>" type="text"
                             size="2"   style="<?= $estilo ?>"  value="<?= $arrayDataNuevo[$idfila][$idcolu] ?>" ></input></td>

            <?php } else {
                ?>

                <td class = "tg-031e"> <span id="<?= "CEL-" . $idcolu . "_A-" . $idalumno . "_" . $arrayIdsCabecera[$idcolu]; ?>"   style="<?= $estilo ?>"  value="" ><?= $arrayDataNuevo[$idfila][$idcolu] ?></span></td>

                <?php
            }
        }
        echo '</tr>';
    }
    ?>
</table>
