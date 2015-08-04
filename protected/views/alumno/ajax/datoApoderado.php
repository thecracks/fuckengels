<div class="container">
    <div class="row">
            <!--<div  class="col-xs-5 col-sm-4 col-md-3 col-lg-3">
                <h4>Datos del Apoderado</h4>
                <hr>
                <img  class="img-responsive" src="<?php echo Yii::app()->request->baseUrl; ?>/img/photo.png" >
                <!--
                <ul class="nav nav-pills nav-stacked">
                  <li class="active">
                    <a href="<?php  echo Yii::app() -> request -> baseUrl.'/alumno/perfil'; ?>">Datos del Alumno</a>
                  </li>
                  <li class="active">
                    <a href="<?php  echo Yii::app() -> request -> baseUrl.'/alumno/datoApoderado'; ?>">Datos del Apoderado</a>
                  </li>
                </ul>
                -->
            <!--</div>-->
            <div class="col-xs-7 col-sm-8 col-md-8 col-lg-8">
                <h4>Datos del Apoderado</h4>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                  <div class="panel panel-default">
                    <div class="panel-heading"> Nombres y Apellidos </div>
                    <div class="panel-body">
                      <?php ECHO $mostrar["nombre"]; echo " "; echo $mostrar["apellidoP"]; echo " "; echo $mostrar["apellidoM"]; ?>
                    </div>
                  </div>
                  <div class="panel panel-default">
                    <div class="panel-heading"> Celular </div>
                    <div class="panel-body">
                      <?php ECHO $mostrar["celular"];?>
                    </div>
                  </div>
                </div>


                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                  <div class="panel panel-default">
                    <div class="panel-heading"> Ocupación </div>
                    <div class="panel-body">
                      <?php ECHO $mostrar["ocupacion"];?>
                    </div>
                  </div> 
                  <div class="panel panel-default">
                    <div class="panel-heading"> DNI </div>
                    <div class="panel-body">
                      <?php ECHO $mostrar["DNIapoderado"];?>
                    </div>
                  </div> 
                </div>
            </div>
    </div>
    <br>
</div>