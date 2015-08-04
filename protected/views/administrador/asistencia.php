

<div class="row" id="div_asistencia_ad">

    <div class="col-md-12 col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <center><h3>ASISTENCIA DE  ALUMNOS</h3></center>
            </div>
            <div class="panel-body">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tabtomaasistencia_asistencia_ad" id="tab_asistencia" data-toggle="tab">Tomar Asistencia</a>
                    </li>
                    <li class=""><a href="#tabeditaasistencia_asistencia_ad" id="tab_editarAsistencia" data-toggle="tab">Editar Asistencia</a>
                    </li>
                    <li class=""><a href="#tabreporteasistencia_asistencia_ad" id="tab_reporteAsistencia" data-toggle="tab">Reporte Asistencia</a>

                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade active in" id="tabtomaasistencia_asistencia_ad">

                        <div class="container-fluid">

                            <div class="row" >

                                <br>
                                <br>

<!--                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" id="div_anio">
                                    <select class="form-control" id="cbanio_asis">

                                        <option value="0">Seleccione año ..</option>
                                        <option value="2015">2015</option>

                                    </select>
                                </div>-->

                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" id="div_mes">

                                    <select class="form-control" id="cbfechas">

                                        <option value="0">Seleccione fecha ...</option>

                                    </select>

                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="estatusEjecucion">

                                </div>

                            </div>

                            <br>

                            <!--PARA LOS FILTROS-->
                            <div class="row" >  
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="div_to_GeneraAsistencia">
                                    <input type="email" class="form-control" id="txtNombresYapellidos_asis" disabled="true"
                                           placeholder="Escriba nombre o apellido, luego presione ENTER">
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" id="div_to_GeneraAsistencia">

                                    <select class="form-control" id="cbnivel_asis" disabled="true">

                                        <option value="0">Todos los niveles</option>
                                        <option value="Inicial">Inicial</option>
                                        <option value="Primaria">Primaria</option>
                                        <option value="Secundaria">Secundaria</option>

                                    </select>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" id="div_to_GeneraAsistencia">
                                    <select class="form-control" id="cbgrado_asis" disabled="true">

                                        <option value="0">Todos los grados</option>

                                    </select>
                                </div>
                            </div>

                            <br>
                            <br>
                            <div class="row" >
                                <div class="col-lg-12">
                                    <div class="table-responsive" id="cargaTablaAsistencia" ></div>
                                </div>

                            </div>
                            <br>

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 " id="div_to_GeneraAsistencia">
                                <?php
                                if ($_SESSION['rol'] != "tutor")
                                    echo '<input type="button" value="Confirmar Asistencias" id="btnConfirmarAsistencias" class="btn btn-success">';
                                ?>
                            </div>

                        </div>

                    </div>





                    <div class="row tab-pane fade" id="tabeditaasistencia_asistencia_ad">
                        <div class="container-fluid">

                            <br>

                            <div class="row" id="muestracbfechas">

                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">

                                    <select class="form-control" id="cbfechas_ediasis_ad">

                                        <option value="0">Seleccione fecha ...</option>

                                    </select>


                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">

                                    <div class="row" id="divstatus_ediasis_ad"></div>


                                </div>

                            </div>



                            <br>

                            <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="div_to_GeneraAsistencia">
                                    <input type="email" class="form-control" id="txtNombresYapellidos_ediasis_ad" disabled="true"
                                           placeholder="Escriba nombre o apellido, luego presione ENTER">
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" id="">

                                    <select class="form-control" id="cbnivel_ediasis_ad" disabled="true">

                                    </select>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" id="">
                                    <select class="form-control" id="cbgrado_ediasis_ad" disabled="true">

                                    </select>
                                </div>

                            </div>
                            
                            <br>

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
                                    <div class="table-responsive" id="div_to_GeneraTablaEditAsistencia">

                                    </div>
                                </div>
                            </div>

                        </div>


                    </div>









                    <div class="row tab-pane fade" id="tabreporteasistencia_asistencia_ad">

                        <hr>
                        <div class="container-fluid">

                            <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="div_to_GeneraAsistencia">

                                    <div class="form-group">
                                        <label>Tipo de Reporte</label>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="tiporeporte" id="optionsRadios1" value="diario" checked="">Reporte diario
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="tiporeporte" id="optionsRadios2" value="mensual">Reporte Mensual
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br>

                            <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" id="div_anio">
                                    <select class="form-control" id="cbanio2_asis">

                                        <option value="0">Seleccione año ..</option>
                                        <option value="2015">2015</option>

                                    </select>
                                </div>

                            </div>

                            <br>

                            <div class="row" id="muestracbfechasReporte">

                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">

                                    <select class="form-control" id="cbfechas2">

                                        <option value="0">Seleccione fecha ...</option>

                                    </select>
                                </div>

                            </div>


                            <div class="row" id="muestracbmeses" style="display: none"> 

                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                                    <select class="form-control" id="cbmes">

                                        <option value="0">Seleccione mes ...</option>
                                        <option value="1">Enero</option>
                                        <option value="2">Fefrero</option>
                                        <option value="3">Marzo</option>
                                        <option value="4">Abril</option>
                                        <option value="5">Mayo</option>
                                        <option value="6">Junio</option>
                                        <option value="7">Julio</option>
                                        <option value="8">Agosto</option>
                                        <option value="9">Setiembre</option>
                                        <option value="10">Octubre</option>
                                        <option value="11">Noviembre</option>
                                        <option value="12">Diciembre</option>

                                    </select>
                                </div>
                            </div>
                            <br>

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" id="div_to_GeneraAsistencia">

                                    <select class="form-control" id="cbnivel2_asis" disabled="true">

                                        <option value="0">Todos los niveles</option>
                                        <option value="Inicial">Inicial</option>
                                        <option value="Primaria">Primaria</option>
                                        <option value="Secundaria">Secundaria</option>

                                    </select>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" id="div_to_GeneraAsistencia">
                                    <select class="form-control" id="cbgrado2_asis" disabled="true">

                                        <option value="0">Todos los grados</option>

                                    </select>
                                </div>

                            </div>
                            
                            <br>

                            <div class="row" >

                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="div_to_GeneraAsistencia">
                                    <form id="frmReporteAsistencia_adm" action="<?php echo Yii::app()->request->baseUrl . '/administrador/ReporteAsistencias'; ?>" method="POST">
                                        <input type="button" value="Generar Reporte" id="btnGeneraReporteAsistencia_ad" class="btn btn-success">
                                        <input type="hidden" value=""  name="idanio"  id="inputanio">
                                        <input type="hidden" value=""   name="fecha" id="inputfecha">
                                        <input type="hidden" value="" name="nivel" id="inputnivel">
                                        <input type="hidden" value=""  name="grado" id="inputgrado">
                                        <input type="hidden" value="" name="seccion" id="inputseccion">
                                        <input type="hidden" value=""  name="tipo" id="inputtipo">
                                        <input type="hidden" value=""  name="mes" id="inputmes">
                                        <input type="hidden" value=""  name="nombremes" id="inputnombremes">
                                        <input type="hidden" value=""  name="letraseccion" id="inputletraseccion">
                                    </form>
                                </div>

                            </div>

                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>


</div>



<!--PARA LA ADVERTENCIA VENTANA AGREGA JUSTIFICACION-->
<div class="modal  fade in " id="modaljustificacionfalta_asistencia_ad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" >

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close " data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 id="lbEncabezadoAlert">JUSTIFICACIÓN</h4>

            </div>

            <div class="modal-body">
                <div class="row">
                    <label class="col-lg-12 control-label">Escriba la justifiación correpondiente a este alumno:</label>
                </div>
                <div class="row">
                    <textarea id="txtareajustifacion_asistencia_ad" class="form-control" rows="5"></textarea>               
                </div>

            </div>
            <div class="modal-footer">
                <button type="button"  class="btn btn-success" id="btnConfirmJustificacion_asistencia_ad" disabled="true">Aceptar</button>
                <button type="button" data-dismiss="modal" class="btn btn-success">Cancelar</button>
            </div> 
        </div>
    </div>
</div>  
<!--FIN PARA LA ADVERTENCIA-->

