
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="panel panel-default">
            <!--            <div class="panel-heading">
                            Basic Tabs
                        </div>-->
            <div class="panel-body">
                <ul class="nav nav-tabs">

                    <li class="active"><a href="#perfilalumno" data-toggle="tab">Perfil</a>
                    </li>
                    <li class=""><a href="#editarperfilalumno" data-toggle="tab">Editar Perfil</a>
                    </li>
                    <li class=""><a href="#perfilAcademicoAlumno" data-toggle="tab">Perfil Académico</a>
                    </li>

                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade active in" id="perfilalumno">

                        <div class="container-fluid">

                            <div class="row">
                                <div  class="col-xs-5 col-sm-4 col-md-3 col-lg-3">
                                    <h4>Datos del Alumno</h4>
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
                                            <div class="panel-heading"> Teléfono </div>
                                            <div class="panel-body">
                                                <?php ECHO $mostrar["telefono"]; ?>
                                            </div>
                                        </div>

                                        <div class="panel panel-default">
                                            <div class="panel-heading"> Celular</div>
                                            <div class="panel-body">
                                                <?php ECHO $mostrar["celular"]; ?>
                                            </div>
                                        </div> 

                                        <div class="panel panel-default">
                                            <div class="panel-heading"> Correo/Facebook</div>
                                            <div class="panel-body">
                                                <?php ECHO $mostrar["correo"]; ?>
                                            </div>
                                        </div> 


                                    </div>


                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                        <div class="panel panel-default">
                                            <div class="panel-heading"> Distrito </div>
                                            <div class="panel-body">
                                                <?php ECHO $mostrar["distrito"]; ?>
                                            </div>
                                        </div> 

                                        <div class="panel panel-default">
                                            <div class="panel-heading"> Sector </div>
                                            <div class="panel-body">
                                                <?php ECHO $mostrar["sector"]; ?>
                                            </div>
                                        </div> 



                                        <div class="panel panel-default">
                                            <div class="panel-heading"> Dirección </div>
                                            <div class="panel-body">
                                                <?php ECHO $mostrar["domicilio"]; ?>
                                            </div>
                                        </div> 

                                        <div class="panel panel-default">
                                            <div class="panel-heading"> Punto de referencia </div>
                                            <div class="panel-body">
                                                <?php ECHO $mostrar["puntoreferencia"]; ?>
                                            </div>
                                        </div> 

                                        <div class="panel panel-default">
                                            <div class="panel-heading"> Seguro médico </div>
                                            <div class="panel-body">
                                                <?php ECHO $mostrar["tiposeguro"]; ?>
                                            </div>
                                        </div> 


                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row tab-pane fade" id="editarperfilalumno">

                        <div class="container-fluid">

                            <div class="row">
                                <div  class="col-xs-5 col-sm-4 col-md-3 col-lg-3">
                                    <h4>Editar Perfil del Alumno</h4>
                                    <hr>
                                    <img  class="img-responsive" src="<?php echo Yii::app()->request->baseUrl; ?>/img/photo.png" >

                                </div>
                                <br>
                                <br>
                                <div class="col-xs-7 col-sm-8 col-md-9 col-lg-9">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                        <div class="panel panel-default">
                                            <div class="panel-heading"> Nombres </div>
                                            <div class="panel-body">
                                                <?= $mostrar["Nombre"]; ?>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading"> Apellidos </div>
                                            <div class="panel-body">
                                                <?= $mostrar["ApellidoPaterno"] . " " . $mostrar["ApellidoMaterno"]; ?>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading"> Teléfono </div>
                                            <div class="panel-body">
                                                <input class="form-control" title="Ej. 044203040" type="text" id="txttelefonoalumno_al"  value="<?= $mostrar["telefono"]; ?>" />
                                            </div>
                                        </div>

                                        <div class="panel panel-default">
                                            <div class="panel-heading"> DNI (*) </div>
                                            <div class="panel-body">
                                                <input class="form-control" type="text" id="txtdnialumno_al"  value="<?php ECHO $mostrar["DNI"]; ?>" />
                                            </div>
                                        </div>

                                        <div class="panel panel-default">
                                            <div class="panel-heading"> Género (*)</div>
                                            <div class="panel-body">
                                                <!--<div class="radio-inline">-->
                                                <label  class="radio-inline">
                                                    <input  type="radio" name="genero_alumno_al" id="opciones_1" value="M" <?php if ($mostrar['genero'] == 'M') echo 'checked'; ?>>
                                                    Masculino
                                                </label>
                                                <!--</div>-->
                                                <!--<div class="radio-inline">-->
                                                <label  class="radio-inline">
                                                    <input type="radio" name="genero_alumno_al" id="opciones_2" value="F" <?php if ($mostrar['genero'] == 'F') echo 'checked'; ?> >
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

                                                <input  type="date"  class="form-control" id="txtfechanacimientoalumno_al"  value="<?= $fecha ?>" />   
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading"> Celular</div>
                                            <div class="panel-body">
                                                <input class="form-control" title="9 dígitos" type="text" id="txtcelularalumno_al"  value="<?php echo $mostrar["celular"]; ?>"/>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">

                                        <div class="panel panel-default">
                                            <div class="panel-heading"> Distrito</div>
                                            <div class="panel-body">
                                                <select class="form-control" id="cb_distritoAlumno_al">
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

                                        <div class="panel panel-default">
                                            <div class="panel-heading"> Sector</div>
                                            <div class="panel-body">
                                                <input class="form-control" placeholder="Ejem: Rio Seco, Gran Chimú, etc." title="Sector" type="text" id="txt_sectorAlumno_al"  value="<?php echo $mostrar["sector"]; ?>"/>
                                            </div>
                                        </div>

                                        <div class="panel panel-default">
                                            <div class="panel-heading"> Dirección</div>
                                            <div class="panel-body">
                                                <input class="form-control" placeholder="Ejem: Av. Sánchez Carrión." title="Dirección" type="text" id="txt_direccionAlumno_al"  value="<?php echo $mostrar["domicilio"]; ?>"/>
                                            </div>
                                        </div>

                                        <div class="panel panel-default">
                                            <div class="panel-heading"> Punto de referencia</div>
                                            <div class="panel-body">
                                                <input class="form-control" placeholder="Ejem: Por la comisaria Sánchez Carrión." title="Dirección" type="text" id="txt_puntoreferenciaAlumno_al"  value="<?php echo $mostrar["puntoreferencia"]; ?>"/>
                                            </div>
                                        </div>


                                        <div class="panel panel-default">
                                            <div class="panel-heading"> Tipo de Seguro de Salud</div>
                                            <div class="panel-body">
                                                <select class="form-control" id="cb_seguroAlumno_al">

                                                    <?php
                                                    $seguros = array("No cuenta con seguro", "ESSALUD",
                                                        "SIS","Sanidad", "Seguro privado");

                                                    echo '<option value="0" >Seleccione su tipo de seguro ...</option>';

                                                    foreach ($seguros as $value)
                                                        if ($value == $mostrar["tiposeguro"])
                                                            echo '<option value="' . $value . '" selected>' . $value . '</option>';
                                                        else
                                                            echo '<option value="' . $value . '">' . $value . '</option>';
                                                    ?>

                                                </select>
                                            </div>
                                        </div>


                                        <div class="panel panel-default">
                                            <div class="panel-heading">Correo Electrónico / Facebook</div>
                                            <div class="panel-body">
                                                <input class="form-control" placeholder="Ejem: lokito68@hotmail.com" title="Correo electrónico" type="text" id="txt_correoAlumno_al"  value="<?php echo $mostrar["correo"]; ?>"/>
                                            </div>
                                        </div>





                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                                <button class="btn btn-success autoajustable"  
                                                        id="btneditaalumno_al" >Confirmar edición</button>
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


                    <div class="tab-pane fade" id="perfilAcademicoAlumno">

                        <div class="container-fluid">

                            <div class="row">

                                <div class="col-xs-7 col-sm-8 col-md-9 col-lg-9">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                        <div class="panel panel-default">
                                            <div class="panel-heading"> Filial </div>
                                            <div class="panel-body">
                                                <?php
                                                ECHO $dataMatriculados["filial"];
                                                ?>
                                            </div>
                                        </div>

                                        <div class="panel panel-default">
                                            <div class="panel-heading"> Nivel </div>
                                            <div class="panel-body">
                                                <?php ECHO $dataMatriculados["nivel"]; ?>
                                            </div>
                                        </div> 

                                        <div class="panel panel-default">
                                            <div class="panel-heading"> Grado/Año </div>
                                            <div class="panel-body">
                                                <?php
                                                echo $dataMatriculados["grado"];
                                                ?>

                                            </div>
                                        </div>

                                        <div class="panel panel-default">
                                            <div class="panel-heading"> Sección </div>
                                            <div class="panel-body">
                                                <?php ECHO $dataMatriculados["seccion"]; ?>
                                            </div>
                                        </div>


                                    </div>


                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">

                                        <div class="panel panel-default">
                                            <div class="panel-heading"> Año </div>
                                            <div class="panel-body">
                                                <?php ECHO $dataMatriculados["idanio"]; ?>
                                            </div>
                                        </div>

                                        <div class="panel panel-default">
                                            <div class="panel-heading"> Tipo Matrícula </div>
                                            <div class="panel-body">
                                                <?php
                                                ECHO $dataMatriculados["tipoMatricula"];
                                                ?>
                                            </div>
                                        </div>

                                        <div class="panel panel-default">
                                            <div class="panel-heading"> Fecha matrícula </div>
                                            <div class="panel-body">
                                                <?php
                                                ECHO $dataMatriculados["fechamatricula"];
                                                ?>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>