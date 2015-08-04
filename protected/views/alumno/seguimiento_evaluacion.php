
<div class="row">



    <div class="col-md-12 col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <center><h3>SEGUIMIENTO DE EVALUACIONES</h3></center>
            </div>
            <div class="panel-body">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#vernotas" id="tab_asistencia" data-toggle="tab">Ver Notas</a>   </li>


                </ul>

                <div class="tab-content">

                    <br>
                    <br>

                    <div class="tab-pane fade active in" id="vernotas">

                        <div class="container-fluid">

                            <br>

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" >
                                    <select class="form-control" id="cbareaalumno_se_al" >

                                        <option value="0">Seleccione área ...</option>

                                        <?php
                                        foreach ($dataareasalumno as $fila) {
                                            echo '<option value="' . $fila['idarea'] . '">' . $fila['area'] . '</option>';
                                        }
                                        ?>

                                    </select>
                                </div>

                            </div>

                            <br>

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" >
                                    <select class="form-control" id="cbbimestrearea_se_al">

                                        <option value="0">Seleccione bimestre ...</option>
                                        <option value="1">Bimestre 1</option>
                                        <option value="2">Bimestre 2</option>
                                        <option value="3">Bimestre 3</option>
                                        <option value="4">Bimestre 4</option>

                                    </select>
                                </div>

                            </div>

                            <br>

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
                                    <div class="table-responsive" id="cargaTablaEvaluaciones_se_al"></div>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>