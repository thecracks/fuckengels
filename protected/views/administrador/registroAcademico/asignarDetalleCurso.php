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
              <form method="POST" action="<?php  echo Yii::app() -> request -> baseUrl.'/administrador/guardarDetalleCurso'; ?>">
              <center><h3> Detallar Cursos </h3></center>
              <hr>
              <div class="row">
                  <label for="txtformulaarea" class="col-lg-1 control-label"></label>
                  <label for="txtformulaarea" class="col-lg-3 control-label">Nombre del Curso</label>
                  <div class="col-lg-6">
                      <select class="form-control" required="required" name="sCurso">
                        <?php foreach ($mostrar1 as $value) {
                        echo "<option value='".$value["idcurso"]."'>";
                        echo $value["Nombre"];
                        echo "</option>";
                         }?>
                      </select>
                  </div>                
              </div>
              <br>
              <div class="row">
                <label for="txtformulaarea" class="col-lg-1 control-label"></label>
                  <label for="txtformulaarea" class="col-lg-3 control-label">Sección</label>
                  <div class="col-lg-6">
                      <select class="form-control" required="required" name="sSeccion">
                        <option value="U">U</option>
                      </select>
                  </div>
              </div>
              <br>
              <div class="row">
                <label for="txtformulaarea" class="col-lg-1 control-label"></label>
                  <label for="txtformulaarea" class="col-lg-3 control-label">Grado</label>
                  <div class="col-lg-6">
                      <select class="form-control" required="required" name="sGrado">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                      </select>
                  </div>
              </div>
              <br>
              <div class="row">
                <label for="txtformulaarea" class="col-lg-1 control-label"></label>
                  <label for="txtformulaarea" class="col-lg-3 control-label">Nivel</label>
                  <div class="col-lg-6">
                      <select class="form-control" required="required" name="sNivel">
                        <option value="secundaria">Secundaria</option>
                      </select>
                  </div>
              </div>
              <br>
              <div class="row">
                <label for="txtformulaarea" class="col-lg-1 control-label"></label>
                  <label for="txtformulaarea" class="col-lg-3 control-label">Filial</label>
                  <div class="col-lg-6">
                      <select class="form-control" required="required" name="sFilial">
                        <option value="porvenir">El Porvenir</option>
                        <option value="laredo">Laredo</option>
                      </select>
                  </div>
              </div>
              <br>
              <div class="row">
                <label for="txtformulaarea" class="col-lg-1 control-label"></label>
                  <label for="txtformulaarea" class="col-lg-3 control-label">Año Académico</label>
                  <div class="col-lg-6">
                      <input type="text" class="form-control" id="txtAnioAcademico" placeholder="Año Academico" name="txtAnioAcademico" required="required">
                  </div>
              </div>
              <br>
              <div class="row">
                <label for="txtformulaarea" class="col-lg-1 control-label"></label>
                  <label for="txtformulaarea" class="col-lg-3 control-label">Horas asignadas </label>
                  <div class="col-lg-6">
                      <input type="text" class="form-control" id="txtHorasAQsignadas" placeholder="Horas Asignadas" name="txtHorasAsignadas" required="required">
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
                  <td>Curso</td>
                  <td>Seccion</td>
                  <td>Grado</td>
                  <td>Nivel</td>
                  <td>Filial</td>
                  <td>Horas Asignadas</td>
                </tr>
                  <?php
                  foreach ($mostrar as $value) {
                    echo "<tr>";
                      echo "<td>";
                      Echo $value["idcurso"]; 
                      echo "</td>";

                      echo "<td>";
                      echo $value["seccion"];
                      echo "</td>";

                      echo "<td>";
                      echo $value["grado"];
                      echo "</td>";

                      echo "<td>";
                      echo $value["nivel"];
                      echo "</td>";

                      echo "<td>";
                      echo $value["idfilial"];
                      echo "</td>";

                      echo "<td>";
                      echo $value["horas"];
                      echo "</td>";

                  }?>
                </tr>
              </table>

            </div>
    </section>
</div>

<br>