<div class="container">
    <section class="row">
            <div class="col-xs-5 col-sm-5 col-md-3 col-lg-3">
                <h4><?php ECHO $mostrar["Nombre"]; echo " "; echo $mostrar["ApellidoPaterno"]; echo " "; echo $mostrar["ApellidoMaterno"]; ?></h4>
                <hr>
                <ul class="nav nav-pills nav-stacked">
                  <li class="active">
                    <a href="<?php  echo Yii::app() -> request -> baseUrl.'/alumno/notas'; ?>">Mis Notas</a>
                  </li>
                  <li class="active">
                    <a href="<?php  echo Yii::app() -> request -> baseUrl.'/alumno/asistencias'; ?>">Mis Asistencias</a>
                  </li>
                  <li class="active">
                    <a href="<?php  echo Yii::app() -> request -> baseUrl.'/alumno/datoApoderado'; ?>">Datos Apoderado</a>
                  </li>
                </ul>

            </div>

            <div class="col-xs-7 col-sm-7 col-md-6 col-lg-7">
                <form role="form" method="POST" action="<?php  echo Yii::app() -> request -> baseUrl.'/alumno/BusquedaApoderado'; ?>">
                  <div class="form-group">
                      <label for="ejemplo_email_1">Ingrese DNI del Apoderado</label>
                      <input type="text" class="form-control" 
                             placeholder="Introduce DNI del apoderado" name="txtDNIA" onkeyup="this.value = this.value.replace (/[^0-9]/, '');" required="required" onkeypress="if(this.value.length == 8){return false;}else{return toUpper(event,this);}">
                    </div>
                    <button type="submit" class="btn btn-default">Enviar</button>
                </form>
            </div>          
    </section>
</div>
