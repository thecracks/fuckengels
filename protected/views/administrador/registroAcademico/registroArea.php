<!--Modal Eliminar-->
<div id="modalEliminarArea" class="modal fade" tabindex="-1" role="dialog"aria-labelledy="myModalLabel" aria-hidden="true">
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
                            <label class="control-label">Nombre Area</label>
                        </div>
                        <div class="col-lg-8">
                            <div id="txtAreaNombre_ad"></div>
                            <input type="hidden" id="txtIDAreaNombre_ad">
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="modal-footer">
                <input type="button" value="Eliminar" id="eliminarAreaSI" class="btn btn-primary">
                <button type="button" data-dismiss="modal" class="btn btn-primary">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!--Fin modal eliminar-->


<!--Modal Editar-->
<div id="modalEditarArea" class="modal fade" tabindex="-1" role="dialog"aria-labelledy="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hiddem="true">&times;</button>
                <h4>¿Seguro que desea cambiar?</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12" ID="editarAreaHTML">
                        <div class="col-lg-4">
                            <label class="control-label">Nombre Area</label>
                        </div>
                        <div class="col-lg-8">
                            <input type="text" id="txtAreaNombreNew_ad"  class="form-control">
                            <input type="hidden" id="txtIDAreaNombreNew_ad"  >
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="button" value="ACEPTAR" id="eAreaNew" class="btn btn-primary">
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
                    <li class="active"><a href="#home" data-toggle="tab">Registrar Áreas</a>
                    </li>
                    <li class=""><a href="#listaA" data-toggle="tab">Listar Áreas</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade active in" id="home">
                        <div class="container-fluid">
                            <div class="row" id="registroAreasAcademicas">
                                <div class="col-lg-12">
                                    <center><h3> Registro de Áreas Académicas </h3></center>
                                    <hr />
                                    <div class="row">
                                        <label class="col-lg-1 control-label"></label>
                                        <label class="col-lg-3 control-label">Nombre del Área</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="txtNombreArea" placeholder="Nombre del Área">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <label class="col-lg-5 control-label"></label>
                                        <input  type="button" value="Guardar" id="btnGuardarAreas" class="btn btn-success autoajustable">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row tab-pane fade" id="listaA">
                        <div class="container-fluid">
                            <div class="panel-heading">
                                <center><h3>Lista de Áreas Académicas</h3></center>
                            </div>
                            <hr />
                            <div class="panel-body">
                                <table class="table table-striped" style="width:55%" align="center">
                                    <tr>
                                        <td>Código</td>
                                        <td>Área</td>
                                        <td>Editar</td>
                                        <td>Eliminar</td>
                                    </tr>
                                    <?php
                                    foreach ($mostrar as $value) {
                                        echo "<tr>";
                                        echo "<td>";
                                        echo $value["idarea"];
                                        echo "</td>";

                                        echo "<td>";
                                        echo $value["Descripcion"];
                                        echo "</td>";

                                        echo "<td>";
                                        echo "<img src='img/editar.png' style='width:20px' class='puntero' id='editar_" . $value['idarea'] . "_" . $value['Descripcion'] . "'>";
                                        echo "</td>";

                                        echo "<td>";
                                        echo "<img src='img/eliminar.png' style='width:20px' class='puntero' id='eliminar_" . $value['idarea'] . "_" . $value['Descripcion'] . " '>";
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


<!--<div class="container">
    <section class="row">
            <div class="col-xs-7 col-sm-7 col-md-9 col-lg-9">
              <form method="POST" action="<?php echo Yii::app()->request->baseUrl . '/administrador/guardarArea'; ?>">
              <center><h3> Registro de Áreas Académicas </h3></center>
              <hr>
              <div class="row">
                  <label for="txtformulaarea" class="col-lg-1 control-label"></label>
                  <label for="txtformulaarea" class="col-lg-3 control-label">Nombre del Área</label>
                  <div class="col-lg-6">
                      <input type="text" class="form-control" id="txtNombreArea" placeholder="Nombres" name="txtNombreArea" required="required">
                  </div>
              </div>
              <br>
              <div class="row">
                  <label for="txtformulaarea" class="col-lg-5 control-label"></label>
                  <input type="submit" value="REGISTRAR" class="btn btn-success">
              </div>
            </form>
              <hr>

              <center><h4> Lista de Áreas Académicas </h4></center>
              <hr>
              <table class="table table-striped" style="width:45%" align="center">
                <tr>
                  <td>Código</td>
                  <td>Nombre</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>                  
<?php
foreach ($mostrar as $value) {
    echo "<tr>";
    echo "<td>";
    Echo $value["idarea"];
    echo "</td>";

    echo "<td>";
    echo $value["Descripcion"];
    echo "</td>";

    echo "<td> &nbsp";
    echo "</td>";

    echo "<td> &nbsp";
    echo "</td>";
}
?>
                </tr>
                  
                </tr>
              </table>

            </div>
    </section>
</div>-->

<br>