
<div  class="col-xs-12  col-sm-8 col-md-8 col-lg-8" align="center">



    <h3 id="">Ingresa la fórmula para cada Capacidad</h3>

    <br>
    <br>

    <?php
    if ($competenciasDeArea !== null) {

        $i = 0;

        foreach ($competenciasDeArea as $data) {
            ?>

            <div class="row ">

                <label for="txtformulacapacidad1" class="col-lg-2 control-label"><?= $data['descripcion'] ?></label>
                <div class="col-lg-5">
                    <input type="email" class="form-control" id="txtformulacapacidad<?= $data['idcompetencia'] ?>"
                           placeholder="<?= $data['descripcion'] ?>" value="<?= $data['formula'] ?>"

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

                            id="btnVerificaFormula_Capacidad_<?= $data['idcompetencia'] . "_edit" ?>"

                        <?php } else { ?>

                            id="btnVerificaFormula_Capacidad_<?= $data['idcompetencia'] ?>"

                        <?php } ?>

                        class="btn btn-primary btn-primary col-lg-2"><?= $nombreBoton; ?></button>

            </div>


            <div class="row color" id="cargaContenidoCapacidad<?= $data['idcompetencia'] ?>">

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


