<!--Modal Eliminar
<div id="modalEliminarCurso" class="modal fade" tabindex="-1" role="dialog"aria-labelledy="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hiddem="true">&times;</button>
                <h4>¿Esta seguro que desea eliminar?</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12" >
                        <label class="col-lg-2 control-label"></label>
                        <div class="col-lg-4">
                            <label class="control-label">Area</label>
                        </div>
                        <div class="col-lg-6">
                            <div id="txtAreaCursoNombreNew_ad"></div>
                            <input type="hidden" id="txtIDAreaCursoNew_ad">
                        </div>
                    </div>
                    <div lass="col-lg-12">
                        <label class="col-lg-2 control-label"></label>
                        <div class="col-lg-4">
                            <label class="control-label">Curso</label>
                        </div>
                        <div class="col-lg-6">
                            <div id="txtCursoNew_ad"></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="modal-footer">
                <input type="button" value="Eliminar" id="eliminarCursoSI" class="btn btn-primary">
                <button type="button" data-dismiss="modal" class="btn btn-primary">Cerrar</button>
            </div>
        </div>
    </div>
</div>
Fin modal eliminar-->

<!--Modal Editar -->
<div id="modalEditarCurso" class="modal fade" tabindex="-1" role="dialog"aria-labelledy="myModalLabel" aria-hidden="true">
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
                            <label class="control-label">Area</label>
                        </div>
                        <div class="col-lg-8">
                            <div id="txtArea_ad"></div>

                        </div>
                    </div>
                    <div lass="col-lg-12">
                        <div class="col-lg-4">
                            <label class="control-label">Curso</label>
                        </div>
                        <div class="col-lg-8">
                            <input type="text" id="txtCursoN_ad"  class="form-control">
                            <input type="hidden" id="txtIDcursoNew1_ad"  >
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="button" value="ACEPTAR" id="edCursoNew" class="btn btn-primary">
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
                    <li class="active"><a href="#home" data-toggle="tab">Registrar Capacidad</a>
                    </li>
                    <li class=""><a href="#listaC" data-toggle="tab">Listar Capacidades</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade active in" id="home">
                        <div class="container-fluid">
                            <div class="row" id="registroAreasAcademicas">
                                <div class="col-lg-12">
                                    <center><h3> Registro de Capacidades </h3></center>
                                    <hr />
                                    <div class="row">
                                        <label class="col-lg-3 control-label">Nombre Capacidad</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="txtNombreCapacidad_rc_ad" placeholder="Nombre de Capacidad">
                                        </div>
                                    </div>
                                    <br />
                                    <div class="row">
                                        <label class="col-lg-3 control-label">Nombre Capacidad abreviada</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="txtNombreCapacidadabrev_rc_ad" placeholder="Nombre de Capacidad">
                                        </div>
                                    </div>
                                    <br />
                                    <div class="row">
                                        <label class="col-lg-5 control-label"></label>
                                        <input  type="button" value="Guardar" id="btnGuardarCapacidad_rc_ad" class="btn btn-success autoajustable">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row tab-pane fade" id="listaC">
                        <div class="container-fluid">
                            <div class="panel-heading">
                                <center><h3>Lista de Capacidades</h3></center>
                            </div>
                            <hr />
                            <div class="panel-body">

                                <table class="table table-striped" style="width:55%" align="center">
                                    <tr>
                                        <td>Código</td>
                                        <td>Nombre</td>
                                        <td>Nombre abreviado</td>
                                        <td>Editar</td>
                                        <td>Eliminar</td>
                                    </tr>
                                    <?php
                                    foreach ($mostrar as $value) {
                                        echo "<tr>";
                                        echo "<td>";
                                        Echo $value["idcompetencias"];
                                        echo "</td>";

                                        echo "<td>";
                                        echo $value["Descripcion"];
                                        echo "</td>";

                                        echo "<td>";
                                        echo $value["competenciamin"];
                                        echo "</td>";

                                        echo "<td>";
                                        echo "<img src='img/editar.png' style='width:20px' class='puntero' id='editarCapacidad_" . $value['idcompetencias'] . "_" . $value['Descripcion'] . "_" . $value['competenciamin'] . "'>";
                                        echo "</td>";

                                        echo "<td>";
                                        echo "<img src='img/eliminar.png' style='width:20px' class='puntero' id='eliminarCapacidad_" . $value['idcompetencias'] . "_" . $value['Descripcion'] . "_" . $value['competenciamin'] . "''>";
                                        echo "</td>";
                                    }
                                    ?>
                                    </tr>
                                </table>
                                <hr />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
