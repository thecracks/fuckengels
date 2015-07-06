


<div class="modal fade in " id="modal_matricularAlumno_ad" tabindex="-1"   aria-hidden="true"
     data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                <h4>MATRÍCULAS <?= date('Y') ?></h4>

            </div>

            <div class="modal-body">
                <div class="row">
                    <label class="col-lg-3 control-label">Nombre</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" id="txtnombres"  >
                    </div>
                </div>
                <br>
                <div class="row">
                    <label class="col-lg-3 control-label">Tipo de matrícula</label>
                    <div class="col-lg-6">
                        <select class="form-control" id="cbTipoMatricula">

                            <?php
                            date_default_timezone_set('America/Lima');

                            $reg = "";
                            $tra = "";

                            if (date("m") <= 3) {
                                $reg = "selected";
                            } else {
                                $tra = "selected";
                            }
                            ?>
                            <option value="0" <?= $reg ?>>Seleccione tipo matrícula ...</option>
                            <option value="Regular" <?= $reg ?>>Regular</option>
                            <option value="Traslado" <?= $tra ?>>Traslado</option>
                            <option value="Condicional">Condicional</option>

                        </select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <label class="col-lg-3 control-label">Filial</label>
                    <div class="col-lg-6">
                        <select class="form-control" id="cbfilial">

                            <option value="0">Seleccione año ..</option>
                            <option value="1">El porvenir</option>

                        </select>
                    </div> 
                </div>
                <br>
                <div class="row">
                    <label class="col-lg-3 control-label"> Nivel </label>
                    <div class="col-lg-6">
                        <select class="form-control" id="cbnivel">

                            <option value="0">Seleccione nivel ..</option>
                            <option value="Inicial">Inicial</option>
                            <option value="Primaria">Primaria</option>
                            <option value="Secundaria">Secundaria</option>

                        </select>                          
                    </div>
                </div>
                <br>
                <div class="row">
                    <label class="col-lg-3 control-label"> Grado/Año </label>
                    <div class="col-lg-6">
                        <select class="form-control" id="cbgrado">

                            <option value="0">Seleccione grado/año ..</option>

                        </select>
                    </div>
                </div> 
                <br>
                <div class="row">
                    <label class="col-lg-3 control-label">Sección </label>
                    <div class="col-lg-6">
                        <select class="form-control" id="cbseccion">

                            <option value="0">Seleccione sección ..</option>
                            <option value="1">A</option>

                        </select>
                    </div>
                </div> 
                <br>

                <div class="row">
                    <label class="col-lg-3 control-label">Cod. Comprobante Matricula</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" id="txt_codComprobanteMatricula_ad" placeholder="Código de comprobante de pago"  >
                    </div>
                </div>
                <br>

                <div class="row">

                    <label class="col-lg-3 control-label">Fecha</label>
                    <?php $fecha = date('d-m-Y'); ?>
                    <label class="col-lg-6 control-label" id="lb_fechaMatricula_ad"><?= $fecha ?></label>

                </div>
                <br>

            </div>
            <div class="modal-footer">
                <button type="button"  class="btn btn-primary" id="btnmatricular">MATRICULAR</button>
                <button type="button" data-dismiss="modal" class="btn btn-primary">CANCELAR</button>
            </div>

        </div>
    </div>
</div>












<div class="modal fade in " id="modal_HTML_ALUMNO_TUTOR_ad" tabindex="-1"   aria-hidden="true"
     data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                <h2>ENGELS CLASS</h2>

            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12" ID="html_alumno_tutor">

                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-primary">ACEPTAR</button>
            </div>

        </div>
    </div>
</div>










