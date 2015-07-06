<!--Modal Eliminar-->
<div id="modalEliminarFilial" class="modal fade" tabindex="-1" role="dialog"aria-labelledy="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hiddem="true">&times;</button>
                <h4>¿Esta seguro que desea eliminar?</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12" >
                        <div class="col-lg-4">
                            <label class="control-label">Filial</label>
                        </div>
                        <div class="col-lg-8">
                            <div id="txtFilialNombreNew_ad"></div>
                            <input type="hidden" id="txtIDFilialNew_ad">
                        </div>
                                               
                    </div>
                </div>
            </div>
            
            <div class="modal-footer">
                <input type="button" value="Eliminar" id="eliminarFilialSI" class="btn btn-primary">
                <button type="button" data-dismiss="modal" class="btn btn-primary">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!--Fin modal eliminar-->

<!--Modal Editar Filial-->
<div id="modalEditarFilial" class="modal fade" tabindex="-1" role="dialog"aria-labelledy="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hiddem="true">&times;</button>
                <h4>¿Seguro que desea cambiar?</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-lg-4">
                            <label class="control-label">Nombre Filial</label>
                        </div>
                        <div class="col-lg-8">
                            <input type="text" id="txtFilialNombreN_ad"  class="form-control">
                            <input type="hidden" id="txtIDFilialNew_ad"  >
                        </div>
                        
                        <div class="col-lg-4">
                            <label class="control-label">Dirección de Filial</label>
                        </div>
                        <div class="col-lg-8">
                            <input type="text" id="txtFilialDireccionNew_ad"  class="form-control">
                        </div>

                        <div class="col-lg-4">
                            <label class="control-label">Teléfono de Filial</label>
                        </div>
                        <div class="col-lg-8">
                            <input type="text" id="txtFilialTelefonoNew_ad"  class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="button" value="ACEPTAR" id="eFilialNew" class="btn btn-primary">
                <button type="button" data-dismiss="modal" class="btn btn-primary">CANCELAR</button>
            </div>
        </div>
    </div>
</div>
<!--Fin modal editar-->


<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="panel panel-default">

            <div class="panel-body">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#home" data-toggle="tab">Registrar Filial</a>
                    </li>
                    <li class=""><a href="#listaF" data-toggle="tab">Listar Filial</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade active in" id="home">
                        <div class="container-fluid">
                            <div class="row" id="registroAreasAcademicas">
                                <div class="col-lg-12">
                                    <center><h3> Registro de Filiales </h3></center>
                                    <hr />
                                    <div class="row">
                                        <label class="col-lg-1 control-label"></label>
                                        <label class="col-lg-3 control-label">Ubicación</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="txtFilial" placeholder="Ubicación de la Filial">
                                        </div>
                                    </div>
                                    <br />
                                    <div class="row">
                                        <label class="col-lg-1 control-label"></label>
                                        <label class="col-lg-3 control-label">Dirección</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="txtDireccion" placeholder="Dirección de la Filial">
                                        </div>
                                    </div>
                                    <br />
                                    <div class="row">
                                        <label class="col-lg-1 control-label"></label>
                                        <label class="col-lg-3 control-label">Teléfono</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="txtTelefono" placeholder="0 + Código + Teléfono">
                                        </div>
                                    </div>
                                    <br />
                                    <div class="row">
                                        <label class="col-lg-5 control-label"></label>
                                        <input  type="button" value="Guardar" id="btnGuardarFilial" class="btn btn-success autoajustable">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row tab-pane fade" id="listaF">
                        <div class="container-fluid">
                            <div class="panel-heading">
                                <center><h3>Lista de Filiales</h3></center>
                            </div>
                            <hr />
                            <div class="panel-body">
                                <table class="table table-striped" style="width:55%" align="center">
                                    <tr>
                                        <td>Código</td>
                                        <td>Ubicación</td>
                                        <td>Dirección</td>
                                        <td>Teléfono</td>
                                        <td>Editar</td>
                                        <td>Eliminar</td>
                                    </tr>
                                    <?php
                                    foreach ($mostrar as $value) {
                                        echo "<tr>";
                                        echo "<td>";
                                        Echo $value["idfilial"];
                                        echo "</td>";

                                        echo "<td>";
                                        echo $value["Distrito"];
                                        echo "</td>";

                                        echo "<td>";
                                        echo $value["Direccion"];
                                        echo "</td>";

                                        echo "<td>";
                                        echo $value["Telefono"];
                                        echo "</td>";
                                        
                                        

                                        echo "<td>";
                                        echo "<img src='img/editar.png' style='width:20px' class='puntero' id='editarFilial_" . $value['idfilial'] . "_" . $value['Distrito'] . "_" . $value['Direccion'] . "_" . $value['Telefono'] . "'>";
                                        echo "</td>";
                                        
                                        echo "<td>";
                                        echo "<img src='img/eliminar.png' style='width:20px' class='puntero' id='eliminarFilial_" . $value['idfilial'] . "_" . $value['Distrito'] . "_" . $value['Direccion'] . "_" . $value['Telefono'] . "'>";
                                        echo "</td>";
                                    }
                                    ?>
                                    </tr>
                                </table>
                                <hr />
                                <label class="control-label" style="color: #0000AA; size: 20px"> * Solo se puede ELIMINAR la filial que aún no se registra inscripción y/o matrículas.</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
