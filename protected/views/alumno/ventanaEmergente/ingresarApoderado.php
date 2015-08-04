<script type="text/javascript">

  function validar(){

    if(document.falumno.txtCelular.value.length!=9){
      alert("Datos Incompletos Celular");
      document.falumno.txtCelular.focus()
      return 0;
    }

    document.falumno.submit();
  }
</script>

<div class="container">
    <div class="row">
            <!--<div  class="col-xs-12 col-sm-12 col-md-6 col-lg-2">
                <br>
                <ul class="nav nav-pills nav-stacked">
                  <li class="active">
                    <a href="<?php  echo Yii::app() -> request -> baseUrl.'/alumno/perfil'; ?>">Datos del Alumno</a>
                  </li>
                  <li class="active">
                    <a href="<?php  echo Yii::app() -> request -> baseUrl.'/alumno/datoAlumno'; ?>">Datos del Apoderado</a>
                  </li>
                </ul>
            </div>-->

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h2>Registre Datos del Apoderado</h2>
                <hr>
                <form role="form" name="falumno" method="POST" action="<?php  echo Yii::app() -> request -> baseUrl.'/alumno/AlmacenarDatosApoderado'; ?>">
                  <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <div class="form-group">
                      <label for="ejemplo_email_1">Nombre</label>
                      <input type="text" class="form-control" 
                             placeholder="Introduce Nombre Apoderado" name="txtNombre" onkeyup="this.value = this.value.replace (/[^a-zA-Zñ ]/, ''); ">
                    </div>
                    <div class="form-group">
                      <label for="ejemplo_email_1">Apellido Paterno</label>
                      <input type="text" class="form-control" 
                             placeholder="Introduce Apellido Paterno" name="txtAP" onkeyup="this.value = this.value.replace (/[^a-zA-Zñ ]/, ''); ">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <div class="form-group">
                      <label for="ejemplo_password_1"> Apellido Materno</label>
                      <input type="text" class="form-control"
                             placeholder="Introduce Apellido Materno" name="txtAM" onkeyup="this.value = this.value.replace (/[^a-zA-Zñ ]/, ''); ">
                    </div>
                    <div class="form-group">
                      <label for="ejemplo_password_1"> Celular </label>
                      <input type="text" class="form-control"
                             placeholder="Introduce Celular" name="txtCelular" onkeyup="this.value = this.value.replace (/[^0-9]/, '');" required="required" onkeypress="if(this.value.length == 9){return false;}else{return toUpper(event,this);}"> 
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <div class="form-group">
                      <label for="ejemplo_password_1"> Ocupación </label>
                      <input type="text" class="form-control"
                             placeholder="Introduce Ocupación" name="txtOcupacion">
                    </div>
                    <div class="form-group">
                      <label for="ejemplo_password_1"> DNI Apoderado</label>
                      <input type="text" class="form-control"
                             placeholder="Introduce tu teléfono de casa"  value="<?php echo $mostrar['DNIapoderado'];?>" disabled="true">
                      <input type="hidden" class="form-control"
                             placeholder="DNI apoderado" name="txtdniA" value="<?php echo $mostrar['DNIapoderado'];?>" >
                    </div>
                  </div>
                  <button type="button" class="btn btn-default" onclick="validar()">Enviar</button>
                </form>
            </div>
        </div>
        <br>
</div>