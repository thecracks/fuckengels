
<div class="row">

    <div class="col-md-12 col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <center><h3>CARGA HORARIA</h3></center>
            </div>
            <div class="panel-body">

                <div class="container-fluid">

                    <div class="row">

                        <div class="col-lg-12">
                            <h4>Asigne las horas para cada nivel-grado que se llevarán por cada curso</h4>
                            <h5>NOTA: Cuando se asignen 0 horas, significa que tal nivel-grado no llevará dicho curso</h5>


                        </div>
                    </div>

                    <hr>
                    <div class="row" >
                        <div class="col-lg-12" id="divVerificaAccion_ch_ad" > </div>
                       
                    </div>
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <th  rowspan="2">ÁREA</th>
                                        <th  rowspan="2">CURSO</th>
                                        <?php
                                        if ($ninicial != 0)
                                            echo '<th  colspan="' . $ninicial . '">Incial</th>';
                                        if ($nprimaria != 0)
                                            echo '<th  colspan="' . $nprimaria . '">Primaria</th>';
                                        if ($nsecundaria != 0)
                                            echo '<th  colspan="' . $nsecundaria . '">Secundaria</th>';
                                        ?>

                                    </tr>
                                    <tr>
                                        <?php
                                        foreach ($datadi as $fila) {
                                            echo '<th WIDTH="70" >' . $fila['numero_grado'] . '</th>';
                                        }
                                        ?>
                                    </tr>

                                    <?php
                                    $indexFila = 0;
                                    foreach ($datCursos as $fila) {
                                        echo '<tr>';
                                        echo '<td  >' . $fila['area'] . '</td>';
                                        echo '<td >' . $fila['curso'] . '</td>';

                                        foreach ($data[$indexFila] as $celda) {
                                            echo '<td WIDTH="70"  id="tdcg_' . $celda[1] . '" >' . $celda[0] . '</td>';
                                        }

                                        echo '</tr>';
                                        $indexFila++;
                                    }
                                    ?>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

