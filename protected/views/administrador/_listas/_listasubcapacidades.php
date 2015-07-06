

<div class="color9 col-xs-12  col-sm-6 col-md-8 col-lg-8">

    <h3>Sub Capacidades:</h3>
    <div class="table-responsive">
        <table border="0" class="table">

            <thead>
                <tr>
                    <th>Abreviación</th>
                    <th>Descripción</th>
                    <th>Abreviación</th>
                    <th>Descripción</th>
                </tr>
            </thead>

            <tbody>

                <?php
                if ($evaluaciones !== null) {


                    for ($index = 0; $index < count($evaluaciones); $index++) {
                        ?>
                        <tr>
                            <td><button type="button" class="btn btn-primary" id="boton<?= $evaluaciones[$index]['evaluacionmin'] ?>"><?= $evaluaciones[$index]['evaluacionmin'] ?></button></td>
                            <td><span><?= $evaluaciones[$index]['descripcion'] ?></span></td>

                            <?php
                            $index++;
                            if ($index < count($evaluaciones)) {
                                ?> 

                                <td><button type="button" class="btn btn-primary" id="boton<?= $evaluaciones[$index]['evaluacionmin'] ?>"><?= $evaluaciones[$index]['evaluacionmin'] ?></button></td>
                                <td><span><?= $evaluaciones[$index]['descripcion'] ?></span></td>

                            <?php } ?>
                        </tr>
                        <?php
                    }
                    ?>

                    <?php
                } else {

                    echo "No se encontraron registros";
                }
                ?>

            </tbody>
        </table>
    </div>


</div>


<div class="color9 col-xs-12  col-sm-6 col-md-4 col-lg-4">

    <h3>Botones:</h3>
    <div class="table-responsive">
        <table border="0" class="table">

<!--            <thead>
                <tr>
                    <th>Abreviación</th>
                    <th>Descripción</th>
                </tr>
            </thead>-->

            <tbody>
                <tr>
                    <td><button type="button" class="btn btn-primary" id="botoni">(</button></td>
                    <td><button type="button" class="btn btn-primary" id="botond">)</button></td>
                    <td><button type="button" class="btn btn-primary" id="boton/">/</button></td>

                </tr>
                <tr>
                    <td><button type="button" class="btn btn-primary" id="boton1">1</button></td>
                    <td><button type="button" class="btn btn-primary" id="boton2">2</button></td>
                    <td><button type="button" class="btn btn-primary" id="boton3">3</button></td>
                </tr>
                <tr>
                    <td><button type="button" class="btn btn-primary" id="boton4">4</button></td>
                    <td><button type="button" class="btn btn-primary" id="boton5">5</button></td>
                    <td><button type="button" class="btn btn-primary" id="boton6">6</button></td>
                </tr>
                <tr>

                    <td><button type="button" class="btn btn-primary" id="boton7">7</button></td>
                    <td><button type="button" class="btn btn-primary" id="boton8">8</button></td>
                    <td><button type="button" class="btn btn-primary" id="boton9">9</button></td>
                </tr>

                <tr>

                    <td><button type="button" class="btn btn-primary" id="boton*">*</button></td>
                    <td><button type="button" class="btn btn-primary" id="boton0">0</button></td>
                    <td><button type="button" class="btn btn-primary" id="botonp">.</button></td>
                </tr>
                <tr>

                    <td><button type="button" class="btn btn-primary" id="boton+">+</button></td>
                    <td colspan="2"><button type="button" class="btn btn-primary" id="botone"><---</button></td>

                </tr>

            </tbody>
        </table>
    </div>
</div>