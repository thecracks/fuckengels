
<div class="row">

    <div class="col-md-12 col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <center><h3>ASIGNACIÓN DE EVALUACIÓN</h3></center>
            </div>
            <div class="panel-body">
                <div id="muestra"></div>
                <h2>Ingresa de Fórmula Capacidad por Área</h2>
                <br/>

                <?php
                if ($areas !== null) {

                    $i = 0;
                    foreach ($areas as $data) {
                        ?>

                        <div class="row ">
                            <label for="txtformulaarea" class="col-lg-3 control-label"><?= $data['Descripcion'] ?></label>
                            <div class="col-lg-5">
                                <input type="email" class="form-control" id="txtformulaarea<?= $data['idarea'] ?>" placeholder="<?= $data['Descripcion'] ?> " 
                                       value="<?= $data['formula'] ?>"  
                                       <?php
                                       if ($data['formula'] !== null) {

                                           $nombreBoton = "Editar Fórmula"
                                           ?>

                                           disabled="true"

                                           <?php
                                       } else {
                                           $nombreBoton = "Verificar Fórmula";
                                       }
                                       ?>
                                       >
                            </div>


                            <button type="button" 

                                    <?php if ($data['formula'] !== null) { ?>

                                        id="btnVerificaFormula_Area_<?= $data['idarea'] . "_edit" ?>"

                                    <?php } else { ?>

                                        id="btnVerificaFormula_Area_<?= $data['idarea'] ?>"

                                    <?php } ?>


                                    class="btn btn-success"><?= $nombreBoton; ?> </button>

                            <button type="button" id="btnVerCapacidades<?= $data['idarea'] ?>" 
                            <?php
                            if ($data['formula'] === null) {
                                ?>

                                        disabled="true"

                                        <?php
                                    }
                                    ?>

                                    class="btn btn-success">Ver Capaciades</button>


                        </div>

                        <div class="row" id="cargaContenidoArea<?= $data['idarea'] ?>">

                        </div>

                        <br>
                        <br>

                        <?php
                    }
                    ?>

                    <?php
                } else {

                    echo "No se encontraron registros";
                }
                ?>

            </div>
        </div>
    </div>
</div>

