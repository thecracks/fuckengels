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
              <form method="POST" action="<?php  echo Yii::app() -> request -> baseUrl.'/administrador/guardarDocenteCurso'; ?>">
              <center><h3> Registro de Docente por Cursos </h3></center>
              <hr>
              <div class="row">
                  <label for="txtformulaarea" class="col-lg-1 control-label"></label>
                  <label for="txtformulaarea" class="col-lg-3 control-label">Nombre del Docente</label>
                  <div class="col-lg-6">
                    <select class="form-control" required="required" name="sDocente">
                        <?php foreach ($mostrar as $value) {
                        echo "<option value='".$value["idpersona"]."'>";
                        echo $value["Nombre"], " ", $value["ApellidoPaterno"], " ",$value["ApellidoMaterno"];
                        echo "</option>";
                         }?>
                      </select>
                  </div>
              </div>
              <br>
              <div class="row">
                  <label for="txtformulaarea" class="col-lg-1 control-label"></label>
                  <label for="txtformulaarea" class="col-lg-3 control-label">Detalle del Curso</label>
                  <div class="col-lg-6">
                      <select class="form-control" required="required" name="sCurso">
                        <?php foreach ($mostrar1 as $value) {
                        echo "<option value='".$value["idcursoasignada"]."'>";
                        echo $value["idcurso"], " ", $value["seccion"], " ", $value["grado"], " ",$value["nivel"], " ",$value["filial"];
                        echo "</option>";
                         }?>
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

              <center><h4> Lista de Docente por Cursos</h4></center>
              <hr>
              <table class="table table-striped" style="width:35%" align="center">
                <tr>
                  <td>Código</td>
                  <td>Nombre</td>
                  <td>Curso</td>
                  <td>Área</td>
                </tr>

                </tr>
              </table>

            </div>
    </section>
</div>

<br>