<div class="row" id="tengoelfoco">
    <div class="col-md-12 col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <center> MATRÍCULA ALUMNO</center>
            </div>

            <div class="panel-body">

                <ul class="nav nav-tabs">
                    <li class="active"><a href="#matricula_alumno_ad" data-toggle="tab">Matrícula Alumnos</a>
                    </li>
                    <!--                    <li class=""><a href="#listado_alumnosmatriculados_ad" data-toggle="tab">Listado de Alumnos Matriculados</a>
                                        </li>-->
                    <li class=""><a href="#reporte_alumnosmatriculados_ad" data-toggle="tab">Reportes</a>
                    </li>

                    <!--NUEVO AGREGADO-->
                    <li class=""><a href="#reporte_alumnosmatriculadosTutor_ad" data-toggle="tab">Reportes Alumno - Padres</a>
                    </li>
                    <!--FIN AGREGADO--->

                </ul>
                <br>


                <div class="tab-content">

                    <!--PARA EL REGISTRO DE ALUMNOSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS-->

                    <div class="tab-pane fade active in" id="matricula_alumno_ad">

                        <div class="container-fluid">

                            <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                                    <div class="row" >

                                        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" id="div_anio">
                                            <label class="control-label" >Año académico: </label>
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" id="div_anio">
                                            <select class="form-control" id="cbanio">

                                                <option value="0">Seleccione año ..</option>
                                                <option value="2015">2015</option>

                                            </select>
                                        </div>

                                    </div>

                                    <br>

                                    <!--PARA LOS FILTROS-->
                                    <div class="row" >
                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" >
                                            <input type="email" class="form-control" id="txtNombresYapellidos" disabled="true"
                                                   placeholder="Por Nombre O apellido">
                                        </div>

                                    </div>

                                    <br>
                                    <br>
                                    <div class="row" >

                                        <div class="col-lg-12" >

                                            <div class="table-responsive " id="cargaTablaMatricula">

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>





                    <div class="row tab-pane fade" id="listado_alumnosmatriculados_ad">

                        <div class="container-fluid">

                            <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                    <select class="form-control" id="cbanio_matricula_ad">

                                        <option value="0">Seleccione año ..</option>
                                        <option value="2015">2015</option>

                                    </select>
                                </div>

                            </div>

                            <br>

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" id="div_to_GeneraAsistencia">

                                    <select class="form-control" id="cbnivel_listadomatriculados_ad" >

                                    </select>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" id="div_to_GeneraAsistencia">
                                    <select class="form-control" id="cbgrado_listamatriculados_ad" >

                                    </select>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" id="div_to_GeneraAsistencia">
                                    <select class="form-control" id="cbseccion_listadomatriculados_ad" >

                                        <option value="0">Seleccione sección</option>
                                        <option value="1">A</option>

                                    </select>
                                </div>

                            </div>

                            <br>

                            <div class="row"  >
                                <div class="col-lg-12" >
                                    <div class="table-responsive" id="divPreviewReporteMatricula_al">
                                        s
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>





                    <div class="row tab-pane fade" id="reporte_alumnosmatriculados_ad">

                        <div class="container-fluid">

                            <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" id="div_anio">
                                    <select class="form-control" id="cbanio_matricula_ad">

                                        <option value="0">Seleccione año ..</option>
                                        <option value="2015">2015</option>

                                    </select>
                                </div>

                            </div>

                            <br>

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" id="div_to_GeneraAsistencia">

                                    <select class="form-control" id="cbnivel_matriculas_ad" >

                                        <option value="0">Todos los niveles</option>
                                        <option value="Inicial">Inicial</option>
                                        <option value="Primaria">Primaria</option>
                                        <option value="Secundaria">Secundaria</option>

                                    </select>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" id="div_to_GeneraAsistencia">
                                    <select class="form-control" id="cbgrado_matriculas_ad" >

                                        <option value="0">Todos los grados</option>

                                    </select>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" id="div_to_GeneraAsistencia">
                                    <select class="form-control" id="cbseccion_matriculas_ad" >

                                        <option value="0">Seleccione sección</option>
                                        <option value="1">A</option>

                                    </select>
                                </div>

                            </div>

                            <br>


                            <div class="row" >

                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" id="div_to_GeneraReporteMatricula">
                                    <form id="frmReporteMatriculas_adm" action="<?php echo Yii::app()->request->baseUrl . '/administrador/ReporteMatriuculados'; ?>" method="POST">
                                        <input type="button" value="Generar Reporte" id="btnGeneraReporteMatricula" class="btn btn-success" disabled="true">
                                        <input type="hidden" value=""  name="idanio"  id="inputanio">
                                        <input type="hidden" value="0" name="nivel" id="inputnivel">
                                        <input type="hidden" value="0"  name="grado" id="inputgrado">
                                        <input type="hidden" value="0" name="seccion" id="inputseccion">
                                        <input type="hidden" value=""  name="letraseccion" id="inputletraseccion">
                                    </form>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" >
                                    <input type="button" value="Prevista" id="btnPreviewReporteMatricula" class="btn btn-success" disabled="true">

                                </div>

                            </div>

                            <br>

                            <div class="row"  >

                                <div class="col-lg-12" >
                                    <div class="table-responsive" id="divPreviewReporteMatricula_ad">

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
























                    <div class="tab-pane fade  in" id="reporte_alumnosmatriculadosTutor_ad">

                        <div class="container-fluid">

                            <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <!--                                    aca prueba-->

                                    <!--AGREGADO NUEVO HOY-->

                                    <hr>


                                    <div class="container-fluid">

                                        <div class="row">

                                            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" id="div_anio">
                                                <select class="form-control" id="cbanio_matriculaAlumnoTutor_ad">

                                                    <option value="0">Seleccione año ..</option>
                                                    <option value="2015">2015</option>

                                                </select>
                                            </div>

                                        </div>

                                        <br>

                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" id="div_to_GeneraAsistencia">

                                                <select class="form-control" id="cbnivel_matriculasAlumnoTutor_ad" >

                                                    <option value="0">Todos los niveles</option>
                                                    <option value="Inicial">Inicial</option>
                                                    <option value="Primaria">Primaria</option>
                                                    <option value="Secundaria">Secundaria</option>

                                                </select>
                                            </div>

                                            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" id="div_to_GeneraAsistencia">
                                                <select class="form-control" id="cbgrado_matriculasAlumnoTutor_ad" >

                                                    <option value="0">Todos los grados</option>

                                                </select>
                                            </div>

                                            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" id="div_to_GeneraAsistencia">
                                                <select class="form-control" id="cbseccion_matriculasAlumnoTutor_ad" >

                                                    <option value="0">Seleccione sección</option>
                                                    <option value="1">A</option>

                                                </select>
                                            </div>

                                        </div>

                                        <br>


                                        <div class="row" >

                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
                                                <form id="frmReporteMatriculasAlumnoTutor_adm" action="<?php echo Yii::app()->request->baseUrl . '/administrador/ReporteMatriuculadosAlumnoTutor'; ?>" method="POST">
                                                    <input type="button" value="Generar Reporte" id="btnGeneraReporteMatriculaAlumnoTutor" class="btn btn-success" disabled="true">
                                                    <input type="hidden" value=""  name="idanioAT"  id="inputanioAT">
                                                    <input type="hidden" value="0" name="nivelAT" id="inputnivelAT">
                                                    <input type="hidden" value="0"  name="gradoAT" id="inputgradoAT">
                                                    <input type="hidden" value="0" name="seccionAT" id="inputseccionAT">
                                                    <input type="hidden" value=""  name="letraseccionAT" id="inputletraseccionAT">
                                                </form>

                                                <br />


                                                <input type="button" value="Generar Reporte HTML" id="btnHTML_Alumno_Tutor" class="btn btn-success">



                                            </div>

                                        </div>

                                    </div>



                                    <!--FINAL NUEVO HOY-->





                                </div>
                            </div>
                        </div>
                    </div>

                    <!--FIN AGREGADO NUEVO 11-03-15 -->



















                </div>
            </div>
        </div>
    </div>
</div>


<!--<div class="row">


</div>-->



<br>
<br>
