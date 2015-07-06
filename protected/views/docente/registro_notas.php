

<div class="row" id="div_registronotas_ad">

    <div class="col-md-12 col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <center><h3>REGISTRO DE NOTAS</h3></center>
            </div>
            <div class="panel-body">
                <ul class="nav nav-tabs">
                    <li class="active" id="li_seleccionacurso_rn_do"><a href="#tabseleccionacursoasignado_rn_do" id="" data-toggle="tab">Selecciona Curso</a>
                    </li>
                    <li class="deshabilitado" id="li_registranota_rn_do"><a href="#tabregistranotas_rn_do" id="" data-toggle="tab">Registro Notas</a>
                    </li>
                    <li class="deshabilitado" id="li_reportenota_rn_do"><a href="#tabreportenotas_rn_do" id="" data-toggle="tab">Reporte Notas</a>

                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade active in" id="tabseleccionacursoasignado_rn_do">

                        <br>
                        <div class="container-fluid">

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
                                    <label class="control-label" >Seleccione el curso requerido: </label>
                                </div>
                            </div>
                            <br>



                            <div class="row" >
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="CargaContenido2">
                                    <div class="table-responsive" id="div_cargaTablaSeleccionarCurso" ></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row tab-pane fade" id="tabregistranotas_rn_do">
                        <div class="container-fluid">
                            <br>

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" >
                                    <select class="form-control" id="cbbimestrecurso_rn_do" disabled="true">

                                        <option value="0">Seleccion bimestre ...</option>
                                        <option value="1">Bimestre 1</option>
                                        <option value="2">Bimestre 2</option>
                                        <option value="3">Bimestre 3</option>
                                        <option value="4">Bimestre 4</option>

                                    </select>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" >

                                    <button id="btnseleccionarotrocurso_rn_do1" class="btn btn-success">Seleccionar otro curso</button>

                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" >

                                    <button id="btnimprimirtablanotas_rn_do" class="btn btn-success">Imprimir Tabla Notas</button>

                                </div>
                            </div>

                            <br>

                            <div class="row">
                                
                                
                                
                                
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
                                    <div class="table-responsive" id="cargaTablaNotasBimestral" style=" font-size: 10px"></div>

                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row tab-pane fade" id="tabreportenotas_rn_do">

                        <hr>
                        <div class="container-fluid">

                            <br>


                            <div class="row" >

                                <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" >
                                    <form id="frmReporteAsistencia_adm" action="<?php echo Yii::app()->request->baseUrl . '/docente/carga_pdf_reportes_x_bimestre'; ?>" method="POST">
                                        <input type="submit" value="Generar Reporte de Promedios" id="btnGeneraReporteAsistencia_ad" class="btn btn-success">

                                    </form>
                                </div>

                            </div>
                            <br>

                            <div class="row" >



                                <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" >

                                    <button id="btnseleccionarotrocurso_rn_do2" class="btn btn-success">Seleccionar otro curso</button>

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

