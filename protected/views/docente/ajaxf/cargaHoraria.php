<div class="container">
   <section class="row">
        <div  class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
            <label> Nombre y Apellido </label>
            <hr>
            <ul class="nav nav-pills nav-stacked">
              <li class="active">
                <a href="<?php  echo Yii::app() -> request -> baseUrl.'/docente/cursoDocente'; ?>">Cursos Asignados</a>
              </li>
              <li class="active">
                <a href="<?php  echo Yii::app() -> request -> baseUrl.'/docente/cargaHoraria'; ?>">Carga Horaria</a>
              </li>
            </ul>
        </div>
        <div  class="col-xs-12 col-sm-12 col-md-6 col-lg-9">
            <br>
            <br>
            <table class="table table-striped">
              <tr>
                <td>Hora</td>
                <td>lunes</td>
                <td>Martes</td>
                <td>Miercoles</td>
                <td>Jueves</td>
                <td>Viernes</td>
              </tr>
              <tr>
                <td>7 - 8</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>8 - 9</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>9 - 10</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>10 - 11</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>11 - 12</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>12 - 1</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>1 - 2</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
            </table>
        </div>
    </section>
</div>