<div class="container">
    <div class="row">
            <div  class="col-xs-5 col-sm-4 col-md-3 col-lg-3">
                <h4>Confirmar Apoderado</h4>
                <hr>
                <form role="form" method="POST" action="<?php  echo Yii::app() -> request -> baseUrl.'/alumno/ConfirmarApoderado'; ?>">
                  <div class="form-group">
                      <label for="ejemplo_email_1">DNI Apoderado</label>
                      <input type="text" class="form-control" 
                             placeholder="Introduce DNI del apoderado" value="<?php echo $mostrar["DNIapoderado"]?>" disabled="true">
                             <input type="hidden" class="form-control" 
                             placeholder="Introduce DNI del apoderado" name="txtDNIA" value="<?php echo $mostrar["DNIapoderado"];?>">
                             <button type="submit" class="btn btn-default">Enviar</button>
                  </div>

                </form>
            </div>
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
                </div>
            </div>
    </div>
    <br>
</div>