
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="panel panel-default">
            <!--            <div class="panel-heading">
                            Basic Tabs
                        </div>-->
            <div class="panel-body">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#perfilapoderado" data-toggle="tab">Perfil Apoderado</a>
                    </li>
                    <li class=""><a href="#editarperfilapoderado" data-toggle="tab">Editar Perfil Apoderado</a>
                    </li>
                    <li class=""><a href="#tabdatospadres_perfilapod_al" data-toggle="tab">Datos padre y madre</a>
                    </li>

                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade active in" id="perfilapoderado">

                        <div class="container-fluid">

                            <div class="row">
                                <div  class="col-xs-5 col-sm-4 col-md-3 col-lg-3">
                                    <h4>Datos del Apoderado</h4>
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
                                                ECHO $mostrar["nombre"];
                                                echo " ";
                                                echo $mostrar["apellidoP"];
                                                echo " ";
                                                echo $mostrar["apellidoM"];
                                                ?>
                                            </div>
                                        </div>

                                        <div class="panel panel-default">
                                            <div class="panel-heading"> DNI </div>
                                            <div class="panel-body">
                                                <?php ECHO $mostrar["DNIapoderado"]; ?>
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
                                            <div class="panel-heading"> Celular</div>
                                            <div class="panel-body">
                                                <?php ECHO $mostrar["celular"]; ?>
                                            </div>

                                        </div> 

                                        <div class="panel panel-default">
                                            <div class="panel-heading"> Ocupación</div>
                                            <div class="panel-body">
                                                <?php echo $mostrar["ocupacion"]; ?>
                                            </div>
                                        </div>

                                        <div class="panel panel-default">
                                            <div class="panel-heading"> Ocupación específica </div>
                                            <div class="panel-body">

                                                <?php ECHO $mostrar["especiocupacion"]; ?>
                                            </div>
                                        </div>



                                    </div>




                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                        <!--aaaaaaaaaaaaaa-->

                                        <div class="panel panel-default">
                                            <div class="panel-heading">Correo Electrónico / Facebook</div>
                                            <div class="panel-body">
                                                <?php echo $mostrar["correo"]; ?>
                                            </div>
                                        </div>

                                        <div class="panel panel-default">
                                            <div class="panel-heading"> Distrito</div>
                                            <div class="panel-body">
                                                <?php echo $mostrar["distrito"]; ?>
                                            </div>
                                        </div>

                                        <div class="panel panel-default">
                                            <div class="panel-heading"> Sector</div>
                                            <div class="panel-body">
                                                <?php echo $mostrar["sector"]; ?>
                                            </div>
                                        </div>

                                        <div class="panel panel-default">
                                            <div class="panel-heading"> Dirección</div>
                                            <div class="panel-body">
                                                <?php echo $mostrar["domicilio"]; ?>
                                            </div>
                                        </div>

                                        <div class="panel panel-default">
                                            <div class="panel-heading"> Punto de referencia</div>
                                            <div class="panel-body">
                                                <?php echo $mostrar["puntoreferencia"]; ?>
                                            </div>
                                        </div>

                                        <div class="panel panel-default">
                                            <div class="panel-heading"> ¿Cómo se entero del colegio?</div>
                                            <div class="panel-body">
                                                <?php echo $mostrar["infocolegio"]; ?>
                                            </div>
                                        </div>

                                        <!--aaaaaaaaaaaaaaaaaaaaaaaaaaaaaa-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row tab-pane fade" id="editarperfilapoderado">
                        <div class="container-fluid">
                            <div class="row">
                                <div  class="col-xs-5 col-sm-4 col-md-3 col-lg-3">
                                    <h4>Editar Perfil del Poderado</h4>
                                    <hr>
                                    <img  class="img-responsive" src="<?php echo Yii::app()->request->baseUrl; ?>/img/photo.png" >

                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <button class="btn btn-success autoajustable"  
                                                    id="btneditaapoderado_al" >Confirmar edición</button>
                                        </div>
                                    </div> 
                                </div>
                                <br>
                                <br>
                                <div class="col-xs-7 col-sm-8 col-md-9 col-lg-9">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                        <div class="panel panel-default">
                                            <div class="panel-heading"> Nombres </div>
                                            <div class="panel-body">
                                                <input class="form-control"  type="text" id="txtnombreapoderado_al"  value="<?= $mostrar["nombre"]; ?>" />
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading"> Apellido Paterno </div>
                                            <div class="panel-body">
                                                <input class="form-control"  type="text" id="txtapellidoPapoderado_al"  value="<?= $mostrar["apellidoP"]; ?>" />
                                            </div>
                                        </div>

                                        <div class="panel panel-default">
                                            <div class="panel-heading"> Apellido Materno </div>
                                            <div class="panel-body">
                                                <input class="form-control"  type="text" id="txtapellidoMapoderado_al"  value="<?= $mostrar["apellidoM"]; ?>" />
                                            </div>
                                        </div>

                                        <div class="panel panel-default">
                                            <div class="panel-heading"> DNI (*) </div>
                                            <div class="panel-body">
                                                <?php ECHO $mostrar["DNIapoderado"]; ?>
                                                <input type="hidden" id="txtdniapoderado_al" value="<?php ECHO $mostrar["DNIapoderado"]; ?>" />
                                            </div>
                                        </div>


                                        <div class="panel panel-default">
                                            <div class="panel-heading"> Género (*)</div>
                                            <div class="panel-body">
                                                <!--<div class="radio-inline">-->
                                                <label  class="radio-inline">
                                                    <input  type="radio" name="genero_apoderado_al" id="opciones_1" value="M" <?php if ($mostrar['genero'] == 'M') echo 'checked'; ?>>
                                                    Masculino
                                                </label>
                                                <!--</div>-->
                                                <!--<div class="radio-inline">-->
                                                <label  class="radio-inline">
                                                    <input type="radio" name="genero_apoderado_al" id="opciones_2" value="F" <?php if ($mostrar['genero'] == 'F') echo 'checked'; ?> >
                                                    Femenino
                                                </label>
                                                <!--</div>-->
                                            </div>
                                        </div>

                                        <div class="panel panel-default">
                                            <div class="panel-heading"> Celular</div>
                                            <div class="panel-body">
                                                <input class="form-control" title="9 dígitos" type="text" id="txtcelularapoderado_al"  value="<?php echo $mostrar["celular"]; ?>"/>
                                            </div>
                                        </div>

                                        <div class="panel panel-default">
                                            <div class="panel-heading">Correo Electrónico / Facebook</div>
                                            <div class="panel-body">
                                                <input class="form-control" placeholder="Ejem: lokito68@hotmail.com" 
                                                       title="Correo electrónico" type="text" id="txt_correoApoderado_al"  value="<?php echo $mostrar["correo"]; ?>"/>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">

                                        <div class="panel panel-default">
                                            <div class="panel-heading"> Distrito</div>
                                            <div class="panel-body">
                                                <select class="form-control" id="cb_distritoApoderado_al">
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
                                                <input class="form-control" placeholder="Ejem: Rio Seco, Gran Chimú, etc." title="Sector" type="text" id="txt_sectorApoderado_al"  value="<?php echo $mostrar["sector"]; ?>"/>
                                            </div>
                                        </div>

                                        <div class="panel panel-default">
                                            <div class="panel-heading"> Dirección</div>
                                            <div class="panel-body">
                                                <input class="form-control" placeholder="Ejem: Av. Sánchez Carrión." title="Dirección" type="text" id="txt_direccionApoderado_al"  value="<?php echo $mostrar["domicilio"]; ?>"/>
                                            </div>
                                        </div>

                                        <div class="panel panel-default">
                                            <div class="panel-heading"> Punto de referencia</div>
                                            <div class="panel-body">
                                                <input class="form-control" placeholder="Ejem: Por la comisaria Sánchez Carrión." title="Dirección" type="text" id="txt_puntoreferenciaApoderado_al"  value="<?php echo $mostrar["puntoreferencia"]; ?>"/>
                                            </div>
                                        </div>


                                        <div class="panel panel-default">
                                            <div class="panel-heading"> ¿Cómo se entero del colegio?</div>
                                            <div class="panel-body">
                                                <select class="form-control" id="cb_medioApoderado_al">

                                                    <?php
                                                    $medios = array("Recomendación", "Radio",
                                                        "TV", "Bolantes", "Perifoneo");

                                                    echo '<option value="0" >Seleccione un medio ...</option>';

                                                    foreach ($medios as $value)
                                                        if ($value == $mostrar["infocolegio"])
                                                            echo '<option value="' . $value . '" selected>' . $value . '</option>';
                                                        else
                                                            echo '<option value="' . $value . '">' . $value . '</option>';
                                                    ?>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="panel panel-default">
                                            <div class="panel-heading"> Ocupación</div>
                                            <div class="panel-body">
                                                <select class="form-control" id="cb_ocupacionApoderado_al">

                                                    <?php
                                                    $ocupaciones = array("Trabajo de Oficio", "Trabajo de casa",
                                                        "Profesional técnico", "Profesional universitario");

                                                    echo '<option value="0" >Seleccione un tipo de ocupación ...</option>';

                                                    foreach ($ocupaciones as $value)
                                                        if ($value == $mostrar["ocupacion"])
                                                            echo '<option value="' . $value . '" selected>' . $value . '</option>';
                                                        else
                                                            echo '<option value="' . $value . '">' . $value . '</option>';
                                                    ?>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="panel panel-default">
                                            <div class="panel-heading"> Especificar ocupación (*) </div>
                                            <div class="panel-body">

                                                <input type="text" class="form-control" id="txt_especiocupacionApoderado_al" value="<?php ECHO $mostrar["especiocupacion"]; ?>" />
                                            </div>
                                        </div>



                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row tab-pane fade" id="tabdatospadres_perfilapod_al">

                        <div class="container-fluid">
                            <br>



                            <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6" id="divestatusdatosp_perfilapo_al">

                                    </div>

                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                        <div class="panel panel-default">
                                            <div class="panel-heading"> Nombre completo de la madre <img id="imgedita_nombre_madre_perfilapod_al"  class="puntero tamminiincono" src="<?php echo Yii::app()->request->baseUrl; ?>/img/editar.png" > </div>
                                            <div class="panel-body" id="divnombremadre">
                                                <?= $mostrar2["nombreMadre"]; ?>
                                            </div>
                                        </div>

                                        <div class="panel panel-default">
                                            <div class="panel-heading"> DNI de la madre <img id="imgedita_dni_madre_perfilapod_al"  class="puntero tamminiincono" src="<?php echo Yii::app()->request->baseUrl; ?>/img/editar.png" > </div>
                                            <div class="panel-body" id="divDNImadre">
                                                <?= $mostrar2["dniMadre"]; ?>
                                            </div>
                                        </div>



                                    </div>


                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                        <div class="panel panel-default">
                                            <div class="panel-heading"> Nombre completo del padre <img id="imgedita_nombre_padre_perfilapod_al"  class="puntero tamminiincono" src="<?php echo Yii::app()->request->baseUrl; ?>/img/editar.png" ></div>
                                            <div class="panel-body" id="divnombrepadre">
                                                <?= $mostrar2["nombrePadre"]; ?>
                                            </div>
                                        </div>

                                        <div class="panel panel-default">
                                            <div class="panel-heading"> DNI de la padre <img id="imgedita_dni_padre_perfilapod_al"  class="puntero tamminiincono" src="<?php echo Yii::app()->request->baseUrl; ?>/img/editar.png" > </div>
                                            <div class="panel-body" id="divDNIpadre">
                                                <?= $mostrar2["dniPadre"]; ?>
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







