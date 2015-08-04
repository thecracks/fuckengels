
<div class="row">



    <div class="col-md-12 col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <center><h3>CONFIGURACIÓN DE VISTA DE EVALUACIONES DE ALUMNO</h3></center>
            </div>
            <div class="panel-body">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#vernotas" id="tab_asistencia" data-toggle="tab">Configuracion vista</a>   </li>


                </ul>

                <div class="tab-content">

                    <br>
                    <br>

                    <div class="tab-pane fade active in" id="vernotas">

                        <div class="container-fluid">

                            <br>

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" >
                                    <select class="form-control" id="cbareaadministrador_cea_ad" >

                                        <option value="0">Seleccione área ...</option>

                                        <?php
                                        foreach ($dataareas as $fila) {
                                            echo '<option value="' . $fila['idarea'] . '">' . $fila['area'] . '</option>';
                                        }
                                        ?>

                                    </select>
                                </div>
                                
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="divstatus_visibilidadevaluacion_ad">
                                   
                                </div>
                            </div>

                            <br>

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
                                    <div class="table-responsive" id="cargaTablaEvaluaciones_cea_ad"></div>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>