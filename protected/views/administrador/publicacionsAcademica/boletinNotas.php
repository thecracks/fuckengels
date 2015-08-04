<!--NUEVO 27-03-15-->

<div class="modal fade in " id="modal_agregar_PDF_boletin" tabindex="-1"   aria-hidden="true"
     data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>Agregar Archivo PDF</h3>
            </div>
            <form enctype="multipart/form-data" id="formularioPDF">
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-3">
                        <label class="control-label">Seleccione Archivo PDF</label>                                           
                    </div>
                    
                    <div class="col-lg-9">
                        <input type="file"  id="archivo" >
                        <input type="hidden" id="txtIDalumnoFoto" >
                    </div>
                </div>

            </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="aceptarPDFboletin">GUARDAR</button>
                <!--<input type="submit" name="GUARDAR">-->
                <button type="button" data-dismiss="modal" class="btn btn-primary">CANCELAR</button>
            </div>

        </div>
    </div>
</div>

<!--FIN 27-03-15-->


<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="panel panel-default">

            <div class="panel-body">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#home" data-toggle="tab">Registrar Boletin Notas</a>
                    </li>
                    <li class=""><a href="#listaBoletinNotas" data-toggle="tab">Listar Boletin Notas</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade active in" id="home">
                        <div class="container-fluid">
                            <div class="row" id="registroAreasAcademicas">
                                <div class="col-lg-12">
                                    <center><h3> Registro Boletin Notas </h3></center>
                                    <hr />
                                    
                                    <div class="row">
                                        <label class="col-lg-1 control-label"></label>
                                        <label class="col-lg-3 control-label">Nivel</label>
                                        <div class="col-lg-6">
                                            <select class="form-control" required="required" id="idNivelBoletin">
                                                <option value=""> -- Seleccione Nivel -- </option>
                                                <option value="Inicial"> Incial </option>
                                                <option value="Primaria"> Primaria </option>
                                                <option value="Secundaria"> Secundaria </option>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <label class="col-lg-1 control-label"></label>
                                        <label class="col-lg-3 control-label">Grado</label>
                                        <div class="col-lg-6">
                                            <select class="form-control" required="required" id="idGradoBoletin">
                                                <option value=""> -- Seleccione Grado -- </option>
                                                <option value="Primero"> Primero </option>
                                                <option value="Segundo"> Segundo </option>
                                                <option value="Tercero"> Tercero </option>
                                                <option value="Cuarto"> Cuarto </option>
                                                <option value="Quinto"> Quinto </option>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <label class="col-lg-1 control-label"></label>
                                        <label class="col-lg-3 control-label">Sección</label>
                                        <div class="col-lg-6">
                                            <select class="form-control" required="required" id="idSeccionmBoletin">
                                                <option value=""> -- Seleccione Sección -- </option>
                                                <option value="1"> A </option>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                
                                    <div class="row">
                                        <label class="col-lg-5 control-label"></label>
                                        <input  type="button" value="Cargar documento PDF" id="btnCargarBoletinNotaPDF" class="btn btn-success autoajustable">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    
                    <div class="row tab-pane fade" id="listaBoletinNotas">
                        <div class="container-fluid">
                            <div class="panel-body">
                                <div class="row">
                                    <label class="col-lg-1 control-label">Nivel</label>
                                    <div class="col-lg-3">
                                        <select class="form-control" required="required" id="idNivelBoletinE">
                                            <option value=""> -- Seleccione Nivel -- </option>
                                            <option value="Inicial"> Incial </option>
                                            <option value="Primaria"> Primaria </option>
                                            <option value="Secundaria"> Secundaria </option>
                                        </select>
                                    </div>

                                    <label class="col-lg-1 control-label">Grado</label>
                                    <div class="col-lg-3">
                                        <select class="form-control" required="required" id="idGradoBoletinE">
                                            <option value=""> -- Seleccione Grado -- </option>
                                            <option value="Primero"> Primero </option>
                                            <option value="Segundo"> Segundo </option>
                                            <option value="Tercero"> Tercero </option>
                                            <option value="Cuarto"> Cuarto </option>
                                            <option value="Quinto"> Quinto </option>
                                        </select>
                                    </div>

                                    <label class="col-lg-1 control-label">Sección</label>
                                    <div class="col-lg-3">
                                        <select class="form-control" required="required" id="idSeccionmBoletinE">
                                            <option value=""> -- Seleccione Sección -- </option>
                                            <option value="1"> A </option>
                                        </select>
                                    </div>
                                    <div>&nbsp;</div>
                                    <label class="col-lg-5 control-label"></label>
                                    <div class="col-lg-6">
                                        <input type="button" value="Mostrar" id="btnMostrarSPDF" class="btn btn-success" disabled="true">
                                    </div>

                                </div>
                            </div>
                        </div>
                        <hr />
                        <div class="container-fluid">
                            <div class="panel-heading">
                                <center><h3>Lista de Boletines de Notas</h3></center>
                            </div>

                            <div class="panel-body">
                                <div class="table-responsive" id="divPreviewPDF">
                                 
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<br>