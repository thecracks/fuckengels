



<link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/css/bootstrap.css" rel="stylesheet" />
<link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/css/font-awesome.css" rel="stylesheet" />
<link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
<link href="<?php echo Yii::app()->request->baseUrl; ?>/assets/css/custom-styles.css" rel="stylesheet" />

<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main2.css"/>

<style type="text/css">
    #girado {   
        -webkit-transform: rotate(270deg);
        text-align:left; 
        /*border:1px solid #ff0000;*/ 
    }
</style>

<table class = "table table-bordered table-condensed" id="tablenotasxcursobim_rn_do">
    <tr>
        <th  colspan="2">AREA: <?= $datoscurso['area'] ?></th>
        <th  colspan = "25">BIMESTRE <?= $idbimestre ?></th>
    </tr>
    <tr>
        <th  colspan="2">CURSO: <?= $datoscurso['curso'] ?></th>

        <?php
        foreach ($arrayCompetencias as $key => $value) {
            ?>
            <th class = "classname" colspan = "<?= $value ?>" rowspan = "2"><?= $key ?></th>
            <th  rowspan = "4">P<br>R<br>O<br>M<br>E<br>D<br>I<br>O</th>
            <?php
        }
        ?>
        <th  rowspan = "4">P.<br><br>B<br>I<br>M<br>E<br>S<br>T<br>R<br>E</th>


    </tr>
    <tr>
        <th  colspan="2">NIVEL: <?= $datoscurso['nivel'] ?></th>
    </tr>
    <tr>
        <th  colspan="2"  >GRADO: <?= $datoscurso['grado'] ?> <?= $datoscurso['seccion'] ?></th>
        <?php
        foreach ($arrayCabecera as $value) {
            if ($value !== 'P' && $value !== 'AN' && $value !== 'id') {
                ?>
                <th  rowspan = "2" WIDTH="10"  ><div id="girado"> <?= $value ?></div> </th>

        <?php
    }
}
?>
</tr>
<tr>
    <th >Nº</th>
    <th >APELLIDOS Y NOMBRES</th>
</tr>

<?php
$nfilas = count($arrayDataNuevo);
$ncolumnas = count($arrayDataNuevo[0]);

for ($idfila = 0; $idfila < $nfilas; $idfila++) {
    echo '<tr>';
    echo '<th >' . ($idfila + 1) . '</th>';
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
            <td ><span style="<?= $estilo ?>"> <?= $arrayDataNuevo[$idfila][$idcolu] ?></span></td>

        <?php } else {
            ?>

            <td > <span id="<?= "CEL-" . $idcolu . "_A-" . $idalumno . "_" . $arrayIdsCabecera[$idcolu]; ?>"   style="<?= $estilo ?>"  value="" ><?= $arrayDataNuevo[$idfila][$idcolu] ?></span></td>

            <?php
        }
    }
    echo '</tr>';
}
?>
</table>
