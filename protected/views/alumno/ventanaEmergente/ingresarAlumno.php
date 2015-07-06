<script type="text/javascript">

  function validar(){
    if(document.falumno.txtDNI.value.length!=8){
      alert("Datos Incompletos DNI");
      document.falumno.txtDNI.focus()
      return 0;
    }

    if(document.falumno.txtCelular.value.length!=9){
      alert("Datos Incompletos Celular");
      document.falumno.txtCelular.focus()
      return 0;
    }

      if(document.falumno.txtTelefono.value.length!=6){
        alert("Datos Incompletos Teléfono");
        document.falumno.txtTelefono.focus()
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
                <h2>Registre Datos del Alumno</h2>
                <hr>
                <form role="form" name="falumno" method="POST" action="<?php  echo Yii::app() -> request -> baseUrl.'/alumno/AlmacenarDatos'; ?>">
                  <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <div class="form-group">
                      <label for="ejemplo_email_1">DNI</label>
                      <input type="text" class="form-control" 
                             placeholder="Introduce DNI alumno" name="txtDNI" onkeyup="this.value = this.value.replace (/[^0-9]/, '');" required="required" onkeypress="if(this.value.length == 8){return false;}else{return toUpper(event,this);}">
                    </div>
                    <div class="form-group">
                      <label for="ejemplo_email_1">Domicilio</label>
                      <input type="text" class="form-control" 
                             placeholder="Introduce tu domicilio" name="txtDomicilio" required="required">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <div class="form-group">
                      <label for="ejemplo_password_1"> Fecha de Nacimiento </label>
                      <input type="date" name="txtFechaN" class="form-control" placeholder="Introduce tu fecha de nacimiento" reuqired="required">
                      
                    </div>
                    <div class="form-group">
                      <label for="ejemplo_password_1"> Colegio de Procedencia </label>
                      <input type="text" class="form-control"
                             placeholder="Introduce tu colegio de procedencia" name="txtColegioP" onkeyup="this.value = this.value.replace (/[^a-zA-Zñ ]/, ''); " reuiqred="required">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                    <div class="form-group">
                      <label for="ejemplo_password_1"> Número de Celular </label>
                      <input type="text" class="form-control"
                             placeholder="Introduce tu número de celular" name="txtCelular" required="required" onkeyup="this.value = this.value.replace (/[^0-9]/, '');" onkeypress="if(this.value.length == 9){return false;}else{return toUpper(event,this);}">
                    </div>
                    <div class="form-group">
                      <label for="ejemplo_password_1"> Teléfono </label>
                      <input type="text" class="form-control"
                             placeholder="Introduce tu teléfono de casa" name="txtTelefono" onkeypress="if(this.value.length == 6){return false;}else{return toUpper(event,this);}" onkeyup="this.value = this.value.replace (/[^0-9]/, '');" reuqired="required">
                    </div>
                  </div>
                  <button type="button" class="btn btn-default" onclick="validar()">Enviar</button>
                </form>
            </div>
        </div>
        <br>
</div>