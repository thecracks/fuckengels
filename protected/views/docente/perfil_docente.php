
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="panel panel-default">
            <!--            <div class="panel-heading">
                            Basic Tabs
                        </div>-->
            <div class="panel-body">
                <ul class="nav nav-tabs">

                    <li class="active"><a href="#perfildocente" data-toggle="tab">Perfil Docenete</a>
                    </li>
                    <li class=""><a href="#editarperfildocente" data-toggle="tab">Editar Perfil</a>
                    </li>
                    <!--                    <li class=""><a href="#perfilAcademicoDocente" data-toggle="tab">Perfil Académico</a>
                                        </li>-->

                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade active in" id="perfildocente">

                        <div class="container-fluid">

                            <div class="row">
                                <div  class="col-xs-5 col-sm-4 col-md-3 col-lg-3">
                                    <h4>Datos del Docente</h4>
                                    <hr>
                                    <img  class="img-responsive" src="<?php echo Yii::app()->request->baseUrl; ?>/img/photo.png" >

                                </div>
                                <br>
                                <br>
                                <div class="col-xs-7 col-sm-8 col-md-9 col-lg-9">
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
                                            <div class="panel-heading"> DNI </div>
                                            <div class="panel-body">
                                                <?php ECHO $mostrar["DNI"]; ?>
                                            </div>
                                        </div> 

                                        <div class="panel panel-default">
                                            <div class="panel-heading"> Género </div>
                                            <div class="panel-body">
                                                <?php
                                                if ($mostrar["genero"] == 'M')
                                                    echo 'Masculino';
                                                else if ($mostrar["genero"] == 'F')
                                                    echo 'Femenino';
                                                else 
                                                    echo 'No seleccionado';
                                                ?>
                                            </div>
                                        </div> 

                                        <div class="panel panel-default">
                                            <div class="panel-heading"> Fecha de Nacimiento </div>
                                            <div class="panel-body" id="divdocentefechanacimiento_predocente_ad">
                                                <?php
                                                if ($mostrar["fechanacimiento"] == null) {
                                                    
                                                } else {
                                                    echo date('d-m-Y', strtotime($mostrar["fechanacimiento"]));
                                                }
                                                ?>

                                            </div>
                                        </div>

                                        <div class="panel panel-default">
                                            <div class="panel-heading">Teléfono celular</div>
                                            <div class="panel-body" id="divdocentecelular_predocente_ad">
                                                <?php ECHO $mostrar["celular"]; ?>
                                            </div>
                                        </div> 

                                        <div class="panel panel-default">
                                            <div class="panel-heading">Operador Telefónico</div>
                                            <div class="panel-body" id="divdocenteotelefonico_predocente_ad">
                                                <?php ECHO $mostrar["operadoratelefonica"]; ?>
                                            </div>
                                        </div> 

                                        <div class="panel panel-default">
                                            <div class="panel-heading"> Correo/Facebook</div>
                                            <div class="panel-body" id="divdocentetecorreo_predocente_ad">
                                                <?php ECHO $mostrar["correo"]; ?>
                                            </div>
                                        </div> 


                                    </div>


                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                        <div class="panel panel-default">
                                            <div class="panel-heading"> Distrito </div>
                                            <div class="panel-body" id="divdocentedistrito_predocente_ad">
                                                <?php ECHO $mostrar["distrito"]; ?>
                                            </div>
                                        </div> 

                                        <div class="panel panel-default">
                                            <div class="panel-heading"> Sector </div>
                                            <div class="panel-body" id="divdocentesector_predocente_ad">
                                                <?php ECHO $mostrar["sector"]; ?>
                                            </div>
                                        </div> 



                                        <div class="panel panel-default">
                                            <div class="panel-heading"> Dirección </div>
                                            <div class="panel-body" id="divdocentedomicilio_predocente_ad">
                                                <?php ECHO $mostrar["domicilio"]; ?>
                                            </div>
                                        </div> 

                                        <div class="panel panel-default">
                                            <div class="panel-heading"> Punto de referencia </div>
                                            <div class="panel-body" id="divdocentepreferencia_predocente_ad">
                                                <?php ECHO $mostrar["puntoreferencia"]; ?>
                                            </div>
                                        </div> 

                                        <div class="panel panel-default">
                                            <div class="panel-heading"> Grado académico</div>
                                            <div class="panel-body" id="divdocentegacademico_predocente_ad">
                                                <?php ECHO $mostrar["gradoacademico"]; ?>
                                            </div>
                                        </div> 

                                        <div class="panel panel-default">
                                            <div class="panel-heading"> Especialidad </div>
                                            <div class="panel-body" id="divdocenteespecialidad_predocente_ad">
                                                <?php ECHO $mostrar["especialidad"]; ?>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row tab-pane fade" id="editarperfildocente">

                        <div class="container-fluid">

                            <div class="row">
                                <div  class="col-xs-5 col-sm-4 col-md-3 col-lg-3">
                                    <h4>Editar Perfil del Docente</h4>
                                    <hr>
                                    <img  class="img-responsive" src="<?php echo Yii::app()->request->baseUrl; ?>/img/photo.png" >
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <button class="btn btn-success autoajustable"  
                                                    id="btneditadocente_do" >Confirmar edición</button>
                                        </div>
                                    </div> 

                                </div>
                                <br>
                                <br>
                                <div class="col-xs-7 col-sm-8 col-md-9 col-lg-9">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">

                                        <div class="panel panel-default">
                                            <div class="panel-heading"> Género (*)</div>
                                            <div class="panel-body">
                                                <!--<div class="radio-inline">-->
                                                <label  class="radio-inline">
                                                    <input  type="radio" name="genero_docente_do" id="opciones_1" value="M" <?php if ($mostrar['genero'] == 'M') echo 'checked'; ?>>
                                                    Masculino
                                                </label>
                                                <!--</div>-->
                                                <!--<div class="radio-inline">-->
                                                <label  class="radio-inline">
                                                    <input type="radio" name="genero_docente_do" id="opciones_2" value="F" <?php if ($mostrar['genero'] == 'F') echo 'checked'; ?> >
                                                    Femenino
                                                </label>
                                                <!--</div>-->
                                            </div>
                                        </div>

                                        <div class="panel panel-default">
                                            <div class="panel-heading"> Fecha de Nacimiento (*) </div>
                                            <div class="panel-body">
                                                <?php
                                                $fecha = "";
                                                if ($mostrar["fechanacimiento"] != null) {
                                                    $fecha = date('Y-m-d', strtotime($mostrar["fechanacimiento"]));
                                                }
                                                ?>

                                                <input  type="date"  class="form-control" id="txtfechanacimientodocente_do"  value="<?= $fecha ?>" />   
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">Teléfono celular (*)</div>
                                            <div class="panel-body">
                                                <input class="form-control" title="9 dígitos" type="email" id="txtcelulardocente_do"  value="<?php echo $mostrar["celular"]; ?>"/>
                                            </div>
                                        </div>

                                        <div class="panel panel-default">
                                            <div class="panel-heading">Operador Telefónico (*)</div>
                                            <div class="panel-body" id="">

                                                <select class="form-control" id="cb_docentetotelefonico_do">
                                                    <?php
                                                    $otelefonicos = array("Claro", "Entel", "Movistar", "Bitel", "RPC", "RPE", "RPM", "Otros");

                                                    echo '<option value="0" >Seleccione su Operador Telefónico ...</option>';

                                                    foreach ($otelefonicos as $value)
                                                        if ($value == $mostrar["operadoratelefonica"])
                                                            echo '<option value="' . $value . '" selected>' . $value . '</option>';
                                                        else
                                                            echo '<option value="' . $value . '">' . $value . '</option>';
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="panel panel-default">
                                            <div class="panel-heading">Correo Electrónico / Facebook (*)</div>
                                            <div class="panel-body">
                                                <input class="form-control" placeholder="Ejem: lokito68@hotmail.com" title="Correo electrónico" type="text" id="txt_correoDocente_do"  value="<?php echo $mostrar["correo"]; ?>"/>
                                            </div>
                                        </div>

                                        <div class="panel panel-default">
                                            <div class="panel-heading"> Distrito (*)</div>
                                            <div class="panel-body">
                                                <select class="form-control" id="cb_distritoDocente_do">
                                                    <?php
                                                    $distritos = array("EL PORVENIR", "FLORENCIA DE MORA",
                                                        "HUANCHACO", "LA ESPERANZA", "LAREDO", "MOCHE", "POROTO", "SALAVERRY",
                                                        "SIMBAL", "VICTOR LARCO HERRERA");

                                                    echo '<option value="0" >Seleccione su distrito ...</option>';

                                                    foreach ($distritos as $value)
                                                        if ($value == $mostrar["distrito"])
                                                            echo '<option value="' . $value . '" selected>' . $value . '</option>';
                                                        else
                                                            echo '<option value="' . $value . '">' . $value . '</option>';
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">

                                        <div class="panel panel-default">
                                            <div class="panel-heading"> Sector (*)</div>
                                            <div class="panel-body">
                                                <input class="form-control" placeholder="Ejem: Rio Seco, Gran Chimú, etc." title="Sector" type="text" id="txt_sectorDocente_do"  value="<?php echo $mostrar["sector"]; ?>"/>
                                            </div>
                                        </div>

                                        <div class="panel panel-default">
                                            <div class="panel-heading"> Dirección (*)</div>
                                            <div class="panel-body">
                                                <input class="form-control" placeholder="Ejem: Av. Sánchez Carrión." title="Dirección" type="text" id="txt_direccionDocente_do"  value="<?php echo $mostrar["domicilio"]; ?>"/>
                                            </div>
                                        </div>

                                        <div class="panel panel-default">
                                            <div class="panel-heading"> Punto de referencia (*)</div>
                                            <div class="panel-body">
                                                <input class="form-control" placeholder="Ejem: Por la comisaria Sánchez Carrión." title="Dirección" type="text" id="txt_puntoreferenciaDocente_do"  value="<?php echo $mostrar["puntoreferencia"]; ?>"/>
                                            </div>
                                        </div>


                                        <div class="panel panel-default">
                                            <div class="panel-heading"> Grado académico (*)</div>
                                            <div class="panel-body" id="divdocentegacademico_predocente_ad">

                                                <select class="form-control" id="cbgacademicodocente_do">
                                                    <?php
                                                    $gacademico = array("Bachiller", "Licenciado", "Magister", "Doctor");

                                                    echo '<option value="0" >Seleccione su grado académico ...</option>';

                                                    foreach ($gacademico as $value)
                                                        if ($value == $mostrar["gradoacademico"])
                                                            echo '<option value="' . $value . '" selected>' . $value . '</option>';
                                                        else
                                                            echo '<option value="' . $value . '">' . $value . '</option>';
                                                    ?>
                                                </select>

                                            </div>
                                        </div> 

                                        <div class="panel panel-default">
                                            <div class="panel-heading"> Especialidad (*)</div>
                                            <div class="panel-body" id="divdocenteespecialidad_predocente_ad">

                                                <select class="form-control" id="cb_especialidadDocente_do">
                                                    <?php
                                                    $gacademico = array("Matemática", "Comunicación", "Inglés", "Arte", "Historia, Geografia y Economía"
                                                        , "Formación Ciudadana y Cívica", "Persona, Familia y Relaciones Humanas", "Educación Física", "Educación Religiosa",
                                                        "Ciencia, Tecnología y Ambiente", "Educación para el Trabajo","Dpto. de Psicología");

                                                    echo '<option value="0" >Seleccione su especialidad ...</option>';

                                                    foreach ($gacademico as $value)
                                                        if ($value == $mostrar["especialidad"])
                                                            echo '<option value="' . $value . '" selected>' . $value . '</option>';
                                                        else
                                                            echo '<option value="' . $value . '">' . $value . '</option>';
                                                    ?>
                                                </select>
                                            </div>
                                        </div> 

                                    </div>

                                    <!--data-toggle="modal" data-target="#modalAlert"-->
                                </div>

                            </div>
                        </div>

                    </div>

                    <!--PARA MOSTRAR DATOS DEL PERFIL ACADEMICO-->

                    <br>



                </div>
            </div>
        </div>
    </div>
</div>