<!--PARA LA ADVERTENCIA VENTANA AGREGA NOMBRES COMPLETOS-->
<div class="modal  fade in " id="modalIngresanombrepadres_perfilapod_al" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" >

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close " data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 id="lbEncabezadoAlert">INGRESA NOMBRE</h4>

            </div>

            <div class="modal-body">
                <div class="row">
                    <label class="col-lg-12 control-label">Escriba su nombre:</label>
                </div>
                <br>
                <div class="row">
                    <input id="txtdnombrepadres_perfilapod_al" value="" class="form-control" placeholder="Ejm: Jesús María Pérez Ortega" type="email"/>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="btnConfirmdatospadres_nombre_perfilapod_aal">Aceptar</button>
                <button type="button" data-dismiss="modal" class="btn btn-success">Cancelar</button>
            </div> 
        </div>
    </div>
</div>  
<!--FIN PARA LA ADVERTENCIA-->







<!--PARA LA ADVERTENCIA VENTANA AGREGA DNIS -->
<div class="modal  fade in " id="modalIngresaDNIpadres_perfilapod_al" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" >

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close " data-dismiss="modal" aria-hidden="true">&times;</button>

                <h4 id="lbEncabezadoAlert">INGRESA DNI</h4>

            </div>

            <div class="modal-body">
                <div class="row">
                    <label class="col-lg-12 control-label">Escriba el DNI correspondiente: </label>
                </div>
                <br>
                <div class="row">
                    <input id="txtdnipadres_perfilapod_al" value="" class="form-control" placeholder="Ejm: 47474747 (8 dig.)" type="email"/>              
                </div>

            </div>
            <div class="modal-footer">
                <button type="button"  class="btn btn-success" id="btnConfirmdatospadres_dni_perfilapod_aal">Aceptar</button>
                <button type="button" data-dismiss="modal" class="btn btn-success">Cancelar</button>
            </div> 
        </div>
    </div>
</div>  
<!--FIN PARA LA ADVERTENCIA-->