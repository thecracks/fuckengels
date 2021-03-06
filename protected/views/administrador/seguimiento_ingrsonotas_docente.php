

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
                    <div class="tab-pane fade active in" id="tab_sid_ad_1">

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


                    <div class="row tab-pane fade" id="tab_sid_ad_2">
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
                </div>


                <!--TERCERA PESTAÑA--> 


                <div class="row tab-pane fade" id="tab_sid_ad_3">
                    <div class="container-fluid">
                        <br>

                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" >
                                <select class="form-control" id="cbbimestrecurso_sid_ad">

                                    <option value="0">Seleccion bimestre ...</option>
                                    <option value="1">Bimestre 1</option>
                                    <option value="2">Bimestre 2</option>
                                    <option value="3">Bimestre 3</option>
                                    <option value="4">Bimestre 4</option>

                                </select>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" >
                                <button id="btn_generaexcelnotasxcursoxbimestre" class="btn btn-success">Descargar Excel</button>
                            </div>
                        </div>
                        <form id="frmReporte_Notas_excel_sid" action="<?php echo Yii::app()->request->baseUrl . '/administrador/Ajax_carga_notasbimestre'; ?>" method="POST">
                            <input type="hidden" value="" id="input_idcurso_sid" name="idcurso">
                            <input type="hidden" value="" id="input_idbimestre_sid" name="bimestre">
                            <input type="hidden" value="excel"  name="opcion">

                        </form>

                        <br>

                        <div class="row">

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
                                <div class="table-responsive" id="cargaTablaNotasBimestral_ad" style=" font-size: 10px"></div>

                            </div>
                        </div>
                    </div>
                </div>



                <!--
                
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
                
                
                                </div>-->

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

