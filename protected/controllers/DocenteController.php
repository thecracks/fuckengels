<?php

class DocenteController extends Controller {

//    public $layout = '//layouts/docente2';

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

     
        date_default_timezone_set('America/Lima');

        $iddocente = Yii::app()->user->id;

        $this->layout = $_SESSION['layoutrol'];

        $cmdCargafilial = " CALL CARGA_FILIAL_PARA_DOCENTE( " . $iddocente . ");";
        $dataFilial = Yii::app()->db->createCommand($cmdCargafilial)->queryAll();

        if (!isset($_SESSION['idfilial']) && !isset($_SESSION['nombreFilial'])) {
            $_SESSION['idfilial'] = $dataFilial[0]['idfilial'];
            $_SESSION['nombreFilial'] = $dataFilial[0]['Distrito'];
        }

        $cmdCargaanio = " CALL CARGA_ANIOS_PARA_DOCENTE( " . $iddocente . ");";
        $dataAnio = Yii::app()->db->createCommand($cmdCargaanio)->queryAll();

        if (!isset($_SESSION['anio'])) {
            $_SESSION['anio'] = $dataAnio[0]['idanio'];
        }

        $this->render('principal');
    }

    //FILTROSSSSSSSSSSSSSSSSSSS

    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    public function accessRules() {
        if (Yii::app()->user->getState('role') === "docente") {
            return array(
                array('allow', // allow authenticated user to perform 'create' and 'update' actions
                    'actions' => array('*'),
                    'users' => array('@'),
                ),
            );
        } else {
            return array(
                array('deny', // deny all users
                    'users' => array('*'),
                ),
            );
        }
    }

    //GENERAL


    public function actionRegistro_notas() {
        $this->renderPartial('registro_notas');
    }

