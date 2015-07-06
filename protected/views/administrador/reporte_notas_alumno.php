

<div class="row" id="div_asistencia_ad">

    <div class="col-md-12 col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <center><h3>REPORTE DE NOTAS BIMESTRAL</h3></center>
            </div>
            <div class="panel-body">
                <ul class="nav nav-tabs">
                    <li class="active" id="lk_seleccionaralumno"><a href="#tab_seleccionaralumno"  data-toggle="tab">Seleccionar alumno</a>
                    </li>
                    <li class="" id="lk_verreportenotasbimestral"><a href="#tab_verreportenotasbimestral"  data-toggle="tab">Ver Reporte Bimestral</a>
                    </li>
                    <li class=""  id="lk_verreportenotasanual"><a href="#tab_verreportenotasanual" data-toggle="tab">Ver Reporte Anual</a>
                    </li>
                    
                    
                    <li class=""><a href="#tab_verreportebimestrepuesto" id="lk_verreportebimestrepuesto" data-toggle="tab">Ver Reporte </a>
                    </li>


                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade active in" id="tab_seleccionaralumno">

                        <div class="container-fluid">

                            <div class="row" >

                                <br>

                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" id="estatusEjecucion">

                                </div>

                            </div>

                            <br>

                            <!--PARA LOS FILTROS-->
                            <div class="row" >  
                                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5" id="div_to_GeneraAsistencia">
                                    <input type="email" class="form-control" id="txtNombresYapellidos_rna_ad" title="Escriba un fragmento del nombre o apellidos, luego presione ENTER"
                                           placeholder="Escriba nombre o apellido, luego presione ENTER">
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                    <select class="form-control" id="cbnivel_rna_ad" >

                                    </select>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" >
                                    <select class="form-control" id="cbgrado_rna_ad" >

                                        <option value="0">Grados/años</option>

                                    </select>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" >
                                    <select class="form-control" id="cbseccion_rna_ad" >

                                        <option value="0">Secciones</option>

                                    </select>
                                </div>
                            </div>

                            <br>
                            <br>
                            <div class="row" >
                                <div class="col-lg-12">
                                    <div class="table-responsive" id="cargaTablaListaAlumnos_rna_ad" ></div>
                                </div>

                            </div>
                            <br>
                            
                              <form id="frGeneraReporteBimestralll" method="post" action="<?php echo Yii::app()->request->baseUrl . '/administrador/Cargareportebimstralalumno'?>"> 
                              </form>

                        </div>

                    </div>





                    <div class="row tab-pane fade" id="tab_verreportenotasbimestral">
                        <div class="container-fluid">

                            <br>

                            <br>

                            <div class="row">

                                <div class="col-lg-12 ">

                                    <!--<iframe id="ifreportebimestra_rna_ad"  src="administrador/cargareportebimstralalumno" width="100%" height="500px" ></iframe>-->


<!--                                    <div class="embed-responsive " >

                                        <iframe id="ifreportebimestra_rna_ad" class="embed-responsive-item" src="administrador/cargareportebimstralalumno" width="100%" height="500px" allowfullscreen></iframe>

                                    </div>-->
                                </div>
                                <!--<iframe id="ifreportebimestra_rna_ad" class="embed-responsive-item col-lg-12" src="administrador/cargareportebimstralalumno" width="100%" height="500px"></iframe>-->
                            </div>
                        </div>
                    </div>




                    <div class="row tab-pane fade" id="tab_verreportenotasanual">

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
                    
                    
                    
                    <div class="tab-pane fade  in" id="tab_verreportebimestrepuesto">

                        <div class="container-fluid">

                            <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <!--AGREGADO NUEVO HOY-->
                                    <hr>
                                    <div class="container-fluid">
                                        <div class="row">
                                            
                                            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" >

                                                <select class="form-control" id="cbbimestre_reportebimestre_bp" >
                                                    <option value="">Todos los bimestres</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                </select>
                                            </div>
                                            
                                            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" >

                                                <select class="form-control" id="cbnivel_reportebimestre_bp" >
                                                    <option value="">Todos los niveles</option>
                                                    <option value="Inicial">Inicial</option>
                                                    <option value="Primaria">Primaria</option>
                                                    <option value="Secundaria">Secundaria</option>

                                                </select>
                                            </div>

                                            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" >
                                                <select class="form-control" id="cbgrado_reportebimestre_bp" >

                                                    <option value="">Todos los grados</option>
                                                    <option value="Primero">Primero</option>
                                                    <option value="Segundo">Segundo</option>
                                                    <option value="Tercero">Tercero</option>
                                                    <option value="Cuarto">Cuarto</option>
                                                    <option value="Quinto">Quinto</option>

                                                </select>
                                            </div>

                                            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" >
                                                <select class="form-control" id="cbseccion_reportebimestre_bp" >

                                                    <option value="">Seleccione secciÃ³n</option>
                                                    <option value="1">A</option>

                                                </select>
                                            </div>
                                            <div> &nbsp; </div>
                                            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                                <input type="button" value="Mostrar" id="btnMostrarReportePuestos" class="btn btn-success" disabled="true">
                                            </div>

                                        </div>
                                        <br>

                                        <div class="row" >

                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="divPreviewReporteBimestreNotasPuesto">

                                            </div>
                                        </div>
                                    </div>
                                    <!--FINAL NUEVO HOY-->





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

