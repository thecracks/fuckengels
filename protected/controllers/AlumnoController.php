<?php

class AlumnoController extends Controller {

    /**
     * Declares class-based actions.
     *
     *
     */
//    public $layout = '//layouts/alumno';
    public $layout = '//layouts/alumno2';

    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array('class' => 'CCaptchaAction', 'backColor' => 0xFFFFFF,),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array('class' => 'CViewAction',),);
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
        $idp = Yii::app()->user->id;

        $_SESSION['anio'] = date("Y");

        $cmdCargaCodigoMatricula = " CALL CARGA_CODIGO_MATRICULA_ALUMNO (" . $_SESSION['anio'] . "," . $idp . ");";
        $resulcodigoMatricula = Yii::app()->db->createCommand($cmdCargaCodigoMatricula)->queryRow();
//
        if (count($resulcodigoMatricula) == 0) {
            $_SESSION['codmatricula'] = -1;
        } else {
            $_SESSION['codmatricula'] = $resulcodigoMatricula['codigomatricula'];
        }

        ///////////////////////////////////////////////////////////////////////////

        $seleccion = Yii::app()->db->createCommand()
                ->select('*')
                ->from('persona')
                ->where('idpersona=:idpersona', array(':idpersona' => $idp))
                ->queryRow();


        $cmdCargaDatosMatriculados = " CALL CARGA_DATOS_ALUMNO_MATRICULADO(" . $idp . ");";
        $dataMatriculados = Yii::app()->db->createCommand($cmdCargaDatosMatriculados)->queryRow();

        $this->render('perfil_alumno', array('mostrar' => $seleccion, 'dataMatriculados' => $dataMatriculados));
    }

    //FILTROS
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    public function accessRules() {
        if (Yii::app()->user->getState('role') === "alumno") {
            return array(
                array('allow', // allow authenticated user to perform 'create' and 'update' actions
                    'actions' => array('*'),
                    'users' => array('@'),
                ),
//                array('deny', // deny all users
//                    'users' => array('*'),
//                ),
            );
        } else {
            return array(
                array('deny', // deny all users
                    'users' => array('*'),
                ),
            );
        }
    }

    /*
     * Inicio de barra de navegación
     */

