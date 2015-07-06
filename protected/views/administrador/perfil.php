
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="panel panel-default">
            <!--            <div class="panel-heading">
                            Basic Tabs
                        </div>-->
            <div class="panel-body">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#home" data-toggle="tab">Perfil</a>
                    </li>
                    <li class=""><a href="#home" data-toggle="tab">Editar Perfil</a>
                    </li>
                    <li class=""><a href="#messages" data-toggle="tab">Messages</a>
                    </li>
                    <li class=""><a href="#settings" data-toggle="tab">Settings</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade active in" id="home">

                        <div class="container-fluid">

                            <div class="row">
                                <div  class="col-xs-5 col-sm-4 col-md-3 col-lg-3">
                                    <h4>Datos del Alumno</h4>
                                    <hr>
                                    <img  class="img-responsive" src="<?php echo Yii::app()->request->baseUrl; ?>/img/photo.png" >
                                    <!--
                                    <ul class="nav nav-pills nav-stacked">
                                      <li class="active">
                                        <a href="<?php echo Yii::app()->request->baseUrl . '/alumno/perfil'; ?>">Datos del Alumno</a>
                                      </li>
                                      <li class="active">
                                        <a href="<?php echo Yii::app()->request->baseUrl . '/alumno/datoApoderado'; ?>">Datos del Apoderado</a>
                                      </li>
                                    </ul>
                                    -->
                                </div>
                                <br>
                                <br>
                                <div class="col-xs-7 col-sm-8 col-md-8 col-lg-8">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                        <div class="panel panel-default">
                                            <div class="panel-heading"> Nombres y Apellidos </div>
                                            <div class="panel-body">
                                                <?php
                                                ECHO $mostrar["Nombre"];
                                                echo " ";
                                                echo $mostrar["ApellidoPaterno"];
                                                echo " ";
                                                echo $mostrar["ApellidoMaterno"];
                                                ?>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading"> Teléfono </div>
                                            <div class="panel-body">
                                                <?php ECHO $mostrar["telefono"]; ?>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading"> Dirección </div>
                                            <div class="panel-body">
                                                <?php ECHO $mostrar["domicilio"]; ?>
                                            </div>
                                        </div> 
                                    </div>


                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                        <div class="panel panel-default">
                                            <div class="panel-heading"> DNI </div>
                                            <div class="panel-body">
                                                <?php ECHO $mostrar["DNI"]; ?>
                                            </div>
                                        </div> 
                                        <div class="panel panel-default">
                                            <div class="panel-heading"> Fecha de Nacimiento </div>
                                            <div class="panel-body">
                                                <?php
                                                if ($mostrar["fechanacimiento"] == null) {
                                                    
                                                } else {
                                                    echo date('d-m-Y', strtotime($mostrar["fechanacimiento"]));
                                                }
                                                ?>

                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading"> Celular</div>
                                            <div class="panel-body">
                                                <?php ECHO $mostrar["celular"]; ?>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row tab-pane fade" id="profile">
                        <h4>Profile Tab</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                    <div class="row tab-pane fade" id="messages">
                        <h4>Messages Tab</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                    <div class="row tab-pane fade" id="settings">
                        <h4>Settings Tab</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>









<!--<div class="container">
    <section class="row">
            <div class="col-xs-5 col-sm-5 col-md-3 col-lg-3">               
                <ul class="nav nav-pills nav-stacked">
                  <li class="active">
                    <a href="<?php echo Yii::app()->request->baseUrl; ?>/administrador/Registroparcialalumno.jsp">Inscripción de Alumnos</a>
                  </li>
                  <li class="active">
                    <a href="<?php echo Yii::app()->request->baseUrl . '/administrador/registrarArea'; ?>">Registro Académico</a>
                  </li>
                  <li class="active">
                    <a href="<?php echo Yii::app()->request->baseUrl; ?>/administrador/configuracionformulaarea">Asignación de Pesos de Evaluación</a>
                  </li>
                   <li class="active">
                    <a href="<?php echo Yii::app()->request->baseUrl; ?>/administrador/asistencia">Asistencia</a>
                  </li>
                  <li class="active">
                    <a href="<?php echo Yii::app()->request->baseUrl; ?>/administrador/matricula">Matricula</a>
                  </li>
                  <li class="active">
                    <a href="<?php echo Yii::app()->request->baseUrl; ?>/administrador/cargaPDFMatricula">Reporte Matricula X Grado</a>
                  </li>
                </ul>
            </div>
            <div class="col-xs-7 col-sm-7 col-md-9 col-lg-9">
            </div>
    </section>
</div>-->























<!--
<section class="row" >
    <br>
    <br>
    <div class="col-xs-12  col-sm-6 col-md-4 col-lg-2" align="center">
        <br>


        <a href="<?php echo Yii::app()->request->baseUrl; ?>/administrador/Registroparcialalumno.jsp">

            <img   id="ajaxconfiguracion" class="puntero" align="center" src="<?php echo Yii::app()->request->baseUrl; ?>/img/configuracion.png" >

        </a>



        <p>
            Preregistro Alumnos
        </p>
        <br>
    </div>
    <div   class="col-xs-12 col-sm-6 col-md-4 col-lg-2" align="center">
        <br>
        <img id="ajaxfechasespeciales" class="puntero" align="center" src="<?php echo Yii::app()->request->baseUrl; ?>/img/fechaE.png" >
        <p>
            Registrar Cursos
        </p>
        <br>
    </div>
    <div  class="col-xs-12  col-sm-6 col-md-4 col-lg-2" align="center">
        <br>
        <a href="<?php echo Yii::app()->request->baseUrl; ?>/administrador/ajaxmatricula">
            <img id="matricula"  class="puntero" align="center" src="<?php echo Yii::app()->request->baseUrl; ?>/img/matricula.png" ></a>
        <p>
            Matricula
        </p>
        <br>

    </div>

    <div   class="col-xs-12  col-sm-6 col-md-4 col-lg-2" align="center">
        <br>
        <img id="ajaxregistropersonal" class="puntero" align="center" src="<?php echo Yii::app()->request->baseUrl; ?>/img/personal.png" >
        <p>
            Registro Personal
        </p>
        <br>
    </div>
    <div  class="col-xs-12 col-sm-6 col-md-4 col-lg-2" align="center">
        <br>
        <img  id="ajaxasignacionpersonal" class="puntero" align="center" src="<?php echo Yii::app()->request->baseUrl; ?>/img/asignacionP.png">
        <p>
            Asignación Personal
        </p>
        <br>
    </div>
    <div  class="col-xs-12  col-sm-6 col-md-4 col-lg-2" align="center">
        <br>
        <a href="<?php echo Yii::app()->request->baseUrl; ?>/administrador/configuracionformulaarea">

            <img   id="estudiante" class="puntero" align="center" src="<?php echo Yii::app()->request->baseUrl; ?>/img/estudiantesN.png" >
        </a>
        <p>
            ASIGNACIÓN DE PESOS
        </p>
        <br>
    </div>
</section>
-->