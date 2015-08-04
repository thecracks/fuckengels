<!--Modal Eliminar-->
<div id="modalEliminarColegio" class="modal fade" tabindex="-1" role="dialog"aria-labelledy="myModalLabel" aria-hidden="true">
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
                            <label class="control-label">Nombre del Colegio</label>
                        </div>
                        <div class="col-lg-8">
                            <div id="txtNombreColegio_ad"></div>
                            <input type="hidden" id="txtIDColegio_ad">
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="modal-footer">
                <input type="button" value="Eliminar" id="eliminarColegioSI" class="btn btn-primary">
                <button type="button" data-dismiss="modal" class="btn btn-primary">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!--Fin modal eliminar-->


<!--Modal Editar-->
<div id="modalEditarColegio" class="modal fade" tabindex="-1" role="dialog"aria-labelledy="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hiddem="true">&times;</button>
                <h4>¿Seguro que desea cambiar?</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12" ID="editarColegioHTML">
                        <div class="col-lg-4">
                            <label class="control-label">Nombre del Colegio</label>
                        </div>
                        <div class="col-lg-8">
                            <input type="text" id="txtColegioN_ad"  class="form-control">
                            <input type="hidden" id="txtIdColegio_ad"  >
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="button" value="ACEPTAR" id="edColegioNew" class="btn btn-primary">
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
                    <li class="active"><a href="#listaColegio" data-toggle="tab">Listar Colegios</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="row tab-pane fade active in" id="listaColegio">
                        <div class="container-fluid">
                            <div class="panel-heading">
                                <center><h3>Lista de Colegios Almacenados</h3></center>
                            </div>
                            <hr />
                            <div class="panel-body">
                                <table class="table table-striped" style="width:55%" align="center">
                                    <tr>
                                        <td>Código</td>
                                        <td>Colegio</td>
                                        <td>Editar</td>
                                        <td>Eliminar</td>
                                    </tr>
                                    <?php
                                    foreach ($mostrar as $value) {
                                        echo "<tr>";
                                        echo "<td>";
                                        echo $value["idcolegiop"];
                                        echo "</td>";

                                        echo "<td>";
                                        echo $value["nombreColegio"];
                                        echo "</td>";

                                        echo "<td>";
                                        echo "<img src='img/editar.png' style='width:20px' class='puntero' id='editarColegio_" . $value['idcolegiop'] . "_" . $value['nombreColegio'] . "'>";
                                        echo "</td>";

                                        echo "<td>";
                                        echo "<img src='img/eliminar.png' style='width:20px' class='puntero' id='eliminarColegio_" . $value['idcolegiop'] . "_" . $value['nombreColegio'] . " '>";
                                        echo "</td>";
                                    }
                                    ?>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<br>