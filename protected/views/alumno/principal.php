<div class="container">
    <section class="row">
        <div class="col-xs-5 col-sm-5 col-md-3 col-lg-3">
            <h4><?php ECHO $mostrar["Nombre"];
echo " ";
echo $mostrar["ApellidoPaterno"];
echo " ";
echo $mostrar["ApellidoMaterno"]; ?></h4>
            <hr>
            <ul class="nav nav-pills nav-stacked">
                <li class="active">
                    <a href="<?php echo Yii::app()->request->baseUrl . '/alumno/notas'; ?>">Mis Notas</a>
                </li>
                <li class="active">
                    <a href="<?php echo Yii::app()->request->baseUrl . '/alumno/asistencias'; ?>">Mis Asistencias</a>
                </li>
                <li class="active">
                    <a href="<?php echo Yii::app()->request->baseUrl . '/alumno/datoApoderado'; ?>">Datos Apoderado</a>
                </li>
                <li class="active">
                    <a href="<?php echo Yii::app()->request->baseUrl . '/alumno/estadistica'; ?>">Estadisticas</a>
                </li>

                <li class="active">
                    <a href="<?php echo Yii::app()->request->baseUrl . '/alumno/verasistencias'; ?>">Estadisticas</a>
                </li>
            </ul>

        </div>

        <div class="col-xs-7 col-sm-7 col-md-6 col-lg-7">
            <!--<h3> <?php ECHO $mostrar["Nombre"];
echo " ";
echo $mostrar["ApellidoPaterno"];
echo " ";
echo $mostrar["ApellidoMaterno"]; ?></h3>
            <hr>
            <img  class="img-responsive" src="<?php echo Yii::app()->request->baseUrl; ?>/img/photo.png" >
            <br>-->
        </div>
                <?php if ($mostrar['DNI'] == 0 || $mostrar1['DNIapoderado'] == null) { ?>       
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-2">
                <h4>Registrar Datos</h4>
                <hr>
                <ul class="nav nav-pills nav-stacked">
                    <?php if ($mostrar['DNI'] == 0) { ?>
                        <li class="active">
                            <a href="<?php echo Yii::app()->request->baseUrl . '/alumno/ingresarAlumno'; ?>">Alumno</a>
                        </li>
            <?php } ?>
            <?php if ($mostrar1['DNIapoderado'] == null) { ?>
                        <li class="active">
                            <a href="<?php echo Yii::app()->request->baseUrl . '/alumno/busqueda'; ?>">Ingresar datos del Apoderado</a>
                        </li>
    <?php } ?>
                </ul>
                <br>
            </div>
<?php } ?>


    </section>


</div>
