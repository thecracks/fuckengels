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
            <center>
            <img  align="center" src="<?php echo Yii::app() -> request -> baseUrl; ?>/img/muyPronto.jpg" >
            </center>
        </div>
    </section>
</div>