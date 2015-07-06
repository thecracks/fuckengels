

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <center> CONFIGURACIÓN DE FILIAL</center>
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
                                <label class="control-label" >Seleccione los respectivos niveles, grados, y cantidad de secciones que se van a llevar de acuerdo a cada filial: </label>
                            </div>
                            <br>


                            <div class="row" >

                                <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" id="div_anio">
                                    <label class="control-label" >Seleccione filial: </label>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" >
                                    <select class="form-control" id="cbfilial_di_ad">
                                        <option value="0">Seleccione filial ..</option>
                                        <?php
                                        foreach ($filiales as $value) {
                                            echo ' <option value = "' . $value['idfilial'] . '">' . $value['Distrito'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                    <button type="text" class="btn btn-success" id="btnlistarDI_di_ad">Lista datos previos</button>
                                </div>

                            </div>
                            <hr>


                            <div class="row" >
                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" >
                                    <select class="form-control" id="cbnivel_di_ad">
                                        <option value="0">Seleccione nivel ..</option>
                                        <option value="Inicial">Inicial</option>
                                        <option value="Primaria">Primaria</option>
                                        <option value="Secundaria">Secundaria</option>
                                    </select>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" >
                                    <select class="form-control" id="cbgrado_di_ad">
                                        <option value="0">Seleccione grado/año ..</option>

                                    </select>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                                    <input type="number" placeholder="Nro. Secciones" class="form-control bfh-number" id="txtNsecciones_di_ad">
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                                    <button type="text" class="btn btn-success" id="btnagregardi_di_ad">Agregar</button>
                                </div>
                            </div>

                            <hr>

                            <!--PARA LOS FILTROS-->

                            <div class="row" >

                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="div_estadoacciondi_ad" >

                                </div>

                            </div>

                            <div class="row" >
                                <div class="col-lg-12" >
                                    <div class="table-responsive" id="cargaTablaDetalleInstitucional">

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