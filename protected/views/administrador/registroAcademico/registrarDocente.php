<div class="container">
    <section class="row">
            <div class="col-xs-5 col-sm-5 col-md-3 col-lg-3">               
                <ul class="nav nav-pills nav-stacked">
                  <li class="active">
                    <a href="<?php  echo Yii::app() -> request -> baseUrl.'/administrador/registrarArea'; ?>">Registrar Área</a>
                  </li>
                  <li class="active">
                    <a href="<?php  echo Yii::app() -> request -> baseUrl.'/administrador/registrarCurso'; ?>">Registrar Curso</a>
                  </li>
                  <li class="active">
                    <a href="<?php  echo Yii::app() -> request -> baseUrl.'/administrador/asignarDetalleCurso'; ?>">Detallar Curso</a>
                  </li>
                  <li class="active">
                    <a href="<?php  echo Yii::app() -> request -> baseUrl.'/administrador/registrarDocente'; ?>">Registrar Personal</a>
                  </li>
                  <li class="active">
                    <a href="<?php  echo Yii::app() -> request -> baseUrl.'/administrador/asignarDocenteCurso'; ?>">Asignar Docente Curso</a>
                  </li>
                </ul>
            </div>

            <div class="col-xs-7 col-sm-7 col-md-9 col-lg-9">
              <form method="POST" action="<?php  echo Yii::app() -> request -> baseUrl.'/administrador/guardarDatosDocente'; ?>">
              <center><h3> Registro del Personal </h3></center>
              <hr>
              <div class="row">
                  <label for="txtformulaarea" class="col-lg-1 control-label"></label>
                  <label for="txtformulaarea" class="col-lg-3 control-label">Nombre</label>
                  <div class="col-lg-6">
                      <input type="text" class="form-control" name="txtNombre" placeholder="Nombres" required="required">
                  </div>
              </div>
              <br>
              <div class="row">
                  <label for="txtformulaarea" class="col-lg-1 control-label"></label>
                  <label for="txtformulaarea" class="col-lg-3 control-label">Apellido Paterno</label>
                  <div class="col-lg-6">
                      <input type="text" class="form-control" name="txtApellidoP" placeholder="Apellido Paterno" equired="required">
                  </div>
              </div>
              <br>
              <div class="row">
                  <label for="txtformulaarea" class="col-lg-1 control-label"></label>
                  <label for="txtformulaarea" class="col-lg-3 control-label">Apellido Materno</label>
                  <div class="col-lg-6">
                      <input type="text" class="form-control" name="txtApellidoM" placeholder="Apellido Paterno" equired="required">
                  </div>
              </div>
              <br>
              <div class="row">
                  <label for="txtformulaarea" class="col-lg-1 control-label"></label>
                  <label for="txtformulaarea" class="col-lg-3 control-label">DNI</label>
                  <div class="col-lg-6">
                      <input type="text" class="form-control" name="txtDNI" placeholder="DNI" equired="required">
                  </div>
              </div>
              <br>
              <div class="row">
                  <label for="txtformulaarea" class="col-lg-1 control-label"></label>
                  <label for="txtformulaarea" class="col-lg-3 control-label">Celular</label>
                  <div class="col-lg-6">
                      <input type="text" class="form-control" name="txtCelular" placeholder="Celular" equired="required">
                  </div>
              </div>
              <br>
              <div class="row">
                  <label for="txtformulaarea" class="col-lg-1 control-label"></label>
                  <label for="txtformulaarea" class="col-lg-3 control-label">Telefono</label>
                  <div class="col-lg-6">
                      <input type="text" class="form-control" name="txtTelefono" placeholder="Teléfono" equired="required">
                  </div>
              </div>
              <br>
              <div class="row">
                  <label for="txtformulaarea" class="col-lg-1 control-label"></label>
                  <label for="txtformulaarea" class="col-lg-3 control-label">Dirección</label>
                  <div class="col-lg-6">
                      <input type="text" class="form-control" name="txtDireccion" placeholder="DIrección" equired="required">
                  </div>
              </div>
              <br>
              <div class="row">
                  <label for="txtformulaarea" class="col-lg-1 control-label"></label>
                  <label for="txtformulaarea" class="col-lg-3 control-label">Rol a Desempeñar</label>
                  <div class="col-lg-6">
                      <select class="form-control" name="sRol">
                        <option>Docente</option>
                        <option>Administrador</option>
                      </select>
                  </div>
              </div>
              <br>
              <div class="row">
                  <label for="txtformulaarea" class="col-lg-5 control-label"></label>
                  <input type="submit" value="REGISTRAR" class="btn btn-success">
              </div>
            </form>
              <hr>

              <center><h4> Lista del Personal Académico </h4></center>
              <hr>
              <table class="table table-striped" style="width:55%" align="center">
                <tr>
                  <td><b>Nombre y Apellidos</b></td>
                  <td><b>DNI</b></td>
                  <td><b>Celular</b></td>
                  <td><b>Rol</b></td><
                </tr>
                <?php
                  foreach ($mostrar as $value) {
                    echo "<tr>";
                      echo "<td>";
                      Echo $value["Nombre"], " ", $value["ApellidoPaterno"], " ", $value["ApellidoMaterno"]; 
                      echo "</td>";



                      echo "<td>";
                      echo $value["DNI"];
                      echo "</td>";

                      echo "<td>";
                      echo $value["celular"];
                      echo "</td>";

                      echo "<td>";
                      echo $value["tipo"];
                      echo "</td>";

                  }?>
                </tr>
              </table>

            </div>
    </section>
</div>

<br>