//    public function actionCurso() {
//        $this->render('tabla_notas_bimestre');
//    }

    public function actionAjax_carga_cursosasignados() {

        $idanio = $_SESSION['anio'];
        $idfilial = $_SESSION['idfilial'];
        $iddocente = Yii::app()->user->id;

        $cmdCargaCursosAsignados = " CALL CARGA_CURSOSASIGNADOS_X_DOCENTE(" . $idanio . "," . $iddocente . "," . $idfilial . ");";
        $dataCursosAsignados = Yii::app()->db->createCommand($cmdCargaCursosAsignados)->queryAll();
        $this->renderPartial('ajaxf/_tablacursos', array('datosCursos' => $dataCursosAsignados));
    }

    public function actionAjax_carga_combobox_bimestre() {
        $_SESSION['idcurso'] = $_POST['idcurso'];
        echo 'ok';
//        $this->renderPartial('ajaxf/_comboboxbimestre');
    }

    public function actionAjax_carga_tabla_notaxbimestre() {

//        $idanio = $_SESSION['anio'];
        $idcurso = $_SESSION['idcurso'];

        $idbimistre = $_POST['bimestre'];
        $_SESSION['idbimestre'] = $idbimistre;

        $arrayIdsCabecera = array();
        $arrayCabecera = array();
        $arrayCompetencias = array();
        $arrayData = array();
        $arrayPesos = array();
        $arrayControlCapacidades = array();
        $arrayControlBimestre = array();

        $cmdDatosCurso = " CALL CARGA_DATOSCURSOASIGNADO_DOCENTE(" . $idcurso . ");";
        $DatosCursoasignado = Yii::app()->db->createCommand($cmdDatosCurso)->queryRow();


        $cmdNombresYapellidos = " CALL CARGA_ALUMNOS_X_CURSOASIGNADO(" . $idcurso . ");";
        $dataNombresyApellidos = Yii::app()->db->createCommand($cmdNombresYapellidos)->queryAll();

        if (count($dataNombresyApellidos) > 0) {

            $id = 2;
            $arrayCabecera[0] = "id";
            $arrayCabecera[1] = "AN";

            $arrayIdsCabecera[1] = "";
            $arrayPesos[1] = "";
            $arrayTotales = array();


            $j = 0;
            foreach ($dataNombresyApellidos as $filaNombre) {
                $arrayData[0][$j] = $filaNombre['idpersona'];
                $arrayData[1][$j] = $filaNombre['Nombre'];
                $j++;
            }

            $sumaPesosCapacidades = 0;

            $cmdIdsCompetencias = " CALL CARGA_IDCAPACIDADES_X_CURSOASIGNADO(" . $idcurso . ");";
            $idsCompetencias = Yii::app()->db->createCommand($cmdIdsCompetencias)->queryAll();

            $cuentaCompetencias = 0;

            foreach ($idsCompetencias as $competencia) {

                $idCompetencia = $competencia['idCOMPETENCIAS'];
                $descripcionCompetencia = $competencia['descripcion'];
                $pesoCompetencia = $competencia['peso'];

                $cmdIdsEvaluaciones = " CALL CARGA_IDEVALUACIONES_X_CAPACIDAD(" . $idCompetencia . "," . $idcurso . ");";
                $idsEvaluaciones = Yii::app()->db->createCommand($cmdIdsEvaluaciones)->queryAll();

                $sumaPesosEvaluaciones = 0;

                $cuentaEvaluaciones = 0;

                foreach ($idsEvaluaciones as $evaluacion) {

                    $idevaluacion = $evaluacion['idevaluacion'];
                    $pesoEvaluacion = $evaluacion['peso'];

                    $arrayIdsCabecera[$id] = "E-" . $idevaluacion . "_C-" . $idCompetencia;
                    $arrayPesos[$id] = $pesoEvaluacion;

                    $sumaPesosEvaluaciones = $sumaPesosEvaluaciones + $pesoEvaluacion;

                    $arrayControlCapacidades[$idCompetencia][$cuentaEvaluaciones] = $id;
                    $cuentaEvaluaciones++;

                    //PARA CARGAR LAS NOTAS POR EVALUACION  DE LOS ALUMNOS
                    $cmdNotasXevaluacion = " CALL CARGA_NOTAS_X_EVALUACION(" . $idCompetencia . "," . $idevaluacion . "," . $idcurso . "," . $idbimistre . ");";
                    $notasEvaluacion = Yii::app()->db->createCommand($cmdNotasXevaluacion)->queryAll();

                    $j = 0;
                    foreach ($notasEvaluacion as $nota) {
                        $arrayData[$id][$j] = $nota['nota'];
                        $j++;
                    }

                    //$arrayCompetencias[$descripcionCompetencia] = $j;
                    $arrayCabecera[$id] = $evaluacion['descripcion'];
                    $id++;
                }
                $arrayCompetencias[$descripcionCompetencia] = $cuentaEvaluaciones;

                //PARA CARGAR LOS DATOS DE LAS PROMEDIOS POR CAPACIDAD DE LOS ALUMNOS
                $cmdPromediosXcompetencia = " CALL CARGA_PROMEDIOS_X_COMPETENCIA(" . $idCompetencia . "," . $idcurso . "," . $idbimistre . ");";
                $promediosCompetencia = Yii::app()->db->createCommand($cmdPromediosXcompetencia)->queryAll();

                $j = 0;
                foreach ($promediosCompetencia as $promedio) {
                    $arrayData[$id][$j] = $promedio['promediocompetencia'];
                    $j++;
                }

                $arrayControlBimestre[$cuentaCompetencias] = $id;
                $cuentaCompetencias++;

                $arrayIdsCabecera[$id] = "PC-" . $idCompetencia;
                $arrayPesos[$id] = $pesoCompetencia;
                $arrayCabecera[$id] = "P";

                $arrayTotales["C-" . $idCompetencia] = $sumaPesosEvaluaciones;
                $id++;

                $sumaPesosCapacidades = $sumaPesosCapacidades + $pesoCompetencia;
            }

            $arrayCabecera[$id] = "P";

            $arrayIdsCabecera[$id] = "PB";
            $arrayPesos[$id] = 0;

            $arrayTotales["PB"] = $sumaPesosCapacidades;

            $cmdPromediosXbimestre = " CALL CARGA_PROMEDIOS_X_BIMESTRE(" . $idcurso . "," . $idbimistre . ");";
            $promedioBimestre = Yii::app()->db->createCommand($cmdPromediosXbimestre)->queryAll();

            $j = 0;
            foreach ($promedioBimestre as $promedio) {
                $arrayData[$id][$j] = $promedio['promediobimestral'];
                $j++;
            }

            $cantidadColumnas = count($arrayData);
            $cantidadFilas = count($arrayData[0]);

            $arrayDataNuevo = array();

            for ($fila = 0; $fila < $cantidadFilas; $fila++) {
                for ($colu = 0; $colu < $cantidadColumnas; $colu++) {
                    $arrayDataNuevo[$fila][$colu] = $arrayData[$colu][$fila];
                }
            }

            $_SESSION['arraypesos'] = $arrayPesos;
            $_SESSION['arraytotales'] = $arrayTotales;
            $_SESSION['arraycontrolcapacidades'] = $arrayControlCapacidades;
            $_SESSION['arraycontrolbimestre'] = $arrayControlBimestre;

//             $this->layout = '//layouts/layout_onlycss';


            $this->renderPartial('ajaxf/_tabla_notasxbimestre', array('arrayDataNuevo' => $arrayDataNuevo, 'arrayCabecera' => $arrayCabecera,
                'arrayCompetencias' => $arrayCompetencias, 'arrayIdsCabecera' => $arrayIdsCabecera,
                'datoscurso' => $DatosCursoasignado, 'idbimestre' => $idbimistre));
        } else {
            echo '<h3>No hay alumnos matriculados en este curso</h3>';
        }
    }

    public function actionAjax_carga_datos_control() {
        $tipo = $_POST["tipo"];
        $arrayx = null;

        if ($tipo == "apesos") {
            $arrayx = $_SESSION['arraypesos'];
        } else if ($tipo == "atotales") {
            $arrayx = $_SESSION['arraytotales'];
        } else if ($tipo == "accapacidades") {
            $arrayx = $_SESSION['arraycontrolcapacidades'];
        } else if ($tipo == "acbimestre") {
            $arrayx = $_SESSION['arraycontrolbimestre'];
        }

        echo json_encode($arrayx, JSON_PRETTY_PRINT);
    }

    public function actionAjax_actualiza_nota() {

        $idanio = $_SESSION['anio'];
        $idcurso = $_SESSION['idcurso'];

        $idevaluacion = $_POST['idevaluacion'];
        $idcompetencia = $_POST['idcompetencia'];
        $idalumno = $_POST['idalumno'];
        $nota = $_POST['nota'];

        $idbimestre = $_SESSION['idbimestre'];

//        echo $idevaluacion . "--" . $idcompetencia . "--" . $idbimestre . "--" . $idalumno . "--" . $idanio . "--" . $nota . "--";



        try {
            $cmdActulizaNota = Yii::app()->db->createCommand();

            $cmdActulizaNota->update('nota', array(
                'nota' => $nota,
                    ), 'idevaluacion=:idevalucion and idcompetencias=:idcompetencia and idbimestre=:idbimestre and '
                    . ' codigoMatricula=:idalumno and idcursodg=:idcurso', array(
                ':idevalucion' => $idevaluacion, ':idcompetencia' => $idcompetencia, ':idbimestre' => $idbimestre,
                ':idalumno' => $idalumno, ':idcurso' => $idcurso));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        echo 'ok';
    }

    public function actionCarga_pdf_reportes_x_bimestre() {

        $this->layout = '//layouts/layout_reporte_promedioscurso';

        $idanio = $_SESSION['anio'];
        $idcurso = $_SESSION['idcurso'];

        $cmdDatosCurso = " CALL CARGA_DATOSCURSOASIGNADO_DOCENTE(" . $idcurso . ");";
        $dc = Yii::app()->db->createCommand($cmdDatosCurso)->queryRow();

        $nombrePdf = 'Promedios_' . $dc['curso'] . '_' . $dc['nivel'] . '_' . $dc['grado'] . '_' . $dc['seccion'] . '_' . $idanio . '.pdf';

        $cmdpromediosxBimestrel = " CALL REPORTE_PROMEDIOS_BIMESTRALES_X_CURSO(" . $idcurso . ");";
        $promedioBimestre = Yii::app()->db->createCommand($cmdpromediosxBimestrel)->queryAll();

        $html2pdf = Yii::app()->ePdf->HTML2PDF();
        $html2pdf->WriteHTML($this->render('reportes/_reporte_notas_bimestrales', array('notasbimestrales' => $promedioBimestre, 'camposEncabezado' => $dc), true));
        $html2pdf->Output($nombrePdf, EYiiPdf::OUTPUT_TO_DOWNLOAD);
    }

    ////////////PERFIL DOCENTE

    public function actionPerfil() {

        $iddocente = Yii::app()->user->id;

        $datosDocente = Yii::app()->db->createCommand()
                ->select('*')
                ->from('persona p')
                ->join('docente d', 'd.iddocente=p.idpersona')
                ->where('p.idpersona=:id', array(':id' => $iddocente))
                ->queryRow();

        $this->renderPartial('perfil_docente', array('mostrar' => $datosDocente));
    }

    public function actionActualiza_perfil() {
        $idp = Yii::app()->user->id;

        $genero = $_POST["genero"];
        $fechaN = $_POST["fechanamiento"];
        $cel = $_POST["celular"];
        $otel = $_POST["otelefonico"];
        $correo = $_POST['correo'];

        $distrito = $_POST['distrito'];
        $sector = $_POST['sector'];
        $domicilio = $_POST["direccion"];
        $puntoReferencia = $_POST['preferencia'];
        $gaca = $_POST['gradoacademico'];
        $espec = $_POST['especialidad'];


        try {
            $command = Yii::app()->db->createCommand();
            //Actualizando datos...
            $command->update('persona', array(
                'celular' => $cel,
                'operadoratelefonica' => $otel,
                'fechanacimiento' => $fechaN,
                'domicilio' => $domicilio,
                'distrito' => $distrito,
                'sector' => $sector,
                'puntoreferencia' => $puntoReferencia,
                'correo' => $correo,
                'genero' => $genero
                    ), 'idpersona=:idpersona', array(':idpersona' => $idp));

            $command2 = Yii::app()->db->createCommand();
            //Actualizando datos...
            $command2->update('docente', array(
                'gradoacademico' => $gaca,
                'especialidad' => $espec,
                    ), 'iddocente=:idpersona', array(':idpersona' => $idp));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        echo 'ok';
    }

    //////////// FINNNNNNNNNN PERFIL DOCENTE


    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
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
            if ($model->validate() && $model->login())
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
        $this->redirect(Yii::app()->homeUrl);
    }

}
