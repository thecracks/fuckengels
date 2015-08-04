<div class="container">
    <div class="row">
            <div  class="col-xs-12 col-sm-12 col-md-6 col-lg-2">
                <br>
                <ul class="nav nav-pills nav-stacked">
                  <li class="active">
                    <a href="<?php  echo Yii::app() -> request -> baseUrl.'/alumno/perfil'; ?>">Datos del Alumno</a>
                  </li>
                  <li class="active">
                    <a href="<?php  echo Yii::app() -> request -> baseUrl.'/alumno/datoApoderado'; ?>">Datos del Apoderado</a>
                  </li>
                </ul>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-10">
              <?php foreach ($datitos as $datos):?>
                <h2></h2>
                <hr>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5">
                    <div class="panel panel-default">
                      <div class="panel-heading"> Nombre y Apellidos </div>
                      <div class="panel-body">
                        <?php ECHO $datos->Nombre; ?>
                      </div>
                    </div>
                    <div class="panel panel-default">
                      <div class="panel-heading"> Dirección </div>
                      <div class="panel-body">
                        <?php ECHO $datos-> Domicilio; ?>
                      </div>
                    </div>   
                </div>   
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5">
                    <div class="panel panel-default">
                      <div class="panel-heading"> Teléfono </div>
                      <div class="panel-body">
                        Contenido...
                      </div>
                    </div>
                    <div class="panel panel-default">
                      <div class="panel-heading"> Correo </div>
                      <div class="panel-body">
                        Contenido...
                      </div>
                    </div>
                    <div class="panel panel-default">
                      <div class="panel-heading"> Colegio de Procedencia</div>
                      <div class="panel-body">
                        Contenido...
                      </div>
                    </div>   
                </div>  
                <?php endforeach; ?>      
            </div>
        </div>
        <br>
</div>