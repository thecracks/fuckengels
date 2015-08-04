

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <center> ASIGNACIÓN CURSO - DOCENTE</center>
            </div>

            <div class="panel-body">

                <ul class="nav nav-tabs">
                    <li class="active"><a href="#configuracionFilial" data-toggle="tab">Configuración Filial </a>
                    </li>
                </ul>
                <br>


                <div class="tab-content">

                    <!--PARA LA CONFIGURACION DE LA FILIAL-->

                    <div class="tab-pane fade active in" id="configuracionFilial">

                        <div class="container-fluid">

                            <div class="row">
                                <label class="control-label" >Asigne el docente que dictará el curso seleccionado: </label>
                            </div>
                            <br>


                            <div class="row" >

                                <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" id="div_anio">
                                    <label class="control-label" >Seleccione filial: </label>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" >
                                    <select class="form-control" id="cbfilial_acd_ad">
                                        <option value="0">Seleccione filial ..</option>
                                        <?php
                                        foreach ($filiales as $value) {
                                            echo ' <option value = "' . $value['idfilial'] . '">' . $value['Distrito'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>

                                <!--                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                                                    <button type="text" class="btn btn-success" id="btnlistarDI_di_ad">Lista datos previos</button>
                                                                </div>-->

                            </div>
                            <hr>


                            <div class="row" >
                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" >
                                    <select class="form-control" id="cbnivel_acd_ad">
                                        <option value="0">Seleccione nivel ..</option>
                                        <option value="Inicial">Inicial</option>
                                        <option value="Primaria">Primaria</option>
                                        <option value="Secundaria">Secundaria</option>
                                    </select>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" >
                                    <select class="form-control" id="cbgrado_acd_ad">
                                        <option value="0">Seleccione grado/año ..</option>

                                    </select>
                                </div>
                                <!--                                <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                                                                    <input type="number" placeholder="Nro. Secciones" class="form-control bfh-number" id="txtNsecciones_di_ad">
                                                                </div>
                                                                <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                                                                    <button type="text" class="btn btn-success" id="btnagregardi_di_ad">Agregar</button>
                                                                </div>-->
                            </div>

                            <hr>

                            <!--PARA LOS FILTROS-->

                            <div class="row" >

                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="div_estadoacciondi_ad" >

                                </div>

                            </div>

                            <div class="row" >
                                <div class="col-lg-12" >
                                    <div class="table-responsive" id="cargaTablaAsignacionCursoDocente">

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>













<!-- Button trigger modal -->
<a data-toggle="modal" href="#myModal1" class="btn btn-primary btn-lg">Launch demo modal</a>

<!-- Modal -->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Modal title</h4>
            </div>
            <div class="modal-body">
                
                <div class="table-responsive">
                    
                    <table class="table-bordered table">
                        
                        <tr>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                        </tr>
                           
                        <tr>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                        </tr>
                           
                        <tr>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                        </tr>
                           
                        <tr>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                        </tr>
                           
                        <tr>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                        </tr>
                           
                        <tr>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                        </tr>
                           
                        <tr>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                        </tr>
                           
                        <tr>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                        </tr>
                           
                        <tr>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                        </tr>
                           
                        <tr>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                        </tr>
                           
                        <tr>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                        </tr>
                           
                        <tr>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                        </tr>
                           
                        <tr>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                        </tr>
                           
                        <tr>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                        </tr>
                           
                        <tr>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                        </tr>
                           
                        <tr>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                        </tr>
                           
                        <tr>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                        </tr>
                        
                        <tr>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                        </tr>
                        <tr>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                        </tr>
                        <tr>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                        </tr>
                        <tr>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                        </tr>
                        <tr>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                        </tr>
                        <tr>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                        </tr>
                        <tr>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                        </tr>
                        <tr>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                        </tr>
                        
                        <tr>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                        </tr>
                        <tr>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                        </tr>
                        <tr>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                            <td>holas</td>
                        </tr>
                        
                        
                        
                    </table>
                    
                </div>
                
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->






















<!--PARA LA ADVERTENCIA DE ELIMINACION DE DETEALLE INSTITUCIONAL MODALLLLLLLLLLLLLLLLLLLLL-->


































<div class="modal  fade in " id="modalEliminardi_ad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" 
     >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close " data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 id="lbEncabezadoAlert">ADVERTENCIA</h4>

            </div>

            <div class="modal-body">
                <div class="row">
                    <label id="" class="col-lg-12 control-label">¿Esta seguro que desea eliminar este elemento?</label>
                </div> 
                <br>

            </div>
            <div class="modal-footer">
                <button type="button"  class="btn btn-success" id="btnConfirmarEliminardi_ad">Aceptar</button>
                <button type="button" data-dismiss="modal" class="btn btn-primary">CANCELAR</button>
            </div> 
        </div>
    </div>
</div>  