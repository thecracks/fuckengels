<div class="container">
    <section class="row">
            <div class="col-xs-5 col-sm-5 col-md-3 col-lg-3">
                <h4> <?php ECHO $mostrar["Nombre"]; echo " "; echo $mostrar["ApellidoPaterno"]; echo " "; echo $mostrar["ApellidoMaterno"]; ?> </h4>
                <hr>
                <ul class="nav nav-pills nav-stacked">
                  <li class="active">
                    <a href="<?php  echo Yii::app() -> request -> baseUrl.'/alumno/notas'; ?>">Mis Notas</a>
                  </li>
                  <li class="active">
                    <a href="<?php  echo Yii::app() -> request -> baseUrl.'/alumno/asistencias'; ?>">Mis Asistencias</a>
                  </li>
                </ul>
            </div>
            <div class="col-xs-7 col-sm-7 col-md-7 col-lg-6">
              <table class="table table-striped">
                <tr>
                  <td>Código</td>
                  <td>Nombre</td>
                  <td>Docente</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
              </table>
            </div>
    </section>
</div>

<br>
<br>
