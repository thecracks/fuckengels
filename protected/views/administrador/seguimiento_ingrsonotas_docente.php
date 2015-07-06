

<div class="row" id="div_seguimiento_ingresonotasdocente_ad">

    <div class="col-md-12 col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <center><h3>SEGUIEMIENTO DE INGRESO DE NOTAS POR DOCENTE</h3></center>
            </div>
            <div class="panel-body">
                <ul class="nav nav-tabs">

                    <li class="active" id="li_sid_ad_1"><a href="#tab_sid_ad_1" id="" data-toggle="tab">Lista Docentes</a>
                    </li>

                    <li class="" id="li_sid_ad_2"><a href="#tab_sid_ad_2" id="" data-toggle="tab">Lista Cursos Asignados</a>
                    </li>
                    <li class="" id="li_sid_ad_3"><a href="#tab_sid_ad_3" id="" data-toggle="tab">Ver registro de notas</a>
                    </li>
                    <li class="deshabilitado" id="li_reportenotas_sid_ad"><a href="#tabreportenotas_sid_ad" id="" data-toggle="tab">Reporte Notas</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade active in" id="tablistadocentes_sid_ad">

                        <div class="container-fluid">

                            <br>

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
                                    <label class="control-label" >Seleccione el docente: </label>
                                </div>
                            </div>
                            <br>

                            <div class="row" >
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="table-responsive" id="div_cargaTablalistadocentes" ></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--SEGUNDA PESTAÑA-->


                    <div class="row tab-pane fade" id="tabseleccionacursoasignado_sid_ad">
                        <div class="container-fluid">

                            <br>

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
                                    <label id="lbnombredocente_sid_ad" class="control-label">Docente:</label>
                                </div>
                            </div>
                            <br>

                            <div class="row">
                                <!--style=" font-size: 10px" style=" font-size: 10px"-->
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
                                    <div class="table-responsive" id="cargatablacursosasignados_sid_ad"></div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!--TERCERA PESTAÑA-->

                    <div class="row tab-pane fade" id="tabreportenotas_rn_do">

                        <div class="container-fluid">

                            <br>

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" >
                                    <select class="form-control" id="cbbimestrecurso_sid_ad" disabled="true">

                                        <option value="0">Seleccion bimestre ...</option>
                                        <option value="1">Bimestre 1</option>
                                        <option value="2">Bimestre 2</option>
                                        <option value="3">Bimestre 3</option>
                                        <option value="4">Bimestre 4</option>

                                    </select>
                                </div>
                            </div>


                            <div class="row">
                                <!--style=" font-size: 10px" style=" font-size: 10px"-->
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
                                    <div class="table-responsive" id="cargatablanotasbimestral_sid_ad"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