//    public function actionPrincipal() {
//        $idp = Yii::app()->user->id;
//        // renders the view file 'protected/views/site/index.php'
//        // using the default layout 'protected/views/layouts/main.php'
//
//        $seleccion = Yii::app()->db->createCommand()
//                ->select('Nombre, ApellidoPaterno, ApellidoMaterno, DNI')
//                ->from('persona')
//                ->where('idpersona=:idpersona', array(':idpersona' => $idp))
//                ->queryRow();
//
//        $seleccion1 = Yii::app()->db->createCommand()
//                ->select('*')
//                ->from('alumno')
//                ->where('idalumno=:idalumno', array(':idalumno' => $idp))
//                ->queryRow();
//
//        $this->render('principal', array('mostrar' => $seleccion, 'mostrar1' => $seleccion1));
//
//        //$this -> render('principal');
//    }
    //PERFILA ALUMNOOOOOOOOOOOOO

    public function actionPerfil() {

        $idp = Yii::app()->user->id;

        $seleccion = Yii::app()->db->createCommand()
                ->select('*')
                ->from('persona')
                ->where('idpersona=:idpersona', array(':idpersona' => $idp))
                ->queryRow();


        $cmdCargaDatosMatriculados = " CALL CARGA_DATOS_ALUMNO_MATRICULADO(" . $idp . ");";
        $dataMatriculados = Yii::app()->db->createCommand($cmdCargaDatosMatriculados)->queryRow();

        $this->renderPartial('perfil_alumno', array('mostrar' => $seleccion, 'dataMatriculados' => $dataMatriculados));
    }

    public function actionActualiza_perfil() {
        $idp = Yii::app()->user->id;

        $dni = $_POST['dni'];
        $fechaN = $_POST["fechanamiento"];
        $cel = $_POST["celular"];
        $tel = $_POST["telefono"];
        $domicilio = $_POST["direccion"];

        $distrito = $_POST['distrito'];
        $sector = $_POST['sector'];
        $puntoReferencia = $_POST['preferencia'];
        $seguro = $_POST['seguro'];
        $correo = $_POST['correo'];
        $genero = $_POST['genero'];

        try {
            $command = Yii::app()->db->createCommand();
            //Actualizando datos...
            $command->update('persona', array(
                'DNI' => $dni,
                'celular' => $cel,
                'telefono' => $tel,
                'fechanacimiento' => $fechaN,
                'domicilio' => $domicilio,
                'distrito' => $distrito,
                'sector' => $sector,
                'puntoreferencia' => $puntoReferencia,
                'tiposeguro' => $seguro,
                'correo' => $correo,
                'genero' => $genero
                    ), 'idpersona=:idpersona', array(':idpersona' => $idp));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        echo 'ok';
    }

    //FIN PERFI ALUMNO

    /*
     * Fin de barra de navegación
     */


    //PERFIL APODERADO

    public function actionPerfil_apoderado() {

        $idp = Yii::app()->user->id;

        $cmdObtienedniAPoderado = Yii::app()->db->createCommand()
                ->select('DNIapoderado')
                ->from('alumno')
                ->where('idalumno=:idal', array(':idal' => $idp))
                ->queryRow();

        $dniApoderado = $cmdObtienedniAPoderado['DNIapoderado'];

        $cmdObtieneDatosApoderado = Yii::app()->db->createCommand()
                ->select('*')
                ->from('apoderado')
                ->where('DNIapoderado=:dni', array(':dni' => $dniApoderado))
                ->queryRow();

        $cmdObtieneDatosAlumno = Yii::app()->db->createCommand()
                ->select('*')
                ->from('alumno')
                ->where('idalumno=:idal', array(':idal' => $idp))
                ->queryRow();

        $this->renderPartial('perfil_apoderado', array('mostrar' => $cmdObtieneDatosApoderado, 'mostrar2' => $cmdObtieneDatosAlumno));
    }

    /*
     * Guardar Datos Apoderado
     */

    public function actionActualiza_perfilApoderado() {
//        $idp = Yii::app()->user->id;

        $dniA = $_POST['dni'];
        $nombreA = $_POST['nombre'];
        $ap = $_POST['ap'];
        $am = $_POST['am'];
        $c = $_POST['celular'];
        $o = $_POST['ocupacion'];

        $distrito = $_POST['distrito'];
        $sector = $_POST['sector'];
        $direccion = $_POST['direccion'];
        $puntoReferencia = $_POST['preferencia'];
        $correo = $_POST['correo'];
        $infoColegio = $_POST['infocolegio'];
        $especiOcupacion = $_POST['especiocupacion'];
        $genero = $_POST['genero'];

        try {
            $command = Yii::app()->db->createCommand();
            //Actualizando datos...
            $command->UPDATE('apoderado', array(
                'nombre' => $nombreA,
                'apellidoP' => $ap,
                'apellidoM' => $am,
                'celular' => $c,
                'ocupacion' => $o,
                'domicilio' => $direccion,
                'distrito' => $distrito,
                'sector' => $sector,
                'puntoreferencia' => $puntoReferencia,
                'infocolegio' => $infoColegio,
                'especiocupacion' => $especiOcupacion,
                'correo' => $correo,
                'genero' => $genero
                    ), 'DNIapoderado=:DNIapoderado', array(':DNIapoderado' => $dniA));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        echo 'ok';
    }

    public function actionActualiza_datos_padres_alumno() {
        $idp = Yii::app()->user->id;

        $nma = $_POST['nombremadre'];
        $npa = $_POST["nombrepadre"];
        $dnim = $_POST["dnimadre"];
        $dnip = $_POST["dnipadre"];


        try {
            $command = Yii::app()->db->createCommand();
            //Actualizando datos...
            $command->update('alumno', array(
                'nombreMadre' => $nma,
                'nombrePadre' => $npa,
                'dniMadre' => $dnim,
                'dniPadre' => $dnip,
                    ), 'idalumno=:idalumno', array(':idalumno' => $idp));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        echo 'ok';
    }

    // FIN PERFIL APODERADO

    /*
     * Fin guardar Datos del Apoderado
     */

//    public function actionConfirmarapoderado() {
//        $idp = Yii::app()->user->id;
//
//        $dniA = $_POST['txtDNIA'];
//
//        echo $idp;
//        echo $dniA;
//        echo "lag7yha8uahhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh";
//
//        $insert = Yii::app()->db->createCommand();
//        $insert->UPDATE('alumno', array(
//            'DNIapoderado' => $dniA
//                ), 'idalumno=:idalumno', array(':idalumno' => $idp));
//
//        $seleccion1 = Yii::app()->db->createCommand()
//                ->select('*')
//                ->from('alumno')
//                ->where('idalumno=:idalumno', array(':idalumno' => $idp))
//                ->queryRow();
//
//        $seleccion = Yii::app()->db->createCommand()
//                ->select('Nombre, ApellidoPaterno, ApellidoMaterno, DNI')
//                ->from('persona')
//                ->where('idpersona=:idpersona', array(':idpersona' => $idp))
//                ->queryRow();
//        $this->render('principal', array('mostrar' => $seleccion, 'mostrar1' => $seleccion1));
//    }

    /*
     * Busqueda DNI
     */

//    public function actionBusqueda() {
//        $idp = Yii::app()->user->id;
//        // renders the view file 'protected/views/site/index.php'
//        // using the default layout 'protected/views/layouts/main.php'
//
//        $seleccion = Yii::app()->db->createCommand()
//                ->select('Nombre, ApellidoPaterno, ApellidoMaterno, DNI, fechanacimiento,celular,telefono, domicilio')
//                ->from('persona')
//                ->where('idpersona=:idpersona', array(':idpersona' => $idp))
//                ->queryRow();
//
//        $this->render('ventanaEmergente/busqueda', array('mostrar' => $seleccion));
//    }
//    public function actionBusquedaapoderado() {
//
//        $idp = Yii::app()->user->id;
//
//        // renders the view file 'protected/views/site/index.php'
//        // using the default layout 'protected/views/layouts/main.php'
//
//        $seleccion1 = Yii::app()->db->createCommand()
//                ->select('Nombre, ApellidoPaterno, ApellidoMaterno, DNI, fechanacimiento,celular,telefono, domicilio')
//                ->from('persona')
//                ->where('idpersona=:idpersona', array(':idpersona' => $idp))
//                ->queryRow();
//
//        $dniA = $_POST['txtDNIA'];
//
//        $seleccion = Yii::app()->db->createCommand()
//                ->select('*')
//                ->from('apoderado')
//                ->where('DNIapoderado=:DNIapoderado', array(':DNIapoderado' => $dniA))
//                ->queryRow();
//
//        if ($seleccion["DNIapoderado"] == $dniA) {
//            if ($seleccion["nombre"] == null) {
//                $this->render('ventanaEmergente/ingresarApoderado', array('mostrar' => $seleccion));
//            } else
//                $this->render('ventanaEmergente/registrarApoderado', array('mostrar' => $seleccion));
//        }
//        else {
//            $this->render('ventanaEmergente/problemaDNI', array('mostrar' => $seleccion1));
//        }
//    }

    /*
     * FIn busqueda
     */

    //Fin Almacenar Datos

    public function actionDatoalumno() {
        $mostrando = persona::model();
        $mostrar = $mostrando->findAll();

        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $this->render('ajax/datoAlumno', array('datitos' => $mostrar));
    }

    /*
     * Mostrar Datos Apoderado
     */

    public function actionDatoapoderado() {
        $idp = Yii::app()->user->id;

        $seleccion = Yii::app()->db->createCommand()
                ->select('*')
                ->from('alumno')
                ->where('idalumno=:idalumno', array(':idalumno' => $idp))
                ->queryRow();

        $datosA = Yii::app()->db->createCommand()
                ->select('*')
                ->from('apoderado')
                ->where('DNIapoderado=:DNIapoderado', array(':DNIapoderado' => $seleccion["DNIapoderado"]))
                ->queryRow();
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $this->render('ajax/datoApoderado', array('mostrar' => $datosA));
    }

    /*
     * Fin mostrar datos del apoderado
     */

    //////////INICIO SEGUIMIENTO EVALUACION

    public function actionSeguimiento_evaluacion() {

        $codigoMatricula = $_SESSION['codmatricula'];

        $cmdareasalumno = " CALL CARGA_AREAS_PARA_ALUMNO(" . $codigoMatricula . ");";
        $dataareasalumno = Yii::app()->db->createCommand($cmdareasalumno)->queryAll();

        $this->renderPartial('seguimiento_evaluacion', array(
            'dataareasalumno' => $dataareasalumno));
    }

    public function actionCargatablanotas() {
        
        $idanio = $_SESSION['anio'];
        $codigoMatricula = $_SESSION['codmatricula'];
        $idarea = $_POST['idarea'];
        $idbimestre = $_POST['idbimestre'];

        $arrayNotasEvaluaciones = array();
        $arraycabeceracapacidad = array();
        $cuentacolspan = 0;
        $tempidcomp = 0;

        $cmdcargaevaluaciones = " CALL CARGA_EVALUACIONES_PARA_MOSTRAR(" . $idanio . "," . $idarea . ");";
        $dataaevaluaciones = Yii::app()->db->createCommand($cmdcargaevaluaciones)->queryAll();


        $cmdcursos = " CALL CARGA_CURSOS_POR_AREA(" . $idarea . "," . $codigoMatricula . ");";
        $datacursos = Yii::app()->db->createCommand($cmdcursos)->queryAll();


        foreach ($dataaevaluaciones as $filaevaluacion) {

            $idcompetencia = $filaevaluacion['idcompetencia'];
            $idevaluacion = $filaevaluacion['idevaluacion'];

            if ($idcompetencia != $tempidcomp) {
                if ($cuentacolspan != 0)
                    array_push($arraycabeceracapacidad, array('ncol' => $cuentacolspan, 'capacidad' => $nomCapacidad));
                $tempidcomp = $idcompetencia;
                $nomCapacidad = $filaevaluacion['competencia'];
                $cuentacolspan = 1;
            }else {
                $cuentacolspan++;
            }

            $arraytemp = array();

            foreach ($datacursos as $filacurso) {

                $idcurso = $filacurso['idcurso'];

                $cmdnotas = " CALL CARGA_NOTAS_PARA_MOSTRAR(" . $idbimestre . "," . $codigoMatricula . "," . $idcurso . "," . $idcompetencia . "," . $idevaluacion . ");";
                $nota = Yii::app()->db->createCommand($cmdnotas)->queryRow();

                array_push($arraytemp, $nota['nota']);
            }
            array_push($arrayNotasEvaluaciones, $arraytemp);
        }

        array_push($arraycabeceracapacidad, array('ncol' => $cuentacolspan, 'capacidad' => $nomCapacidad));

        $cantidadColumnas = count($arrayNotasEvaluaciones);
        $cantidadFilas = count($arrayNotasEvaluaciones[0]);

        $arrayDataNuevo = array();

        for ($fila = 0; $fila < $cantidadFilas; $fila++) {
            for ($colu = 0; $colu < $cantidadColumnas; $colu++) {
                $arrayDataNuevo[$fila][$colu] = $arrayNotasEvaluaciones[$colu][$fila];
            }
        }

//        echo '<pre>';
//        print_r($dataaevaluaciones);
//        echo '</pre>';
//
//
//        echo '<pre>';
//        print_r($datacursos);
//        echo '</pre>';
//
//
//        echo '<pre>';
//        print_r($arraycabeceracapacidad);
//        echo '</pre>';
//
//        echo '<pre>';
//        print_r($arrayNotasEvaluaciones);
//        echo '</pre>';
//        
//        echo '<pre>';
//        print_r($arrayDataNuevo);
//        echo '</pre>';
//        
        

        $this->renderPartial('ajax_tablas/tabla_notas_evaluaciones', array(
            'arraycabeceracapacidad' => $arraycabeceracapacidad, 'datacursos' => $datacursos,
            'dataaevaluaciones' => $dataaevaluaciones, 'arrayNotasEvaluaciones' => $arrayDataNuevo));
    }

    //////////// FIN SEGUIMIENTO EVALUCION


    public function actionEstadistica() {

        $idanio = $_SESSION['anio'];
        $codigoMatricula = $_SESSION['codmatricula'];

        $pb1 = 0;
        $pb2 = 0;
        $pb3 = 0;
        $pb4 = 0;
        $pf = 0;
        $cuentaCurso = 0;

        $arrayNotasBimetres = array();

        $cmdpromediosxanio = " CALL REPORTE_PROMEDIOS_BIMESTRALES_X_ALUMNO(" . $codigoMatricula . ");";
        $promedioBimestre = Yii::app()->db->createCommand($cmdpromediosxanio)->queryAll();

        foreach ($promedioBimestre as $fila) {

            $cuentaCurso++;

            $pb1 = $pb1 + $fila['b1'];
            $pb2 = $pb2 + $fila['b2'];
            $pb3 = $pb3 + $fila['b3'];
            $pb4 = $pb4 + $fila['b4'];
            $pf = $pf + $fila['pc'];

            array_push($arrayNotasBimetres, array('name' => $fila['Curso'], 'data' => array(intval($fila['b1']), intval($fila['b2']), intval($fila['b3']), intval($fila['b4']))));
        }

        $pb1 = $pb1 / $cuentaCurso;
        $pb2 = $pb2 / $cuentaCurso;
        $pb3 = $pb3 / $cuentaCurso;
        $pb4 = $pb4 / $cuentaCurso;
        $pf = $pf / $cuentaCurso;


        echo $this->renderPartial('estadistica', array('promedioBimestre' => $promedioBimestre,
            'pb1' => $pb1, 'pb2' => $pb2, 'pb3' => $pb3, 'pb4' => $pb4, 'pf' => $pf,
            'arrayNotasBimetres' => $arrayNotasBimetres), true);

        echo 'ok';
    }

    public function actionEstadistica2() {

        $idanio = $_SESSION['anio'];
        $codigoMatricula = $_SESSION['codmatricula'];

        $arrayNotasBimetres = array();

        $cmdpromediosxanio = " CALL REPORTE_PROMEDIOS_BIMESTRALES_X_ALUMNO(" . $codigoMatricula . ");";
        $promedioBimestre = Yii::app()->db->createCommand($cmdpromediosxanio)->queryAll();

        foreach ($promedioBimestre as $fila) {
            array_push($arrayNotasBimetres, array('name' => $fila['Curso'], 'data' => array(intval($fila['b1']), intval($fila['b2']), intval($fila['b3']), intval($fila['b4']))));
        }


        $this->layout = '//layouts/vacio';

        $this->render('estadistica2', array(
            'arrayNotasBimetres' => $arrayNotasBimetres));
    }

    /*
     * Funciones para las muestrars de Notas y Asistencias de los Alumnos
     */

    ////////////////////////////////////
    ////////////////////////////////////
    ////////////////////////////////////
    //////////// VISTA DE ASISTENCIAS ALUMNO
    ////////////////////////////////////
    ////////////////////////////////////

    public function actionVerAsistencias() {

        $anio = $_SESSION['anio'];
        $codigoMatricula = $_SESSION['codmatricula'];

        $cmdAsistenciasAnuales = " CALL REPORTE_ASISTENCIA_X_ANIO(" . $anio . "," . $codigoMatricula . ");";
        $datosAsistencias = Yii::app()->db->createCommand($cmdAsistenciasAnuales)->queryAll();


        echo $this->renderPartial('asistencias', array('datosAsistencias' =>
            $datosAsistencias), TRUE);
    }

    public function actionVercalendario() {

        $this->render(
                'calendario');
    }

    public function actionAjax_retorna_fechas_anuales() {

        $anio = $_SESSION['anio'];
        $codigoMatricula = $_SESSION['codmatricula'];

        $cmdFechasAnuales = " CALL LISTADO_FECHAS_ANUALES(" . $anio . "," . $codigoMatricula . " );";
        $listaFechas = Yii::app()->db->createCommand($cmdFechasAnuales)->queryAll();

        echo json_encode($listaFechas, JSON_PRETTY_PRINT);
    }

    ////////////////////////////////////
    ////////////////////////////////////
    ////////////////////////////////////
    //////////// FIN VISTA DE ASISTENCIAS ALUMNO
    ////////////////////////////////////
    ////////////////////////////////////
    ///Boletin notas
    public function actionBoletinNotas() {

        $idp = Yii::app()->user->id;

        $BoletinNotas = " CALL BOLETIN_NOTAS('" . $idp . "');";
        $datos = Yii::app()->db->createCommand($BoletinNotas)->queryAll();

        $this->renderPartial('boletinNotas', array('mostrar' => $datos));
    }

    /*
     * Funciones para las muestrars de Notas y Asistencias de los Alumnos
     */

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->
                    isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the contact page
     */
    public function actionContact() {
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
                $subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
                $headers = "From: $name <{$model->email}>\r\n" . "Reply-To: {$model->email}\r\n" . "MIME-Version: 1.0\r\n" . "Content-Type: text/plain; charset=UTF-8";

                mail(Yii::app()->params['adminEmail'], $subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model));
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {
        $model = new LoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->
                            login())
                $this->redirect(Yii::app()->user->returnUrl);
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->request->baseUrl . '/principal/login');
    }

}
