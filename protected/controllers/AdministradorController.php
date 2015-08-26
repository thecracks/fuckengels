<?php

class AdministradorController extends Controller {

    /**
     * Declares class-based actions.
     *
     *
     */
    public $session;

//    public $layout = '//layouts/administrador2';
//      public $layout = '';

    public function actions() {
        return array(
//            // captcha action renders the CAPTCHA image displayed on the contact page
//            'captcha' => array('class' => 'CCaptchaAction', 'backColor' => 0xFFFFFF,),
//            // page action renders "static" pages stored under 'protected/views/site/pages'
//            // They can be accessed via: index.php?r=site/page&view=FileName
//            'page' => array('class' => 'CViewAction',),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {

        date_default_timezone_set('America/Lima');

        $this->layout = $_SESSION['layoutrol'];

        $filaFilial = Yii::app()->db->createCommand()
                ->select('idfilial,Distrito')
                ->from('filial')
                ->queryRow();

        if (!isset($_SESSION['idfilial']) && !isset($_SESSION['nombreFilial'])) {
            $_SESSION['idfilial'] = $filaFilial['idfilial'];
            $_SESSION['nombreFilial'] = $filaFilial['Distrito'];
        }

        $filaAnio = Yii::app()->db->createCommand()
                ->select('max(idanio) as idanio')
                ->from('anio_academico')
                ->queryRow();

        if (!isset($_SESSION['anio'])) {
            $_SESSION['anio'] = $filaAnio['idanio'];
        }

        $this->render('principal');
    }

    public function actionPrincipal() {
        $this->renderPartial('principal');
//         $this->render('principal');
    }

    public function actionPerfil() {

        $idp = Yii::app()->user->id;


        $seleccion = Yii::app()->db->createCommand()
                ->select('Nombre, ApellidoPaterno, ApellidoMaterno, DNI, fechanacimiento,celular,telefono, domicilio')
                ->from('persona')
                ->where('idpersona=:idpersona', array(':idpersona' => $idp))
                ->queryRow();

        $this->renderPartial('perfil', array('mostrar' => $seleccion));
        //$this -> render('perfil');
    }

    //CARGA POR AJAX



    /*
     * Inicio Carpeta Registro Académico
     */

//    public function actionRegistrararea() {
//        $seleccion = Yii::app()->db->createCommand()
//                ->select('*')
//                ->from('area')
//                ->queryAll();
//
//        $this->renderPartial('registroAcademico/registroArea', array('mostrar' => $seleccion));
//    }
//
//    public function actionGuardararea() {
//        $nombreArea = $_POST["nombre"];
//
//        $command = Yii::app()->db->createCommand();
//        $command->insert('area', array(
//            'Descripcion' => $nombreArea));
//    }
//
//    public function actionRegistrarfilial() {
//        $seleccion = Yii::app()->db->createCommand()
//                ->select('*')
//                ->from('filial')
//                ->queryAll();
//
//        $this->renderPartial('registroAcademico/registroFilial', array('mostrar' => $seleccion));
//    }
//
//    public function actionGuardarfilial() {
//        $filial = $_POST["f"];
//        $direccion = $_POST["d"];
//        $telefono = $_POST["t"];
//
//        $command = Yii::app()->db->createCommand();
//        $command->insert('filial', array(
//            'Direccion' => $direccion,
//            'Distrito' => $filial,
//            'Telefono' => $telefono));
//    }
//
//    public function actionRegistrarCurso() {
//
//        $seleccion1 = Yii::app()->db->createCommand()
//                ->select('*')
//                ->from('area')
//                ->queryAll();
//
//        $seleccion = Yii::app()->db->createCommand()
//                ->select('*')
//                ->from('curso')
//                ->queryAll();
//        $this->renderPartial('registroAcademico/registrarCurso', array('mostrar' => $seleccion, 'mostrar1' => $seleccion1));
//    }
//
//    public function actionGuardarcurso() {
//        $curso = $_POST["nombreC"];
//        $area = $_POST["nombreA"];
//
//        $command = Yii::app()->db->createCommand();
//        $command->insert('curso', array(
//            'Nombre' => $curso,
//            'idarea' => $area));
//    }

    /*
     * personal
     */

    public function actionDocente() {
        $seleccion = Yii::app()->db->createCommand()
                ->select('*')
                ->from('persona')
                ->where('tipo=:tipo', array(':tipo' => "docente"))
                ->queryAll();

        $this->renderPartial('registroAcademico/registrarDocente', array('mostrar' => $seleccion));
    }

    /*     * */

    public function actionGuardardatosdocente() {
        $nombre = $_POST["txtNombre"];
        $apellidoP = $_POST["txtApellidoP"];
        $apellidoM = $_POST["txtApellidoM"];
        $dni = $_POST["txtDNI"];
        $celular = $_POST["txtCelular"];
        $telefono = $_POST["txtTelefono"];
        $direccion = $_POST["txtDireccion"];
        $rol = $_POST["sRol"];

        $command = Yii::app()->db->createCommand();
        $command->insert('persona', array(
            'Nombre' => $nombre,
            'ApellidoPaterno' => $apellidoP,
            'ApellidoMaterno' => $apellidoM,
            'DNI' => $dni,
            'celular' => $celular,
            'telefono' => $telefono,
            'domicilio' => $direccion,
            'tipo' => "docente",
            'usuario' => $nombre,
            'contra' => $dni));

        $seleccion = Yii::app()->db->createCommand()
                ->select('*')
                ->from('persona')
                ->where('tipo=:tipo', array(':tipo' => "docente"))
                ->queryAll();

        $this->render('registroAcademico/registrarDocente', array('mostrar' => $seleccion));
    }

    public function actionAsignardocentecurso() {
        $seleccion = Yii::app()->db->createCommand()
                ->select('*')
                ->from('persona')
                ->where('tipo=:tipo', array(':tipo' => "docente"))
                ->queryAll();

        $seleccion1 = Yii::app()->db->createCommand()
                ->select('*')
                ->from('curso')
                ->queryAll();

        $this->render('registroAcademico/asignarDocenteCurso', array('mostrar' => $seleccion, 'mostrar1' => $seleccion1));
    }

    //EN EL DE ABAJO HAY Q CAMBIAR

    public function actionGuardardocentecurso() {

        $idDocente = $_POST["sDocente"];
        $idCurso = $_POST["sCurso"];

        $command = Yii::app()->db->createCommand();
        $command->insert('cursos_docente', array(
            'iddocente' => $idDocente,
            'idcursoasignada' => $idCurso));

        $seleccion = Yii::app()->db->createCommand()
                ->select('*')
                ->from('persona')
                ->where('tipo=:tipo', array(':tipo' => "docente"))
                ->queryAll();

        $seleccion1 = Yii::app()->db->createCommand()
                ->select('*')
                ->from('curso')
                ->queryAll();

        $this->render('registroAcademico/asignarDocenteCurso', array('mostrar' => $seleccion, 'mostrar1' => $seleccion1));
    }

    public function actionAsignardetallecurso() {
        $seleccion1 = Yii::app()->db->createCommand()
                ->select('*')
                ->from('curso')
                ->queryAll();

        $seleccion = Yii::app()->db->createCommand()
                ->select('*')
                ->from('curso_asignado')
                ->queryAll();

        $this->render('registroAcademico/asignarDetalleCurso', array('mostrar' => $seleccion, 'mostrar1' => $seleccion1));
    }

    public function actionGuardardetallecurso() {

        $curso = $_POST["sCurso"];
        $ss = $_POST["sSeccion"];
        $sg = $_POST["sGrado"];
        $sn = $_POST["sNivel"];
        $sf = $_POST["sFilial"];
        $anio = $_POST["txtAnioAcademico"];
        $horas = $_POST["txtHorasAsignadas"];

        $command = Yii::app()->db->createCommand();
        $command->insert('curso_asignado', array(
            'idcurso' => $curso,
            'seccion' => $ss,
            'grado' => $sg,
            'nivel' => $sn,
            'idfilial' => $sf,
            'idanio' => $anio,
            'horas' => $horas));

        $seleccion = Yii::app()->db->createCommand()
                ->select('*')
                ->from('curso_asignado')
                ->queryAll();

        $seleccion1 = Yii::app()->db->createCommand()
                ->select('*')
                ->from('curso')
                ->queryAll();

        $this->render('registroAcademico/asignarDetalleCurso', array('mostrar' => $seleccion, 'mostrar1' => $seleccion1));
    }

    /*
     * Reporte Matricula por grados
     */

    public function actionCargaPDFMatricula() {
        $this->layout = '//layouts/reporte';

        $idanio = $_SESSION['anio'];
        //$idcurso = 1;



        $datosPDF = " CALL sp_pdfMatri(" . $idanio . ");";
        $datos = Yii::app()->db->createCommand($datosPDF)->queryAll();
//        $this->renderPartial('reportes/_reporte_notas_bimestrales', array('notasbimestrales' => $promedioBimestre));

        $html2pdf = Yii::app()->ePdf->HTML2PDF();
        $html2pdf->WriteHTML($this->render('reportes/reporteMatriculas', array('datos' => $datos), true));
        $html2pdf->Output();
    }

    /*
     * Fin Carpeta Registro Académico
     */

//    •*´¨`*•.¸¸.•*´¨`*•.¸¸.•*´¨`*•.¸¸.•*´¨`*•.¸¸.•
//    PREREGISTRA ALUMNO
//    •*´¨`*•.¸¸.•*´¨`*•.¸¸.•*´¨`*•.¸¸.•*´¨`*•.¸

    public function actionRegistroparcialalumno() {

        $dataColegiosP = Yii::app()->db->createCommand()
                ->select('*')
                ->from('colegio_procedencia')
                ->queryAll();

        $this->renderPartial('registro_parcial_alumno', array('dataColegiosP' => $dataColegiosP));
    }

    public function actionAjax_preregistra_alumno() {

        $nombre = $_POST["nombre"];
        $apellidop = $_POST["apellidop"];
        $apellidom = $_POST["apellidom"];
        $usuario = $_POST["usuario"];
        $password = $_POST["password"];
        $confirmadoapod = $_POST["confirmado"];
        $idcolegiop = $_POST["idcolegiop"];

        if ($confirmadoapod == "FALSE")
            $confirmadoapod = FALSE;
        else
            $confirmadoapod = TRUE;

        $yaExisteUsuario = FALSE;
        $yaExisteApoderado = FALSE;
        $yaExistePersona = FALSE;

        $sql = "SELECT idpersona FROM persona where usuario like '" . $usuario . "%'";
        $comandoVerificaUsuario = Yii::app()->db->createCommand($sql)->queryAll();

        $sql = "SELECT idpersona FROM persona where nombre = '" . $nombre . "' and apellidopaterno = '" . $apellidop .
                "' and apellidomaterno='" . $apellidom . "'";
        $comandoVerificaDatosPersona = Yii::app()->db->createCommand($sql)->queryAll();

        $sql = "SELECT dniapoderado FROM apoderado where dniapoderado = '" . $password . "'";
        $comandoVerificaApoderado = Yii::app()->db->createCommand($sql)->queryAll();

        if (count($comandoVerificaDatosPersona) > 0) {
            $yaExistePersona = TRUE;
            echo 'personaexiste';
            return;
        } else {

            if (count($comandoVerificaUsuario) > 0) {
                $yaExisteUsuario = TRUE;
                echo 'usuarioexiste_';
                $sql = "SELECT max(idpersona) as id from persona";
                $comando2 = Yii::app()->db->createCommand($sql)->queryAll();
                $idalumno = $comando2[0]["id"] + 1;

                $usuarioNuevo = $usuario . "" . $idalumno;

                echo $usuarioNuevo;

                return;
            } else {

                if (count($comandoVerificaApoderado) > 0) {

                    $yaExisteApoderado = TRUE;

                    if ($confirmadoapod == FALSE) {
                        echo 'apoderadoexixte';
                        return;
                    }
                }
            }
        }


        if (!$yaExisteUsuario && !$yaExistePersona) {

            $comando1 = Yii::app()->db->createCommand();

            $comando1->insert('persona', array(
                'nombre' => $nombre,
                'apellidopaterno' => $apellidop,
                'apellidomaterno' => $apellidom,
                'tipo' => 'alumno',
                'usuario' => $usuario,
                'contra' => $password,
            ));

            $sql = "SELECT LAST_INSERT_ID() as id";
            $comando2 = Yii::app()->db->createCommand($sql)->queryAll();
            $idalumno = $comando2[0]["id"];

            if (!$yaExisteApoderado) {
                $comando1->insert('apoderado', array(
                    'dniapoderado' => $password,
                ));
            }

            $comando1->insert('alumno', array(
                'idalumno' => $idalumno,
                'dniapoderado' => $password,
                'idcolegiop' => $idcolegiop
            ));

            echo 'ok';
        }
    }

    //// PARA EL LISTADO DE ALUMNOS PREINSCRITOS

    public function actionCarga_listado_alumno_inscritos() {

        $nombreLike = $_POST['likenombre'];
        $cmdCargaAlumnoPreinscritos = "CALL NOMBREYAPELLIDOS_ALUMNOS_INSCRITOS('" . $nombreLike . "');";

        $dataAlumnosInscritos = Yii::app()->db->createCommand($cmdCargaAlumnoPreinscritos)->queryAll();
        echo json_encode($dataAlumnosInscritos, JSON_PRETTY_PRINT);
    }

    //// PARA EL LISTADO DE ALUMNOS PREINSCRITOS

    public function actionCarga_datos_completos_alumno_inscrito() {

        $idpersona = $_POST['idpersona'];

        try {
            $sql = "CALL CARGA_DATOS_ALUMNO_INSCRITO(" . $idpersona . ");";

            $datosPersona = Yii::app()->db->createCommand($sql)->queryRow();

            echo json_encode($datosPersona, JSON_PRETTY_PRINT);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    //// ACTULIZAR DATOS DEL ALUMNO INCRITO

    public function actionActualiza_datos_alumno_inscrito() {

        $idpersona = $_POST['idpersona'];
        $nombreA = $_POST['nombre'];
        $ap = $_POST['ap'];
        $am = $_POST['am'];
//        $idapoderado = $_POST['contra'];
        $idcp = $_POST['idcp'];


        try {
            $cmdActualizaPersona = Yii::app()->db->createCommand();
            //Actualizando datos...
            $cmdActualizaPersona->update('persona', array(
                'Nombre' => $nombreA,
                'ApellidoPaterno' => $ap,
                'ApellidoMaterno' => $am,
                    ), 'idpersona=:idpersona', array(':idpersona' => $idpersona));


            $cmdActualizaAlumno = Yii::app()->db->createCommand();
            //Actualizando datos...
            $cmdActualizaAlumno->update('alumno', array(
                'idcolegiop' => $idcp,
                    ), 'idalumno=:idalumno', array(':idalumno' => $idpersona));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        echo 'ok';
    }

    //// ELIMINAR  DATOS DEL ALUMNO INCRITO

    public function actionElimina_datos_alumno_inscrito() {

        $idpersona = $_POST['idpersona'];
        $cmdElimina_competencia_evaluacion = Yii::app()->db->createCommand();

        try {
            $cmdElimina_competencia_evaluacion->delete('persona', 'idpersona=:idpersona', array(':idpersona' => $idpersona));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        echo 'ok';
    }

//    •*´¨`*•.¸¸.•*´¨`*•.¸¸.•*´¨`*•.¸¸.•*´¨`*•.¸¸.•
//    CARGA PAGINA PRINCIPAL AREA
//    •*´¨`*•.¸¸.•*´¨`*•.¸¸.•*´¨`*•.¸¸.•*´¨`*•.¸

    public function actionConfiguracionformulaarea() {

//        $this->actionCargaListaCapacidades();
//        $this->actionCargaListaEvaluaciones();

        $sql = "CALL CARGA_AREA_Y_FORMULA(" . $_SESSION['anio'] . ");";

        $areas = Yii::app()->db->createCommand($sql)->queryAll();

        $this->renderPartial('formula_area', array('areas' => $areas));
    }

//    •*´¨`*•.¸¸.•*´¨`*•.¸¸.•*´¨`*•.¸¸.•*´¨`*•.¸¸.•
//    CARGA LISTA DE CAPACIDADES O COMPETENCIAS
//    •*´¨`*•.¸¸.•*´¨`*•.¸¸.•*´¨`*•.¸¸.•*´¨`*•.¸

    public function actionAjaxcargalistacapacidades() {

        $capacidades = $_SESSION['capacidades'];
        $this->renderPartial('_listas/_listacapacidades', array('capacidades' => $capacidades));
//        echo json_encode($capacidades, JSON_PRETTY_PRINT);
    }

    public function actionCargaListaCapacidades() {

        $capacidades = Yii::app()->db->createCommand()
                ->select('descripcion,competenciamin,idcompetencias')
                ->from('competencias')
                ->queryAll();

        $arrayCapacidades = array();

        foreach ($capacidades as $fila) {
            $arrayCapacidades[$fila['idcompetencias']] = $fila['competenciamin'];
        }

        echo json_encode($arrayCapacidades, JSON_PRETTY_PRINT);

        $_SESSION['arrayCapacidades'] = $arrayCapacidades;
        $_SESSION['capacidades'] = $capacidades;
    }

    //    •*´¨`*•.¸¸.•*´¨`*•.¸¸.•*´¨`*•.¸¸.•*´¨`*•.¸¸.•
//    CARGA LISTA DE EVALUACIONES O SUBCAPACIDADES
//    •*´¨`*•.¸¸.•*´¨`*•.¸¸.•*´¨`*•.¸¸.•*´¨`*•.¸
    public function actionAjaxcargalistasubcapacidades() {

        $evaluaciones = $_SESSION['evaluaciones'];

        $this->renderPartial('_listas/_listasubcapacidades', array('evaluaciones' => $evaluaciones));
    }

    public function actionCargaListaEvaluaciones() {

        $evaluaciones = Yii::app()->db->createCommand()
                ->select('descripcion,evaluacionmin,idevaluacion')
                ->from('evaluacion')
                ->queryAll();


        $arrayEvaluaciones = array();

        foreach ($evaluaciones as $fila) {
            $arrayEvaluaciones[$fila['idevaluacion']] = $fila['evaluacionmin'];
        }

        $_SESSION['arrayEvaluaciones'] = $arrayEvaluaciones;
        $_SESSION['evaluaciones'] = $evaluaciones;
        echo json_encode($arrayEvaluaciones, JSON_PRETTY_PRINT);
    }

    public function actionAjaxcargacapacidadesdearea() {

        $idanio = $_SESSION['anio'];
        $idarea = $_POST["idarea"];

        $competenciasDeArea = Yii::app()->db->createCommand()
                ->select('ac.idcompetencias as idcompetencia,cp.descripcion as descripcion, ac.formula as formula')
                ->from('area_competencia ac')
                ->join('competencias cp', 'ac.idcompetencias=cp.idcompetencias')
                ->where('ac.idanio=:idanio and ac.idarea=:idarea', array(':idanio' => $idanio, ':idarea' => $idarea))
                ->queryAll();

        $this->renderPartial('_formula_area/_formula_competencia', array('competenciasDeArea' => $competenciasDeArea));
    }

    //GUARDA FORMULA AREA POR AJAX

    public function actionAjax_guarda_formula_area() {

//        $_SESSION['anio'] = date("Y");

        $idarea = $_POST["idelemento"];
        $formula = $_POST["formula"];
        $cadenaPesos = $_POST["pesos"];
        $cadenaIdCapacidades = $_POST["items"];

        $idanio = $_SESSION['anio'];


        $arrayPesos = explode("?", $cadenaPesos);
        $arrayIdCapacidades = explode("?", $cadenaIdCapacidades);

        $cmdelimina_formula_area = Yii::app()->db->createCommand();
        $cmdInserta_formula_area = Yii::app()->db->createCommand();

        $cmdElimina_area_competencia = Yii::app()->db->createCommand();

        $cmdElimina_competencia_evaluacion = Yii::app()->db->createCommand();


        //ELIMINANDO DATOS PREVIOS EN AREA COMPETENCIA, de acuerdo a cuantos items tenga la formula
        $cmdElimina_competencia_evaluacion->delete('competencia_evaluacion', 'idanio=:idanio and idarea=:idarea', array(':idanio' => $idanio, ':idarea' => $idarea));

        //ELIMINANDO DATOS PREVIOS EN AREA COMPETENCIA, de acuerdo a cuantos items tenga la formula
        $cmdElimina_area_competencia->delete('area_competencia', 'idanio=:idanio and idarea=:idarea', array(':idanio' => $idanio, ':idarea' => $idarea));

        //ELIMINAMOS EN FORMULA AREA
        $cmdelimina_formula_area->delete('formula_area', 'idanio=:idanio and idarea=:idarea', array(':idanio' => $idanio, ':idarea' => $idarea));




        //INSERTANDO EN FORMULA AREA
        $cmdInserta_formula_area->insert('formula_area', array(
            'idanio' => $idanio,
            'idarea' => $idarea,
            'formula' => $formula,
        ));

        print_r($arrayIdCapacidades);

        //INSERTANDO EN AREA COMPETENCIA, de acuerdo a cuantos items tenga la formula
        $cmdInserta_area_competencia = Yii::app()->db->createCommand();
        for ($index = 0; $index < count($arrayIdCapacidades) - 1; $index++) {

            $cmdInserta_area_competencia->insert('area_competencia', array(
                'idanio' => $idanio,
                'idarea' => $idarea,
                'idcompetencias' => $arrayIdCapacidades[$index],
                'peso' => $arrayPesos[$index],
            ));
        }
    }

    //ACUALIZA AREA_COMPETENCIA             EEE             INSERTA EN COMPETENCIA_EVALUACION

    public function actionAjax_guarda_formula_competencia() {

//        $_SESSION['anio'] = date("Y");

        $idcompetencia = $_POST["idelemento"];
        $idarea = $_POST["idelementomayor"];
        $formula = $_POST["formula"];
        $cadenaPesos = $_POST["pesos"];
        $cadenaIdEvaluaciones = $_POST["items"];

        $idanio = $_SESSION['anio'];

        $arrayPesos = explode("?", $cadenaPesos);
        $arrayIdEvaluaciones = explode("?", $cadenaIdEvaluaciones);

        echo 'id competencia ' . $idcompetencia . " id area: " . $idarea . " formula: " . $formula . " cadena pesos: " . $cadenaPesos . " cadena id evaluaciones: " . $cadenaIdEvaluaciones;


        $cmdActualiza_area_competencia = Yii::app()->db->createCommand();
        $cmdElimina_competencia_evaluacion = Yii::app()->db->createCommand();
        $cmdInserta_competencia_evaluacion = Yii::app()->db->createCommand();

        $cmdActualiza_area_competencia->update('area_competencia', array(
            'formula' => $formula,), 'idanio=:idanio and idarea=:idarea and idcompetencias=:idcompetencia', array(
            ':idanio' => $idanio,
            ':idarea' => $idarea,
            ':idcompetencia' => $idcompetencia
        ));

        //ELIMINAMOS COMPETENCIA EVALUACION
        $cmdElimina_competencia_evaluacion->delete('competencia_evaluacion', 'idanio=:idanio and idarea=:idarea and idcompetencias=:idcompetencia', array(
            ':idanio' => $idanio,
            ':idarea' => $idarea,
            ':idcompetencia' => $idcompetencia
        ));


        //INSERTANDO EN COMPETENCIA_EVALUACION, de acuerdo a cuantos items tenga la formula
        for ($index = 0; $index < count($arrayIdEvaluaciones) - 1; $index++) {

            $cmdInserta_competencia_evaluacion->insert('competencia_evaluacion', array(
                'idanio' => $idanio,
                'idarea' => $idarea,
                'idcompetencias' => $idcompetencia,
                'idevaluacion' => $arrayIdEvaluaciones[$index],
                'peso' => $arrayPesos[$index],
            ));
        }
    }

    //FIN CARGA POR AJAX
    //
    //
    //
    //
    //ADMINISTRACION I E
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    public function accessRules() {

        $rol = Yii::app()->user->getState('role');

        $_SESSION['rol'] = $rol;

        if ($rol === "admin" || $rol = "secretaria" || $rol === "tutor") {
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

    public function actionAdministracionie() {

        $this->render('principal');
    }

    public function actionConfiguracionanio() {

        $this->render('configuracionanio');
    }

    public function actionFechasespeciales() {

        $this->render('fechasespeciales');
    }

    public function actionRegistropersonal() {

        $this->render('registropersonal');
    }

    public function actionAsignacionpersonal() {

        $this->render('asignacionpersonal');
    }

    //MATRICULA

    public function actionAlumnonuevo() {

        $this->render('alumnonuevo');
    }

    public function actionAlumnoRegular() {

        $this->render('alumnoregular');
    }

    public function actionTraslados() {

        $this->render('traslados');
    }

    public function actionNomina() {

        $this->render('nomina');
    }

    //ESTUDIANTE
    public function actionEstudiante() {

        $this->render('estudiante');
    }

    public function actionCargadni() {

        $this->render('cargadni');
    }

    public function actionCambiofilial() {

        $this->render('cambiofilial');
    }

    public function actionRetiroestudiante() {

        $this->render('retiroestudiante');
    }

    /**
     * This is the action to handle external exceptions.
     */
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
        $this->redirect(Yii::app()->request->baseUrl . '/principal/login');
    }

    //////////////////FINTA
    //////////////////
    //////////////////
    //////////////////
    //////////////////
    //////////////////
    //////////////////
    ////////////////// //////////////////
    //////////////////
    //////////////////
    //////////////////
    //////////////////



    public function actionAsistencia() {



        $this->renderPartial('asistencia');

        // echo "AJAX asignacionpersonal ";
    }

    public function actionAjax_carga_alumnos_to_asist() {

//        $idanio = $_POST['idanio
//       
        $idanio = $_SESSION['anio'];
        $idfilial = $_SESSION['idfilial'];

        $fecha = $_POST['fecha'];

//        echo $idanio ."  ".$idfilial."  ".$fecha;

        $cmdCargaAlumnosMatriculados = " CALL CARGA_ALUMNOS_TOTALES(" . $idanio . "," . $idfilial . ",'" . $fecha . "');";
        $dataAlumnos = Yii::app()->db->createCommand($cmdCargaAlumnosMatriculados)->queryAll();

        echo json_encode($dataAlumnos, JSON_PRETTY_PRINT);
    }

    public function actionAjax_carga_fechas_x_anio() {

//        $idanio = $_POST['idanio'];
        $idanio = $_SESSION['anio'];
//         echo $idanio;
        $cmdCargaFechasxAnio = " CALL CARGA_FECHAS_X_ANIO(" . $idanio . ");";
        $dataFechas = Yii::app()->db->createCommand($cmdCargaFechasxAnio)->queryAll();

        echo json_encode($dataFechas, JSON_PRETTY_PRINT);
    }

    public function actionAjax_carga_fechas_x_anio_confirmadas() {

//        $idanio = $_POST['idanio'];
        $idanio = $_SESSION['anio'];
        $cmdCargaFechasxAnio = " CALL CARGA_FECHAS_X_ANIO_YACONFIRMADAS(" . $idanio . ");";
        $dataFechas = Yii::app()->db->createCommand($cmdCargaFechasxAnio)->queryAll();

        echo json_encode($dataFechas, JSON_PRETTY_PRINT);
    }

    public function actionAjax_actualiza_asistencia_alumno() {

        $asistencia = $_POST['asistencia'];
        $idalumno = $_POST['idalumno'];
        $fecha = $_POST['fecha'];

        try {
            $cmdActualizaAsistencia = Yii::app()->db->createCommand();

            $cmdActualizaAsistencia->update('asistencia', array(
                'asistencia' => $asistencia), ' fecha=:fecha and codigoMatricula=:idalumno', array(
                ':fecha' => $fecha,
                ':idalumno' => $idalumno
            ));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        echo 'ok';
    }

    public function actionAjax_graba_justificacion_asistencia() {

        $justificacion = $_POST['justificacion'];
        $idalumno = $_POST['idalumno'];
        $fecha = $_POST['fecha'];

        try {
            $cmdActualizaAsistencia = Yii::app()->db->createCommand();

            $cmdActualizaAsistencia->update('asistencia', array(
                'justificacion' => $justificacion), ' fecha=:fecha and codigoMatricula=:idalumno', array(
                ':fecha' => $fecha,
                ':idalumno' => $idalumno
            ));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        echo 'ok';
    }

    /////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////
    //////////////// REPORTE MATRICULADOS
    /////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////



    public function actionReporteMatriuculados() {

        $idanio = $_SESSION['anio'];
        $nivel = $_POST['nivel'];
        $grado = $_POST['grado'];
        $idfilial = $_SESSION['idfilial'];


        if (isset($_POST['tipo'])) {
            $tipo = $_POST['tipo'];
        } else {
            $tipo = "pdf";
        }

        $idseccion = 1;

        if ($nivel == '0')
            $nivel = "";
        if ($grado == '0')
            $grado = "";

        $camposEncabezado['anio'] = $idanio;
        $camposEncabezado['nivel'] = $nivel;
        $camposEncabezado['grado'] = $grado;
        $camposEncabezado['seccion'] = 'A';
        $camposEncabezado['filial'] = $_SESSION['nombreFilial'];

        $cmdCargaAlumnosMatriculados = " CALL CARGA_ALUMNO_MATRICULADOS_X_SECCION('" . $nivel . "','" . $grado . "'," . $idseccion .
                "," . $idanio . "," . $idfilial . ");";
        $dataAlumnos = Yii::app()->db->createCommand($cmdCargaAlumnosMatriculados)->queryAll();

        if ($tipo == "pdf") {
            $this->layout = '//layouts/layout_reporte_matriculas';
            $html2pdf = Yii::app()->ePdf->HTML2PDF();
            $html2pdf->WriteHTML($this->render('reportes/reporte_matriculados_x_seccion', array('arrayDataNuevo' => $dataAlumnos,
                        'camposEncabezado' => $camposEncabezado, 'tipo' => $tipo), true));

            $html2pdf->Output('rep_matriculas_' . $idanio . '.pdf', EYiiPdf::OUTPUT_TO_DOWNLOAD);
        } else {
            $this->renderPartial('reportes/reporte_matriculados_x_seccion', array('arrayDataNuevo' => $dataAlumnos,
                'camposEncabezado' => $camposEncabezado, 'tipo' => $tipo));
        }
    }

/////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////
//////////////// FIN REPORTE MATRICULADOS
/////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////



    public function actionMatricula() {
        $this->renderPartial('matricula');
    }

    public function actionAjax_carga_alumnos_para_matricular() {

        $idanio = $_SESSION['anio'];
        $likeNombre = $_POST['likenombre'];

        $cmdCargaAlumnosMatriculados = " CALL CARGA_ALUMNOS_NO_MATRICULADOS(" . $idanio . ",'" . $likeNombre . "');";
        $dataAlumnos = Yii::app()->db->createCommand($cmdCargaAlumnosMatriculados)->queryAll();

        echo json_encode($dataAlumnos, JSON_PRETTY_PRINT);
    }

    public function actionAjax_matricula_alumno() {

        $idanio = $_SESSION['anio'];
        $filial = $_SESSION['idfilial'];

        $idalumo = $_POST['idalumno'];
        $nivel = $_POST['nivel'];
        $grado = $_POST['grado'];
        $seccion = $_POST['seccion'];
        $tipoMatricula = $_POST['tipoMatricula'];
        $codComprobante = $_POST['codCoprobante'];
        $fechaMatricula = date('Y-m-d');

        $command = Yii::app()->db->createCommand();
        $response = $command->insert('matricula_alumno', array(
            'idanio' => $idanio,
            'idalumno' => $idalumo,
            'idseccion' => $seccion,
            'idfilial' => $filial,
            'nivel' => $nivel,
            'grado' => $grado,
            'tipoMatricula' => $tipoMatricula,
            'comprobanteMatricula' => $codComprobante,
            'fechamatricula' => $fechaMatricula
        ));

        if ($response == 1)
            echo 'ok';
    }

//listar alumos preinscritos

    public function actionListaPreinscritos() {

        $this->render('listado_alumnos_preinscritos');
    }

    public function actionAjax_elimina_alumnopreinscrito() {

        $idpersona = $_POST['idalumno'];

        $cmdEliminaAlumno = Yii::app()->db->createCommand();
        $cmdEliminaAlumnoPreincrito = Yii::app()->db->createCommand();

//ELIMINANDO ALUMNO PREINSCRITO 

        try {
            $cmdEliminaAlumno->delete('alumno', 'idalumno=:idalumno', array(':idalumno' => $idpersona));

            $cmdEliminaAlumnoPreincrito->delete('persona', 'idpersona=:idpersona', array(':idpersona' => $idpersona));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        echo 'ok';
    }

/////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////
//////////////// REPORTE MENSUAL Y DIARIO ASISTENCIAS
/////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////


    public function actionReporteAsistencias() {

        $idanio = $_SESSION['anio'];
        $idfilial = $_SESSION['idfilial'];
        $filial = $_SESSION['nombreFilial'];

        $fecha = $_POST['fecha'];
        $nivel = $_POST['nivel'];
        $grado = $_POST['grado'];
        $seccion = $_POST['seccion'];
        $tipo = $_POST['tipo'];
        $mes = $_POST['mes'];
        $nombremes = $_POST['nombremes'];
        $letraseccion = $_POST['letraseccion'];



//----------------

        $arrayNumeroDia = array();
        $arrayNombreDia = array();
        $arrayData = array();

        $camposEncabezado = NULL;


        $seccion = 1;
        $letraseccion = "A";


//----------------

        $this->layout = '//layouts/layout_reporte_asistencia';

        $camposEncabezado['anio'] = $idanio;
        $camposEncabezado['nivel'] = $nivel;
        $camposEncabezado['grado'] = $grado;
        $camposEncabezado['seccion'] = $letraseccion;
        $camposEncabezado['filial'] = $filial;

        if ($tipo == "diario") {

            $camposEncabezado['fecha'] = $fecha;

            $cmdCargaAlumnosMatriculados = " CALL CARGA_ALUMNOS_X_FECHA_NIVEL_GRADO(" . $idfilial . ",'" .
                    $fecha . "','" . $nivel . "','" . $grado . "');";
            $dataAlumnos = Yii::app()->db->createCommand($cmdCargaAlumnosMatriculados)->queryAll();

            $html2pdf = Yii::app()->ePdf->HTML2PDF();
            $html2pdf->WriteHTML($this->render('reportes/_reporte_asistencias_diarias', array('dataAlumnos' => $dataAlumnos,
                        'camposEncabezado' => $camposEncabezado), true));
            $html2pdf->Output("rep_asis_x_fecha_" . $fecha . ".pdf", EYiiPdf::OUTPUT_TO_DOWNLOAD);
        } else { // mensual
//            $nombreArchivo = "ReporteAsistencia_mesN_" + $mes + "_año_" + $idanio+".pdf";
            $camposEncabezado['mes'] = $nombremes;

            $cmdCargaDatosAlumnos = " CALL LISTA_ALUMNO_X_SECCION('" . $nivel .
                    "','" . $grado . "'," . $seccion . ");";

            $dataNombresyApellidos = Yii::app()->db->createCommand($cmdCargaDatosAlumnos)->queryAll();

            if (count($dataNombresyApellidos) > 0) {

                $j = 0;
                foreach ($dataNombresyApellidos as $filaNombre) {
                    $arrayData[0][$j] = $filaNombre['idpersona'];
                    $arrayData[1][$j] = $filaNombre['Nombre'];
                    $j++;
                }

                $i = 2;
                $cmdCargaFechasMensuales = " CALL LISTA_FECHAS_X_MES(" . $idanio . "," . $mes . ");";
                $dataFechasdelMes = Yii::app()->db->createCommand($cmdCargaFechasMensuales)->queryAll();

                foreach ($dataFechasdelMes as $fila) {

                    $fecha = $fila['fecha'];
                    if ($fila['estado'] == 'C') {
                        array_push($arrayNombreDia, $fila['nombre_dia']);
                        array_push($arrayNumeroDia, $fila['numero_dia']);

                        $cmdCargaAsistenciaxFecha = " CALL ASISTENCIAS_POR_FECHA('" . $fecha . "','" . $nivel .
                                "','" . $grado . "'," . $seccion . ");";
                        $dataFechasdelMes = Yii::app()->db->createCommand($cmdCargaAsistenciaxFecha)->queryAll();

                        $j = 0;
                        foreach ($dataFechasdelMes as $asistenciaAlumno) {
                            $arrayData[$i][$j] = $asistenciaAlumno['asistencia'];
                            $j++;
                        }
                        $i++;
                    }
                }

                $cantidadColumnas = count($arrayData);
                $cantidadFilas = count($arrayData[0]);

                $arrayDataNuevo = array();

                for ($fila = 0; $fila < $cantidadFilas; $fila++) {
                    for ($colu = 0; $colu < $cantidadColumnas; $colu++) {
                        $arrayDataNuevo[$fila][$colu] = $arrayData[$colu][$fila];
                    }
                }


                $html2pdf = Yii::app()->ePdf->HTML2PDF('orientation', 'p');
                $html2pdf->WriteHTML($this->render('reportes/reporte_asistencias_mensuales', array('arrayDataNuevo' => $arrayDataNuevo,
                            'arrayNombreDia' => $arrayNombreDia, 'arrayNumeroDia' => $arrayNumeroDia, 'camposEncabezado' => $camposEncabezado), true));
                $html2pdf->Output('rep_asis_x_mes_' . $nombremes . '_' . $idanio . '.pdf', EYiiPdf::OUTPUT_TO_DOWNLOAD);
//
//                
//                $this->render('reportes/reporte_asistencias_mensuales', array('arrayDataNuevo' => $arrayDataNuevo, 'arrayNombreDia' => $arrayNombreDia,
//                    'arrayNumeroDia' => $arrayNumeroDia));
            }
        }
    }

/////////////////////////////////////////////////////////
//////////////// FIN  FIN  REPORTE MENSUAL Y DIARIO ASISTENCIAS
/////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////

    public function actionAjax_confirma_asistencia_para_fecha() {

        $fecha = $_POST['fecha'];

        $cmdActualizaFechaCOnfirmada = Yii::app()->db->createCommand();

        try {
            $cmdActualizaFechaCOnfirmada->update('fechasestudioanio', array(
                'estado' => 'C'), 'fecha=:fecha', array(
                ':fecha' => $fecha
            ));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        echo 'ok';
    }

//////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////
/////////////////////////NUEVAAAAAAAAAA FUNCIONESSSSSSSSSSSS
//////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////
//
    //
    //////////////CONFIGURACION FILIAL
//////////////CONFIGURACION FILIAL
//////////////CONFIGURACION FILIAL


    public function actionConfiguracionfilial() {

        $dataFiliales = Yii::app()->db->createCommand()
                ->select('*')
                ->from('filial')
                ->queryAll();

        $this->renderPartial('detalle_institucional', array('filiales' => $dataFiliales));
    }

    public function actionConfigurcion_filial_acciones() {

        if (isset($_SESSION['anio'])) {
            $idanio = $_SESSION['anio'];
        }
        if (isset($_SESSION['idfilial'])) {
            $idfilial = $_SESSION['idfilial'];
        }

        if (isset($_POST['iddi'])) {
            $iddi = $_POST['iddi'];
        }
        if (isset($_POST['nivel'])) {
            $nivel = $_POST['nivel'];
        }
        if (isset($_POST['grado'])) {
            $grado = $_POST['grado'];
        }
        if (isset($_POST['nsecciones'])) {
            $nsecciones = $_POST['nsecciones'];
        }
        if (isset($_POST['tipoaccion'])) {
            $tipoAccion = $_POST['tipoaccion'];
        }

        if ($tipoAccion == "select") {

            $cmdCargaDatosDI = "CALL CARGA_DATOS_DETALLEINSTITUCIONAL('" . $idanio . "','" . $idfilial . "');";
            $dataDI = Yii::app()->db->createCommand($cmdCargaDatosDI)->queryAll();

            echo json_encode($dataDI, JSON_PRETTY_PRINT);
        } else if ($tipoAccion == "insert") {

            try {
                $cmdinsertandodi = Yii::app()->db->createCommand();
                $cmdinsertandodi->insert('detalleinstitucional', array(
                    'idFilial' => $idfilial,
                    'nivel' => $nivel,
                    'grado' => $grado,
                    'idAnio' => $idanio,
                    'numerosecciones' => $nsecciones));
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
            echo 'ok';
        } else if ($tipoAccion == "update") {

            try {

                $command = Yii::app()->db->createCommand();
                $command->update('detalleinstitucional', array(
                    'idFilial' => $idfilial,
                    'nivel' => $nivel,
                    'grado' => $grado,
                    'idAnio' => $idanio,
                    'numerosecciones' => $nsecciones
                        ), 'idDI=:iddi', array(':iddi' => $iddi));
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
            echo 'ok';
        } else if ($tipoAccion == "delete") {
            try {
                $command = Yii::app()->db->createCommand();
                $command->delete('detalleinstitucional', 'idDI=:iddi', array(':iddi' => $iddi));
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }

            echo 'ok';
        }
    }

////////////// FIN CONFIGURACION FILIAL
////////////// FIN CONFIGURACION FILIAL
////////////// FIN CONFIGURACION FILIAL
///
///
////////////// CARGA HORARIA
////////////// CARGA HORARIA
////////////// CARGA HORARIA

    public function actionCargahoraria() {

        $idanio = $_SESSION['anio'];
        $idfilial = $_SESSION['idfilial'];

        $cmdCargaCursos = "CALL CARGA_TODOS_CURSOS_AREAS(" . $idanio . "," . $idfilial . ");";

        $datCursos = Yii::app()->db->createCommand($cmdCargaCursos)->queryAll();

        $cmdDI = "CALL CARGA_DATOS_DETALLEINSTITUCIONAL(" . $idanio . "," . $idfilial . ");";
        $dataDI = Yii::app()->db->createCommand($cmdDI)->queryAll();

        $nDIinicial = 0;
        $nDIprimaria = 0;
        $nDIsecundaria = 0;
        $arrayDataPrincipal = array();

        foreach ($dataDI as $fila) {

            if (strtolower($fila['nivel']) == "inicial") {
                $nDIinicial++;
            } else if (strtolower($fila['nivel']) == "primaria") {
                $nDIprimaria++;
            } else if (strtolower($fila['nivel']) == "secundaria") {
                $nDIsecundaria++;
            }
            $cmdCursoGrado = "CALL CARGA_DATOS_CURSO_GRADO(" . $fila['idDI'] . ");";
            $dataCursoGrado = Yii::app()->db->createCommand($cmdCursoGrado)->queryAll();

            $horascursoxdi = array();

            foreach ($dataCursoGrado as $filacursogrado) {
                $arrayHorasYidcg = array();
                array_push($arrayHorasYidcg, $filacursogrado['horas']);
                array_push($arrayHorasYidcg, $filacursogrado['idcursogrado']);
                array_push($horascursoxdi, $arrayHorasYidcg);
            }

            array_push($arrayDataPrincipal, $horascursoxdi);
        }

        $cantidadColumnas = count($arrayDataPrincipal);
        $cantidadFilas = count($arrayDataPrincipal[0]);

        $arrayDataNuevo = array();

//        echo '<br><br><pre>';
//
//        print_r($arrayDataPrincipal);
//
//        echo '</pre>';
//
        for ($fila = 0; $fila < $cantidadFilas; $fila++) {
            for ($colu = 0; $colu < $cantidadColumnas; $colu++) {
                $arrayDataNuevo[$fila][$colu] = $arrayDataPrincipal[$colu][$fila];
            }
        }


        $this->renderPartial('carga_horaria', array('datCursos' => $datCursos, 'datadi' => $dataDI, 'data' => $arrayDataNuevo,
            'ninicial' => $nDIinicial, 'nprimaria' => $nDIprimaria, 'nsecundaria' => $nDIsecundaria));
    }

    public function actionCarga_horaria_acciones() {

        if (isset($_POST['idcg'])) {
            $idcg = $_POST['idcg'];
        }

        if (isset($_POST['horas'])) {
            $horas = $_POST['horas'];
        }
        if (isset($_POST['tipoaccion'])) {
            $tipoAccion = $_POST['tipoaccion'];
        }


        if ($tipoAccion == "update") {

            try {
                $command = Yii::app()->db->createCommand();
                $command->update('curso_grado', array(
                    'horas' => $horas
                        ), 'idcursogrado=:idcg', array(':idcg' => $idcg));
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
            echo 'ok';
        }
    }

////////////// FIN CARGA HORARIA
////////////// FIN CARGA HORARIA
//////////////  FIN CARGA HORARIA
///
///
////////////// ASIGNACION DE CURSO DOCENTE
////////////// ASIGNACION DE CURSO DOCENTE
////////////// ASIGNACION DE CURSO DOCENTE
//
//    public function actionAsignacursodocente() {
//
//        $dataFiliales = Yii::app()->db->createCommand()
//                ->select('*')
//                ->from('filial')
//                ->queryAll();
//
//
//        $cmdCursoGrado = "call CARGA_DATOS_CURSO_GRADO_X_NIVEL('', '', 1, 2015);";
//        $dataCursoGrado = Yii::app()->db->createCommand($cmdCursoGrado)->queryAll();
//        echo '<pre>';
//        print_r($dataCursoGrado);
//        echo '</pre>';
//
//        $this->renderPartial('asigna_curso_docente', array('filiales' => $dataFiliales));
//    }
//
//    public function actionCurso_docente_acciones() {
//
//        if (isset($_POST['idcg'])) {
//            $idcg = $_POST['idcg'];
//        }
//
//        if (isset($_POST['horas'])) {
//            $horas = $_POST['horas'];
//        }
//        if (isset($_POST['tipoaccion'])) {
//            $tipoAccion = $_POST['tipoaccion'];
//        }
//
//
//        if ($tipoAccion == "update") {
//
//            try {
//                $command = Yii::app()->db->createCommand();
//                $command->update('curso_grado', array(
//                    'horas' => $horas
//                        ), 'idcursogrado=:idcg', array(':idcg' => $idcg));
//            } catch (Exception $exc) {
//                echo $exc->getTraceAsString();
//            }
//            echo 'ok';
//        }
//    }
////////////// FIN ASIGNACION DE CURSO DOCENTE
////////////// FIN ASIGNACION DE CURSO DOCENTE
//////////////  FIN ASIGNACION DE CURSO DOCENTE
//
//
//
//
    ////////////   CONFIGURACION GLOBAL 
    ////////////   CONFIGURACION GLOBAL 
    ////////////   CONFIGURACION GLOBAL 
    ////////////   CONFIGURACION GLOBAL 

    public function actionCargaDatosDefaultCGadmin() {

        $datosDefault = array('idanio' => $_SESSION['anio'], 'idfilial' => $_SESSION['idfilial']);
        echo json_encode($datosDefault, JSON_PRETTY_PRINT);
    }

    public function actionSetConfiguracionGlobal() {


        if (isset($_POST['idanio'])) {
            $idanio = $_POST['idanio'];
            $_SESSION['anio'] = $idanio;
        }

        if (isset($_POST['idfilial'])) {
            $idfilial = $_POST['idfilial'];
            $_SESSION['idfilial'] = $idfilial;
        }
        if (isset($_POST['nombreFilial'])) {
            $idfilial = $_POST['nombreFilial'];
            $_SESSION['nombreFilial'] = $idfilial;
        }
    }

    public function actionCargaDatosCGadmin() {

        $tipo = "";

        if (isset($_POST['tipo'])) {
            $tipo = $_POST['tipo'];
        }

        if ($tipo == "filial") {
            $selectFilial = Yii::app()->db->createCommand()
                    ->select('*')
                    ->from('filial')
                    ->queryAll();

            echo json_encode($selectFilial, JSON_PRETTY_PRINT);
        } else if ($tipo == "anio") {
            $selectAnio = Yii::app()->db->createCommand()
                    ->select('*')
                    ->from('anio_academico')
                    ->queryAll();

            echo json_encode($selectAnio, JSON_PRETTY_PRINT);
        }
    }

    //////////// FIN  CONFIGURACION GLOBAL 
    //////////// FIN  CONFIGURACION GLOBAL 
    //////////// FIN  CONFIGURACION GLOBAL 
    //////////// FIN  CONFIGURACION GLOBAL 
    //
    //
    //
    //
/////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////
    //////////////// REPORTE MATRICULADOS ALUMNO TUTOR
    /////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////



    public function actionReporteMatriuculadosAlumnoTutor() {

        $idanio = $_SESSION['anio'];
        $nivel = $_POST['nivelAT'];
        $grado = $_POST['gradoAT'];

        $idseccion = 1;

        if ($nivel == '0')
            $nivel = "";
        if ($grado == '0')
            $grado = "";


        $this->layout = '//layouts/layout_reporte_matriculas_alumno_tutor';

        $camposEncabezado['anio'] = $idanio;
        $camposEncabezado['nivel'] = $nivel;
        $camposEncabezado['grado'] = $grado;
        $camposEncabezado['seccion'] = 'A';

        $cmdCargaAlumnosMatriculadosAlumnoTutor = " CALL CARGA_ALUMNO_MATRICULADOS_TUTOR('" . $nivel . "','" . $grado . "'," . $idseccion . ");";
        $dataAlumnos = Yii::app()->db->createCommand($cmdCargaAlumnosMatriculadosAlumnoTutor)->queryAll();

        $html2pdf = Yii::app()->ePdf->HTML2PDF();
        $html2pdf->WriteHTML($this->render('reportes/reporte_matriculados_alumno_tutor', array('arrayDataNuevo' => $dataAlumnos,
                    'camposEncabezado' => $camposEncabezado), true));

        $html2pdf->Output('rep_alumnotutor_' . $idanio . '.pdf', EYiiPdf::OUTPUT_TO_DOWNLOAD);
    }

/////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////
//////////////// FIN REPORTE MATRICULADOS ALUMNO TUTOR
/////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////
//
//
//
    /////////////////////////////////////////////////////////
    //////////////// REPORTE MATRICULADOS ALUMNO TUTOR HTML
    /////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////
//    public function actionReporteMatriuculadosAlumnoTutorHTML() {
//
//        $idanio = $_SESSION['anio'];
//        $nivel = $_POST['nivelAT'];
//        $grado = $_POST['gradoAT'];
//
//        $idseccion = 1;
//
//        if ($nivel == '0')
//            $nivel = "";
//        if ($grado == '0')
//            $grado = "";
//
//        $camposEncabezado['anio'] = $idanio;
//        $camposEncabezado['nivel'] = $nivel;
//        $camposEncabezado['grado'] = $grado;
//        $camposEncabezado['seccion'] = 'A';
//
//
//        $cmdCargaAlumnosMatriculadosAlumnoTutorHTML = " CALL CARGA_ALUMNO_MATRICULADOS_TUTOR('" . $nivel . "','" . $grado . "'," . $idseccion . ");";
//        $dataAlumnos = Yii::app()->db->createCommand($cmdCargaAlumnosMatriculadosAlumnoTutorHTML)->queryAll();
//        $this->renderPartial('reportes/reporteAlumnoTutorHTML', array('dato' => $dataAlumnos, 'camposEncabezado' => $camposEncabezado));
//    }
//    


    public function actionReporteMatriuculadosAlumnoTutorHTML() {

        $idanio = $_SESSION['anio'];
        $nivel = $_POST['b'];
        $grado = $_POST['a'];

        $idseccion = 1;

        if ($nivel == '0')
            $nivel = "";
        if ($grado == '0')
            $grado = "";

        $camposEncabezado['anio'] = $idanio;
        $camposEncabezado['nivel'] = $nivel;
        $camposEncabezado['grado'] = $grado;
        $camposEncabezado['seccion'] = 'A';


        $cmdCargaAlumnosMatriculadosAlumnoTutorHTML = " CALL CARGA_ALUMNO_MATRICULADOS_TUTOR('" . $nivel . "','" . $grado . "'," . $idseccion . ");";


        $dataAlumnos = Yii::app()->db->createCommand($cmdCargaAlumnosMatriculadosAlumnoTutorHTML)->queryAll();
        $this->renderPartial('reportes/reporteAlumnoTutorHTML', array('dato' => $dataAlumnos, 'camposEncabezado' => $camposEncabezado));
    }

/// Agregar Colegio para Inscripcion

    public function actionAgregarColegio() {

        $colegio = $_POST['colegio'];

        $command = Yii::app()->db->createCommand();
        $command->insert('colegio_procedencia', array(
            'nombreColegio' => $colegio));


        $sql = "select last_insert_id() as id";
        $command1 = Yii::app()->db->createCommand($sql)->queryAll();
        $idColegio = $command1[0]["id"];

        echo $idColegio;
    }

/////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////
//////////////// FIN REPORTE MATRICULADOS ALUMNO TUTOR HTML
/////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////
//
//
//
//
    /////////////////////////////////////////////////////////
    //////////////// PREREGISTRO DOCENTESSSSSSSSSSSSSSS
    /////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////

    public function actionRegistroparcialdocente() {
        $this->renderPartial('registro_parcial_docente');
    }

    public function actionOperaciones_registroparcialdocente() {

        if (isset($_POST['iddocente'])) {
            $iddocente = $_POST['iddocente'];
        }
        if (isset($_POST['nombre'])) {
            $nombre = $_POST['nombre'];
        }
        if (isset($_POST['apellidop'])) {
            $apellidop = $_POST['apellidop'];
        }
        if (isset($_POST['apellidom'])) {
            $apellidom = $_POST['apellidom'];
        }
        if (isset($_POST['usuario'])) {
            $usuario = $_POST['usuario'];
        }
        if (isset($_POST['password'])) {
            $password = $_POST['password'];
        }
        if (isset($_POST['confirmado'])) {
            $confirmadoapod = $_POST['confirmado'];
        }
        if (isset($_POST['likenombre'])) {
            $likeNombre = $_POST['likenombre'];
        }
        if (isset($_POST['tipo'])) {
            $tipo = $_POST['tipo'];
        }

        if ($tipo == "insert") {

            $yaExisteUsuario = FALSE;
            $yaExistePersona = FALSE;

            $sql = "SELECT idpersona FROM persona where usuario like '" . $usuario . "%'";
            $comandoVerificaUsuario = Yii::app()->db->createCommand($sql)->queryAll();

            $sql = "SELECT idpersona FROM persona where nombre = '" . $nombre . "' and apellidopaterno = '" . $apellidop .
                    "' and apellidomaterno='" . $apellidom . "'";
            $comandoVerificaDatosPersona = Yii::app()->db->createCommand($sql)->queryAll();

            if (count($comandoVerificaDatosPersona) > 0) {
                $yaExistePersona = TRUE;
                echo 'personaexiste';
                return;
            } else {

                if (count($comandoVerificaUsuario) > 0) {
                    $yaExisteUsuario = TRUE;
                    echo 'usuarioexiste_';
                    $sql = "SELECT max(idpersona) as id from persona";
                    $comando2 = Yii::app()->db->createCommand($sql)->queryAll();
                    $iddocente = $comando2[0]["id"] + 1;

                    $usuarioNuevo = $usuario . "" . $iddocente;
                    echo $usuarioNuevo;
                    return;
                }
            }

            if (!$yaExisteUsuario && !$yaExistePersona) {

                $comando1 = Yii::app()->db->createCommand();
                $comando1->insert('persona', array(
                    'nombre' => $nombre,
                    'apellidopaterno' => $apellidop,
                    'apellidomaterno' => $apellidom,
                    'tipo' => 'docente',
                    'usuario' => $usuario,
                    'contra' => $password,
                    'DNI' => $password
                ));

                $sql = "SELECT LAST_INSERT_ID() as id";
                $comando2 = Yii::app()->db->createCommand($sql)->queryAll();
                $iddocente = $comando2[0]["id"];

                $comando1->insert('docente', array(
                    'iddocente' => $iddocente, 'rol' => 'docente'
                ));

                echo 'ok';
            }
        } else if ($tipo == "select") {

            $datosDocentes = Yii::app()->db->createCommand()
                    ->select("*, concat(p.ApellidoPaterno,' ',p.ApellidoMaterno,', ',p.Nombre) as nombredocente")
                    ->from('persona p')
                    ->join('docente d', "d.iddocente=p.idpersona")
                    ->where("concat(p.ApellidoPaterno,' ',p.ApellidoMaterno,' ',p.Nombre)  like concat('%',:likenombre,'%') ", array(':likenombre' => $likeNombre))
                    ->queryAll();

            echo json_encode($datosDocentes, JSON_PRETTY_PRINT);
        } else if ($tipo == "update") {

            $yaExisteUsuario = FALSE;

            $sql = "SELECT idpersona FROM persona where usuario like '" . $usuario . "%'  and  idpersona != " . $iddocente . " ";
            $comandoVerificaUsuario = Yii::app()->db->createCommand($sql)->queryAll();

            if (count($comandoVerificaUsuario) > 0) {
                $yaExisteUsuario = TRUE;
                echo 'usuarioexiste_';
                $sql = "SELECT max(idpersona) as id from persona";
                $comando2 = Yii::app()->db->createCommand($sql)->queryAll();
                $iddocente = $comando2[0]["id"] + 1;

                $usuarioNuevo = $usuario . $iddocente;
                echo $usuarioNuevo;
                return;
            }

            if (!$yaExisteUsuario) {

                $cmdActualizaPersona = Yii::app()->db->createCommand();

                $cmdActualizaPersona->update('persona', array(
                    'nombre' => $nombre,
                    'apellidopaterno' => $apellidop,
                    'apellidomaterno' => $apellidom,
                    'tipo' => 'docente',
                    'usuario' => $usuario,
                    'contra' => $password,
                    'DNI' => $password
                        ), 'idpersona=:idpersona', array(':idpersona' => $iddocente));

                echo 'ok';
            }
        } else if ($tipo == "delete") {

            $cmdEliminapersona = Yii::app()->db->createCommand();
            $cmdEliminadocente = Yii::app()->db->createCommand();

            try {
                $cmdEliminadocente->delete('docente', 'iddocente=:idpersona', array(':idpersona' => $iddocente));
                $cmdEliminapersona->delete('persona', 'idpersona=:idpersona', array(':idpersona' => $iddocente));
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
            echo 'ok';
        }
    }

/////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////
//////////////// FIN PREREGISTRO DOCENTESSSSSSSSSSSSSSS
/////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////
//////////////// ASIGNACION DE CURSO A DOCENTES
/////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////    


    public function actionAsignacion_curso_docente() {
        $this->renderPartial('asignacion_curso_docente');
    }

    public function actionOperaciones_asignacioncd() {

        $idanio = $_SESSION['anio'];
        $idfilial = $_SESSION['idfilial'];

        if (isset($_POST['iddocente'])) {
            $iddocente = $_POST['iddocente'];
        }
        if (isset($_POST['idCDG'])) {
            $idCDG = $_POST['idCDG'];
        }
        if (isset($_POST['nivel'])) {
            $nivel = $_POST['nivel'];
        }
        if (isset($_POST['grado'])) {
            $grado = $_POST['grado'];
        }
        if (isset($_POST['tipo'])) {
            $tipo = $_POST['tipo'];
        }
        if ($tipo == 'listacdg') {

            if ($nivel == '0')
                $nivel = "";
            if ($grado == '0')
                $grado = "";

            $cmdcargacdg = "CALL CARGA_DATOS_CURSO_GRADO_X_NIVEL('" . $nivel . "','" . $grado . "'," . $idfilial . "," . $idanio . ");";

            $datacdg = Yii::app()->db->createCommand($cmdcargacdg)->queryAll();
            echo json_encode($datacdg, JSON_PRETTY_PRINT);
        } else if ($tipo == "listadocentes") {
            $cmdcargadocentes = "CALL CARGA_DATOS_DOCENTES();";

            $datadocentes = Yii::app()->db->createCommand($cmdcargadocentes)->queryAll();
            echo json_encode($datadocentes, JSON_PRETTY_PRINT);
        } else if ($tipo == "actualizadocenteCDG") {

            if ($iddocente == "0") {
                $iddocente = null;
            }

            try {
                $cmdActualizaCDG = Yii::app()->db->createCommand();
                //Actualizando datos...
                $cmdActualizaCDG->update('curso_docente_grado', array(
                    'iddocente' => $iddocente
                        ), 'idCursoDG=:idCursoDG', array(':idCursoDG' => $idCDG));
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
            echo 'ok';
        }
    }

    /////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////
//////////////// FIN ASIGNACION DE CURSO A DOCENTES
/////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////
//
//        
    //colegio 24-03-15

    public function actionRegistroColegios() {
        $seleccion = Yii::app()->db->createCommand()
                ->select('*')
                ->from('colegio_procedencia')
                ->queryAll();

        $this->renderPartial('registroAcademico/registroColegio', array('mostrar' => $seleccion));
    }

    public function actionActualizarColegio() {
        $colegio = $_POST["colegio"];
        $idcolegio = $_POST["idcolegio"];

        $cmdActualizaColegio = Yii::app()->db->createCommand();
        $cmdActualizaColegio->update('colegio_procedencia', array(
            'nombreColegio' => $colegio,
                ), 'idcolegiop=:idcolegiop', array(':idcolegiop' => $idcolegio));
    }

    public function actionEliminarColegio() {
        $colegio = $_POST["colegio"];
        $command = Yii::app()->db->createCommand();
        $command->delete('colegio_procedencia', 'idcolegiop=:idcolegiop', array(
            'idcolegiop' => $colegio));
    }

    /*
     * Inicio Carpeta Registro Académico
     */

    /* AREA */

    public function actionRegistrararea() {
        $seleccion = Yii::app()->db->createCommand()
                ->select('*')
                ->from('area')
                ->queryAll();

        $this->renderPartial('registroAcademico/registroArea', array('mostrar' => $seleccion));
    }

    public function actionGuardarAreas() {
        $nombreArea = $_POST["nombre"];

        $command = Yii::app()->db->createCommand();
        $command->insert('area', array(
            'Descripcion' => $nombreArea));
    }

    public function actionActualizarArea() {
        $nombreArea = $_POST["area"];
        $idarea = $_POST["idarea"];

        $cmdActualizaArea = Yii::app()->db->createCommand();
        $cmdActualizaArea->update('area', array(
            'Descripcion' => $nombreArea,
                ), 'idarea=:idarea', array(':idarea' => $idarea));
    }

    public function actionEliminarArea() {
        $area = $_POST["area"];
        $command = Yii::app()->db->createCommand();
        $command->delete('area', 'idarea=:idarea', array(
            'idarea' => $area));
    }

    /*
     * Cursos
     */

    public function actionRegistrarCurso() {
        $seleccion1 = Yii::app()->db->createCommand()
                ->select('*')
                ->from('area')
                ->queryAll();

        $seleccion = Yii::app()->db->createCommand()
                ->select('c.idcurso,c.Nombre,a.Descripcion')
                ->from('curso c')
                ->join('area a', 'c.idarea=a.idarea')
                ->queryAll();

        $this->renderPartial('registroAcademico/registrarCurso', array('mostrar' => $seleccion, 'mostrar1' => $seleccion1));
    }

    public function actionGuardarcurso() {
        $curso = $_POST["nombreC"];
        $area = $_POST["nombreA"];

        $command = Yii::app()->db->createCommand();
        $command->insert('curso', array(
            'Nombre' => $curso,
            'idarea' => $area));
    }

    public function actionactualizarCursos() {
        $idcurso = $_POST["idc"];
        $namecurso = $_POST["curso"];

        $cmdActualizaCurso = Yii::app()->db->createCommand();
        $cmdActualizaCurso->update('curso', array(
            'Nombre' => $namecurso,
                ), 'idcurso=:idcurso', array(':idcurso' => $idcurso));
    }

    public function actionEliminarCurso() {
        $idcurso = $_POST["curso"];
        $command = Yii::app()->db->createCommand();
        $command->delete('curso', 'idcurso=:idcurso', array(
            'idcurso' => $idcurso));
    }

    //Filial

    public function actionRegistrarfilial() {
        $seleccion = Yii::app()->db->createCommand()
                ->select('*')
                ->from('filial')
                ->queryAll();

        $this->renderPartial('registroAcademico/registroFilial', array('mostrar' => $seleccion));
    }

    public function actionGuardarfilial() {
        $filial = $_POST["f"];
        $direccion = $_POST["d"];
        $telefono = $_POST["t"];

        $command = Yii::app()->db->createCommand();
        $command->insert('filial', array(
            'Direccion' => $direccion,
            'Distrito' => $filial,
            'Telefono' => $telefono));
    }

    public function actionActualizarFilial() {
        $filial = $_POST["filial"];
        $idfilial = $_POST["idfilial"];
        $direccion = $_POST["direccion"];
        $telefono = $_POST["telefono"];

        $cmdActualizaArea = Yii::app()->db->createCommand();
        $cmdActualizaArea->update('filial', array(
            'Distrito' => $filial,
            'Direccion' => $direccion,
            'Telefono' => $telefono,
                ), 'idfilial=:idfilial', array(':idfilial' => $idfilial));
    }

    public function actionEliminarFilial() {
        $filial = $_POST["filial"];
        $command = Yii::app()->db->createCommand();
        $command->delete('filial', 'idfilial=:idfilial', array(
            'idfilial' => $filial));
    }

    ///// PDFboletinNOTAS

    public function actionBoletinNotas() {


        $this->renderPartial('publicacionsAcademica/boletinNotas');
    }

    public function actionCargarBoletinNotas() {

        $_SESSION['nivel'] = $_POST['nivel'];
        $_SESSION['grado'] = $_POST['grado'];
        $_SESSION['seccion'] = $_POST['seccion'];
    }

    public function actionGuardarPDFBoletin() {
        $anio = date("Y");
        $filial = $_SESSION['idfilial'];

        $nivel = $_SESSION['nivel'];
        $grado = $_SESSION['grado'];
        $seccion = $_SESSION['seccion'];
        //$mes = $_SESSION['mes'] ;

        $fecha = date("Y-m-d");


        $mes = date("m");

        $rutaEnServicio = 'boletinpdfNotas';

        $rutaTemporal = $_FILES["archivo"]["tmp_name"];

        $nombreImagen = $_FILES["archivo"]["name"];

        $rutaDestino = $rutaEnServicio . '/' . $nombreImagen;

        move_uploaded_file($rutaTemporal, $rutaDestino);


        $cmdBoletinNotasPDF = Yii::app()->db->createCommand();
        $cmdBoletinNotasPDF->insert('boletinnotas', array(
            'idanio' => $anio, 'idfilial' => $filial, 'nivel' => $nivel, 'grado' => $grado, 'idSeccion' => $seccion, 'mes' => $mes, 'fecha' => $fecha, 'nombreArchivo' => $nombreImagen,
            'archivo' => $rutaDestino));
    }

    public function actionCargarBoletinNotasSPDF() {

        $filial = $_SESSION['idfilial'];
        $idanio = $_SESSION['anio'];
        $nivel = $_POST['nivel'];
        $grado = $_POST['grado'];
        $seccion = $_POST['seccion'];

        $mostrar = " CALL BOLETIN_NOTAS_MOSTRAR(" . $idanio . "," . $filial . ",'" . $nivel . "','" . $grado . "'," . $seccion . ");";
        $seleccion = Yii::app()->db->createCommand($mostrar)->queryAll();

        $this->renderPartial('reportes/reporteBoletinNotas', array('arrayDataNuevo' => $seleccion));
    }

    public function actionEliminarBoletin() {
        $boletin = $_POST["boletin"];
        $command = Yii::app()->db->createCommand();
        $command->delete('boletinnotas', 'idboletin=:idboletin', array(
            'idboletin' => $boletin));
    }

    ///// MANTENEDOR CAPACIDADES


    public function actionRegistrarCapacidad() {

        $tipoAccion = "show";

        if (isset($_SESSION['anio'])) {
            $idanio = $_SESSION['anio'];
        }
        if (isset($_SESSION['idfilial'])) {
            $idfilial = $_SESSION['idfilial'];
        }

        if (isset($_POST['iddi'])) {
            $iddi = $_POST['iddi'];
        }
        if (isset($_POST['nivel'])) {
            $nivel = $_POST['nivel'];
        }
        if (isset($_POST['grado'])) {
            $grado = $_POST['grado'];
        }
        if (isset($_POST['nsecciones'])) {
            $nsecciones = $_POST['nsecciones'];
        }
        if (isset($_POST['tipoaccion'])) {
            $tipoAccion = $_POST['tipoaccion'];
        }

        if ($tipoAccion == "show") {
            $seleccion = Yii::app()->db->createCommand()
                    ->select('*')
                    ->from('competencias')
                    ->queryAll();

            $this->renderPartial('registroAcademico/registrarCapacidades', array('mostrar' => $seleccion));
        } else if ($tipoAccion == "insert") {

            try {
                $cmdinsertandodi = Yii::app()->db->createCommand();
                $cmdinsertandodi->insert('detalleinstitucional', array(
                    'idFilial' => $idfilial,
                    'nivel' => $nivel,
                    'grado' => $grado,
                    'idAnio' => $idanio,
                    'numerosecciones' => $nsecciones));
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
            echo 'ok';
        } else if ($tipoAccion == "update") {

            try {

                $command = Yii::app()->db->createCommand();
                $command->update('detalleinstitucional', array(
                    'idFilial' => $idfilial,
                    'nivel' => $nivel,
                    'grado' => $grado,
                    'idAnio' => $idanio,
                    'numerosecciones' => $nsecciones
                        ), 'idDI=:iddi', array(':iddi' => $iddi));
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }
            echo 'ok';
        } else if ($tipoAccion == "delete") {
            try {
                $command = Yii::app()->db->createCommand();
                $command->delete('detalleinstitucional', 'idDI=:iddi', array(':iddi' => $iddi));
            } catch (Exception $exc) {
                echo $exc->getTraceAsString();
            }

            echo 'ok';
        }
    }

    /////////////////////////////////
    //CONFIGURACION DE LA VISTA DE EVALUACIONES DEL ALUMNO
    /////////////////////////////////

    public function actionConfig_vista_evaluaciones_alumno() {

        $idanio = $_SESSION['anio'];

        $cmdareas = " CALL CARGA_AREAS_PARA_ADMIN(" . $idanio . ");";
        $dataareas = Yii::app()->db->createCommand($cmdareas)->queryAll();

        $this->renderPartial('config_evaluaciones_alumno', array(
            'dataareas' => $dataareas));
    }

    public function actionCarga_tabla_evaluaciones_alumno() {

        $idanio = $_SESSION['anio'];

        $idarea = 0;

        if (isset($_POST['idarea'])) {
            $idarea = $_POST['idarea'];
        }

        $cmdevaluaciones = " CALL CARGA_EVALUACIONES_PARA_MOSTRAR_ADMIN(" . $idanio . "," . $idarea . ");";
        $dataevaluaciones = Yii::app()->db->createCommand($cmdevaluaciones)->queryAll();

        $this->renderPartial('ajax_tablas/tabla_vista_evaluaciones', array(
            'dataevaluaciones' => $dataevaluaciones));
    }

    public function actionActualiza_visibilidad_evaluacion() {

        $idanio = $_SESSION['anio'];
        $idarea = 0;

        if (isset($_POST['idarea'])) {
            $idarea = $_POST['idarea'];
        }
        if (isset($_POST['idcompetencia'])) {
            $idc = $_POST['idcompetencia'];
        }
        if (isset($_POST['idevaluacion'])) {
            $ide = $_POST['idevaluacion'];
        }
        if (isset($_POST['valor'])) {
            $val = $_POST['valor'];
        }

        if ($val == 1) {
            $val = "S";
        }

        try {
            $cmdactualizaCE = Yii::app()->db->createCommand();
            $cmdactualizaCE->update('competencia_evaluacion', array(
                'muestra' => $val,
                    ), 'idanio=:idanio and idarea=:idar and idcompetencias=:idc and idevaluacion=:ide', array(':idanio' => $idanio, ':idar' => $idarea, ':idc' => $idc, ':ide' => $ide));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        echo 'ok';
    }

    /////////////////////////////////
    // FIN  CONFIGURACION DE LA VISTA DE EVALUACIONES DEL ALUMNO
    /////////////////////////////////


    public function actionReportebimestralalumno() {

        $idanio = $_SESSION['anio'];
        $idarea = 0;

        if (isset($_POST['idarea'])) {
            $idarea = $_POST['idarea'];
        }
        if (isset($_POST['idcompetencia'])) {
            $idc = $_POST['idcompetencia'];
        }
        if (isset($_POST['idevaluacion'])) {
            $ide = $_POST['idevaluacion'];
        }
        if (isset($_POST['valor'])) {
            $val = $_POST['valor'];
        }

        if ($val == 1) {
            $val = "S";
        }

        try {
            $cmdactualizaCE = Yii::app()->db->createCommand();
            $cmdactualizaCE->update('competencia_evaluacion', array(
                'muestra' => $val,
                    ), 'idanio=:idanio and idarea=:idar and idcompetencias=:idc and idevaluacion=:ide', array(':idanio' => $idanio, ':idar' => $idarea, ':idc' => $idc, ':ide' => $ide));
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        echo 'ok';
    }

    ///////////////////////////////////////////////////
    //CARGA SECCIONES DE ACUERDO AL NIVEL GRADO
    ///////////////////////////////////////////////////

    public function actionCargasecciones() {

        $idanio = $_SESSION['anio'];
        $idfilial = $_SESSION['idfilial'];

        if (isset($_POST['nivel'])) {
            $nivel = $_POST['nivel'];
        }
        if (isset($_POST['grado'])) {
            $grado = $_POST['grado'];
        }

        try {

            $cmdcargasecciones = "CALL CARGA_SECCIONES_POR_NIVEL_GRADO(" . $idanio . "," . $idfilial . ",'" . $nivel . "','" . $grado . "');";

            $datasecciones = Yii::app()->db->createCommand($cmdcargasecciones)->queryAll();

            echo json_encode($datasecciones, JSON_PRETTY_PRINT);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    ///////////////////////////////////////////////////
    //CARGA SECCIONES DE ACUERDO AL NIVEL GRADO
    ///////////////////////////////////////////////////
    ///////////////////////////////////////////////////
    //MUESTRA REPORTE BIMESTRAL X ALUMNO
    ///////////////////////////////////////////////////

    public function actionCargareportenotasalumno() {

        $this->renderPartial('reporte_notas_alumno');
    }

    public function actionCargalistaalumnos() {

        $idanio = $_SESSION['anio'];
        $idfilial = $_SESSION['idfilial'];

        if (isset($_POST['grado'])) {
            $grado = $_POST['grado'];
        }
        if (isset($_POST['nivel'])) {
            $nivel = $_POST['nivel'];
        }
        if (isset($_POST['idseccion'])) {
            $idseccion = $_POST['idseccion'];
        }

        if ($grado == "0")
            $grado = "";
        if ($nivel == "0")
            $nivel = "";

        $cmdcargalistaalumnos = "CALL CARGA_ALUMNO_MATRICULADOS_X_SECCION('" . $nivel . "','" . $grado . "'," . $idseccion . "," . $idanio . "," . $idfilial . ");";
        $datalistaalumnos = Yii::app()->db->createCommand($cmdcargalistaalumnos)->queryAll();

        echo json_encode($datalistaalumnos, JSON_PRETTY_PRINT);
    }

    public function actionAjax_setcodmatricula() {

        $_SESSION['codmatricula'] = $_POST['codmatricula'];
        $_SESSION['encabezado']['nombre'] = $_POST['nombre'];
        $_SESSION['encabezado']['nivel'] = $_POST['nivel'];
        $_SESSION['encabezado']['grado'] = $_POST['grado'];
        $_SESSION['encabezado']['seccion'] = $_POST['seccion'];

        echo 'ok';
    }

    public function actionCargareportebimstralalumno() {

        if (isset($_SESSION['codmatricula']) && $_SESSION['codmatricula'] != NULL) {

            $codmatricula = $_SESSION['codmatricula'];
            $encabezado = $_SESSION['encabezado'];

            $arraypbareas = array();
            $arraynasistencias = array();
            $arrayefectividadacadem = array();

            $cmdpromedioscursos = "CALL CARGA_NOTAS_CURSOS_POR_ALUMNO(" . $codmatricula . ");";
            $datapromedioscursos = Yii::app()->db->createCommand($cmdpromedioscursos)->queryAll();


            $cmdpromediosareas = "CALL CARGA_NOTAS_AREAS_POR_ALUMNO(" . $codmatricula . ");";
            $datapromediosareas = Yii::app()->db->createCommand($cmdpromediosareas)->queryAll();

            $cmdasistenciasal = "CALL calcular_asistencia_alumno(" . $codmatricula . ");";
            $dataasistenciasal = Yii::app()->db->createCommand($cmdasistenciasal)->queryAll();

            $cmdefectividadacadem = "select comportamiento, puesto from efectividad_academica where codigoMatricula=" . $codmatricula . " "
                    . "order by idbimestre;";
            $dataefectividadacadm = Yii::app()->db->createCommand($cmdefectividadacadem)->queryAll();



            foreach ($datapromediosareas as $fila) {
                $pbarea = intval($fila['b1']) + intval($fila['b2']) + intval($fila['b4']) + intval($fila['b4']);
                array_push($arraypbareas, round($pbarea / 4));
            }

            foreach ($dataasistenciasal as $key1 => $fila) {
                foreach ($fila as $key2 => $valor) {
                    $arraynasistencias[$key2][$key1] = $valor; //$dataasistenciasal[$key1][$key2];
                }
            }

            foreach ($dataefectividadacadm as $key1 => $fila) {
                foreach ($fila as $key2 => $valor) {
                    $arrayefectividadacadem[$key2][$key1] = $valor; //$dataasistenciasal[$key1][$key2];
                }
            }

            $this->reporteBimestralAlumnoExcel($encabezado, $datapromedioscursos, $datapromediosareas, $arraypbareas, $arraynasistencias, $arrayefectividadacadem);
            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        }
//        echo '';
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        ///////////NOTAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
        ///////////////////// FALTA MEJORAR LOS ESTILOS DEL REPORTE (SALEEN UNO ABAJO DEL OTRO)))
    }

    private function reporteBimestralAlumnoExcel($encabezado, $datapromedioscursos, $datapromediosareas, $arraypbareas, $arraynasistencias, $arrayefectividadacadem) {

        Yii::import('ext.phpexcel.XPHPExcel');
        $objPHPExcel = XPHPExcel::createPHPExcel();

        $objPHPExcel->getProperties()->setCreator("ENGELS")
                ->setLastModifiedBy("ENGELS")
                ->setTitle("REPORTE DE NOTAS")
                ->setSubject("coming soom")
                ->setDescription("Test document for YiiExcel, generated using PHP classes.")
                ->setKeywords("office PHPExcel php YiiExcel UPNFM")
                ->setCategory("Test result file");

        //COLORES FUENTES

        $negro = '000000';
        $blanco = 'FFFFFF';
        $rojo = 'FF0000';
        $azul = '0000FF';

        // INICIO CABECERA
        $colini = 65; //A
        $filini = 3;

        $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue(chr($colini) . ($filini), 'APELLIDOS Y NOMBRES:');
        $this->cellColor(chr($colini) . ($filini), $blanco, $negro, 10, true, 'i', $objPHPExcel);

        $objPHPExcel->setActiveSheetIndex(0)
                ->mergeCells(chr($colini + 1) . $filini . ':' . chr($colini + 13) . ($filini))
                ->setCellValue(chr($colini + 1) . ($filini), $encabezado['nombre']);
        $this->cellColor(chr($colini + 1) . $filini . ':' . chr($colini + 13) . ($filini), $blanco, $negro, 10, true, 'i', $objPHPExcel);
        ////////////////////////////////////////////////
        $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue(chr($colini) . ($filini + 1), 'NIVEL:                ' . $encabezado['nivel']);
        $this->cellColor(chr($colini) . ($filini + 1), $blanco, $negro, 10, true, 'i', $objPHPExcel);

        $objPHPExcel->setActiveSheetIndex(0)
                ->mergeCells(chr($colini + 1) . ($filini + 1) . ':' . chr($colini + 6) . ($filini + 1))
                ->setCellValue(chr($colini + 1) . ($filini + 1), 'GRADO:');
        $this->cellColor(chr($colini + 1) . ($filini + 1) . ':' . chr($colini + 6) . ($filini + 1), $blanco, $negro, 10, true, 'c', $objPHPExcel);

        $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue(chr($colini + 7) . ($filini + 1), $encabezado['grado']);
        $this->cellColor(chr($colini + 7) . ($filini + 1), $blanco, $negro, 10, true, 'c', $objPHPExcel);

        $objPHPExcel->setActiveSheetIndex(0)
                ->mergeCells(chr($colini + 8) . ($filini + 1) . ':' . chr($colini + 9) . ($filini + 1))
                ->setCellValue(chr($colini + 8) . ($filini + 1), 'SECCIÓN:');
        $this->cellColor(chr($colini + 8) . ($filini + 1) . ':' . chr($colini + 9) . ($filini + 1), $blanco, $negro, 10, true, 'c', $objPHPExcel);

        $objPHPExcel->setActiveSheetIndex(0)
                ->mergeCells(chr($colini + 10) . ($filini + 1) . ':' . chr($colini + 13) . ($filini + 1))
                ->setCellValue(chr($colini + 10) . ($filini + 1), $encabezado['seccion']);
        $this->cellColor(chr($colini + 10) . ($filini + 1) . ':' . chr($colini + 13) . ($filini + 1), $blanco, $negro, 10, true, 'c', $objPHPExcel);

        // FIN CCABECERA
        //GENERANDO LA PRIMERA TABLA 


        $col = 65; //A
        $fil = 7;

        $this->setAnchoColumna(chr($col), 40, $objPHPExcel);
        $objPHPExcel->setActiveSheetIndex(0)
                ->mergeCells(chr($col) . $fil . ':' . chr($col) . ($fil + 1))
                ->setCellValue(chr($col) . $fil, 'PROMEDIO POR CURSO');
        $this->cellColor(chr($col) . $fil . ':' . chr($col) . ($fil + 1), $blanco, $negro, 8, true, 'c', $objPHPExcel);

        $objPHPExcel->setActiveSheetIndex(0)
                ->mergeCells(chr($col + 1) . $fil . ':' . chr($col + 4) . $fil)
                ->setCellValue(chr($col + 1) . $fil . '', 'BIMESTRE');
        $this->cellColor(chr($col + 1) . $fil . ':' . chr($col + 4) . $fil, $blanco, $negro, 8, true, 'c', $objPHPExcel);


        $this->setAnchoColumna(chr($col + 1), 3, $objPHPExcel);
        $this->setAnchoColumna(chr($col + 2), 3, $objPHPExcel);
        $this->setAnchoColumna(chr($col + 3), 3, $objPHPExcel);
        $this->setAnchoColumna(chr($col + 4), 3, $objPHPExcel);
        $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue(chr($col + 1) . ($fil + 1), '1°')
                ->setCellValue(chr($col + 2) . ($fil + 1), '2°')
                ->setCellValue(chr($col + 3) . ($fil + 1), '3°')
                ->setCellValue(chr($col + 4) . ($fil + 1), '4°');
        $this->cellColor(chr($col + 1) . ($fil + 1), $blanco, $negro, 8, true, 'c', $objPHPExcel);
        $this->cellColor(chr($col + 2) . ($fil + 1), $blanco, $negro, 8, true, 'c', $objPHPExcel);
        $this->cellColor(chr($col + 3) . ($fil + 1), $blanco, $negro, 8, true, 'c', $objPHPExcel);
        $this->cellColor(chr($col + 4) . ($fil + 1), $blanco, $negro, 8, true, 'c', $objPHPExcel);

        $this->setAnchoColumna(chr($col + 5), 5, $objPHPExcel);
        $objPHPExcel->setActiveSheetIndex(0)
                ->mergeCells(chr($col + 5) . $fil . ':' . chr($col + 5) . ($fil + 1))
                ->setCellValue(chr($col + 5) . $fil, 'PROM.');
        $this->cellColor(chr($col + 5) . $fil . ':' . chr($col + 5) . ($fil + 1), $blanco, $negro, 8, true, 'c', $objPHPExcel);

        //////////////////////////////DATAAAAA
        $colaux = $col;
        $fil = $fil + 2;
        foreach ($datapromedioscursos as $fila) {
            $col = $colaux;
            foreach ($fila as $key => $value) {
                if ($key != 'idcurso') {
                    if (is_numeric($value)) {
                        $this->cellColor(chr($col) . $fil, $blanco, ((floatval($value) >= 10.5 ) ? $azul : $rojo), 8, true, 'c', $objPHPExcel);
                    } else {
                        $this->cellColor(chr($col) . $fil, $blanco, $negro, 8, false, 'i', $objPHPExcel);
                    }
                    $objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue(chr($col) . $fil, $value);
                    $col++;
                }
            }
            $fil++;
        }


        ///////////////////////////////////////////////////////////
        //SEGUNDA TABLA
        ///////////////////////////////////////////////////////////
        $col2 = 65 + 7; //H
        $fil2 = 7;

//           
        $objPHPExcel->setActiveSheetIndex(0)
                ->mergeCells(chr($col2) . $fil2 . ':' . chr($col2 + 1) . ($fil2 + 1))
                ->setCellValue(chr($col2) . $fil2, 'CONTROL ASISTENCIA');
        $this->cellColor(chr($col2) . $fil2 . ':' . chr($col2 + 1) . ($fil2 + 1), $blanco, $negro, 8, true, 'c', $objPHPExcel);


        $objPHPExcel->setActiveSheetIndex(0)
                ->mergeCells(chr($col2 + 2) . $fil2 . ':' . chr($col2 + 5) . $fil2)
                ->setCellValue(chr($col2 + 2) . $fil2, 'BIMESTRE');
        $this->cellColor(chr($col2 + 2) . $fil2 . ':' . chr($col2 + 5) . $fil2, $blanco, $negro, 8, true, 'c', $objPHPExcel);

        $this->setAnchoColumna(chr($col2 + 2), 3, $objPHPExcel);
        $this->setAnchoColumna(chr($col2 + 3), 3, $objPHPExcel);
        $this->setAnchoColumna(chr($col2 + 4), 3, $objPHPExcel);
        $this->setAnchoColumna(chr($col2 + 5), 3, $objPHPExcel);
        $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue(chr($col2 + 2) . ($fil2 + 1), '1°')
                ->setCellValue(chr($col2 + 3) . ($fil2 + 1), '2°')
                ->setCellValue(chr($col2 + 4) . ($fil2 + 1), '3°')
                ->setCellValue(chr($col2 + 5) . ($fil2 + 1), '4°');
        $this->cellColor(chr($col2 + 2) . ($fil2 + 1), $blanco, $negro, 8, true, 'c', $objPHPExcel);
        $this->cellColor(chr($col2 + 3) . ($fil2 + 1), $blanco, $negro, 8, true, 'c', $objPHPExcel);
        $this->cellColor(chr($col2 + 4) . ($fil2 + 1), $blanco, $negro, 8, true, 'c', $objPHPExcel);
        $this->cellColor(chr($col2 + 5) . ($fil2 + 1), $blanco, $negro, 8, true, 'c', $objPHPExcel);

        $this->setAnchoColumna(chr($col2 + 6), 5, $objPHPExcel);
        $objPHPExcel->setActiveSheetIndex(0)
                ->mergeCells(chr($col2 + 6) . $fil2 . ':' . chr($col2 + 6) . ($fil2 + 1))
                ->setCellValue(chr($col2 + 6) . $fil2, 'TOTAL');
        $this->cellColor(chr($col2 + 6) . $fil2 . ':' . chr($col2 + 6) . ($fil2 + 1), $blanco, $negro, 8, true, 'c', $objPHPExcel);

        $this->setAnchoColumna(chr($col2), 20, $objPHPExcel);
        $objPHPExcel->setActiveSheetIndex(0)
                ->mergeCells(chr($col2) . ($fil2 + 2) . ':' . chr($col2) . ($fil2 + 3))
                ->setCellValue(chr($col2) . ($fil2 + 2), 'TARDANZAS')
                ->mergeCells(chr($col2) . ($fil2 + 4) . ':' . chr($col2) . ($fil2 + 5))
                ->setCellValue(chr($col2) . ($fil2 + 4), 'INASISTENCIAS');
        $this->cellColor(chr($col2) . ($fil2 + 2) . ':' . chr($col2) . ($fil2 + 3), $blanco, $negro, 8, true, 'c', $objPHPExcel);
        $this->cellColor(chr($col2) . ($fil2 + 4) . ':' . chr($col2) . ($fil2 + 5), $blanco, $negro, 8, true, 'c', $objPHPExcel);


        $this->setAnchoColumna(chr($col2 + 1), 20, $objPHPExcel);
        $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue(chr($col2 + 1) . ($fil2 + 2), 'JUSTIFICADA')
                ->setCellValue(chr($col2 + 1) . ($fil2 + 3), 'INJUSTIFICADA')
                ->setCellValue(chr($col2 + 1) . ($fil2 + 4), 'JUSTIFICADA')
                ->setCellValue(chr($col2 + 1) . ($fil2 + 5), 'INJUSTIFICADA');
        $this->cellColor(chr($col2 + 1) . ($fil2 + 2), $blanco, $negro, 8, true, 'c', $objPHPExcel);
        $this->cellColor(chr($col2 + 1) . ($fil2 + 3), $blanco, $negro, 8, true, 'c', $objPHPExcel);
        $this->cellColor(chr($col2 + 1) . ($fil2 + 4), $blanco, $negro, 8, true, 'c', $objPHPExcel);
        $this->cellColor(chr($col2 + 1) . ($fil2 + 5), $blanco, $negro, 8, true, 'c', $objPHPExcel);




        /////////////////////////////////////////////////////////////
        //DATAAAAAAAAAAAAAAAAA SGUNDA TABLAAAAAAAAAAA
        /////////////////////////////////////////////////////////////
        $colaux = $col2 + 2;
        $fil2 = $fil2 + 2;
        foreach ($arraynasistencias as $key => $fila) {
            $col2 = $colaux;
            if ($key != "Bimestre" && $key != "Asistencia") {
                foreach ($fila as $value) {
                    $objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue(chr($col2) . $fil2, $value);
                    $this->cellColor(chr($col2) . $fil2, $blanco, $negro, 8, false, 'c', $objPHPExcel);
                    $col2++;
                    $this->cellColor(chr($col2) . $fil2, $blanco, $negro, 8, false, 'c', $objPHPExcel);
                }
                $fil2++;
            }
        }

        ///////////////////////////////////////////////////////////////////
        //TERCERA TABLAAAAAAAAAAAAAAAAAAAAAAAAA
        ///////////////////////////////////////////////////////////////////
        $col3 = 65 + 7; //H
        $fil3 = 15;


        $objPHPExcel->setActiveSheetIndex(0)
                ->mergeCells(chr($col3) . $fil3 . ':' . chr($col3 + 1) . ($fil3 + 1))
                ->setCellValue(chr($col3) . $fil3, 'PROMEDIO POR AREA');
        $this->cellColor(chr($col3) . $fil3 . ':' . chr($col3 + 1) . ($fil3 + 1), $blanco, $negro, 8, true, 'c', $objPHPExcel);

        $objPHPExcel->setActiveSheetIndex(0)
                ->mergeCells(chr($col3 + 2) . $fil3 . ':' . chr($col3 + 5) . $fil3)
                ->setCellValue(chr($col3 + 2) . $fil3 . '', 'BIMESTRE');
        $this->cellColor(chr($col3 + 2) . $fil3 . ':' . chr($col3 + 5) . $fil3, $blanco, $negro, 8, true, 'c', $objPHPExcel);

        $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue(chr($col3 + 2) . ($fil3 + 1), '1°')
                ->setCellValue(chr($col3 + 3) . ($fil3 + 1), '2°')
                ->setCellValue(chr($col3 + 4) . ($fil3 + 1), '3°')
                ->setCellValue(chr($col3 + 5) . ($fil3 + 1), '4°');
        $this->cellColor(chr($col3 + 2) . ($fil3 + 1), $blanco, $negro, 8, true, 'c', $objPHPExcel);
        $this->cellColor(chr($col3 + 3) . ($fil3 + 1), $blanco, $negro, 8, true, 'c', $objPHPExcel);
        $this->cellColor(chr($col3 + 4) . ($fil3 + 1), $blanco, $negro, 8, true, 'c', $objPHPExcel);
        $this->cellColor(chr($col3 + 5) . ($fil3 + 1), $blanco, $negro, 8, true, 'c', $objPHPExcel);

        $objPHPExcel->setActiveSheetIndex(0)
                ->mergeCells(chr($col3 + 6) . $fil3 . ':' . chr($col3 + 6) . ($fil3 + 1))
                ->setCellValue(chr($col3 + 6) . $fil3, 'PROM');
        $this->cellColor(chr($col3 + 6) . $fil3 . ':' . chr($col3 + 6) . ($fil3 + 1), $blanco, $negro, 8, true, 'c', $objPHPExcel);

        ///////////////////////////////////////////////////////////////////
        //DATA TERCERA TABLA
        ///////////////////////////////////////////////////////////////////
        $colaux = $col3;
        $fil3 = $fil3 + 2;
        foreach ($datapromediosareas as $index => $fila) {
            $col3 = $colaux;
            foreach ($fila as $key => $value) {
                if ($key != "idarea") {
                    $objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue(chr($col3) . $fil3, $value);
                    if ($key == "area") {
                        $objPHPExcel->setActiveSheetIndex(0)
                                ->mergeCells(chr($col3) . $fil3 . ':' . chr($col3 + 1) . ($fil3));
                        $this->cellColor(chr($col3) . $fil3 . ':' . chr($col3 + 1) . ($fil3), $blanco, $negro, 8, false, 'i', $objPHPExcel);
                        $col3++;
                    } else {
                        $this->cellColor(chr($col3) . $fil3, $blanco, ((floatval($value) >= 10.5 ) ? $azul : $rojo), 8, true, 'c', $objPHPExcel);
                    }
                    $col3++;
                }
            }

            $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue(chr($col3) . $fil3, $arraypbareas[$index]);
            $this->cellColor(chr($col3) . $fil3, $blanco, ((floatval($arraypbareas[$index]) >= 10.5 ) ? $azul : $rojo), 8, true, 'c', $objPHPExcel);

            $fil3++;
        }
        //
        ///////////////////////////////////////////////////////////////////
        //CUARTAAAAAAAAAA TABLAAAAAAAAAAAAAAAAAAAAAAAAA
        ///////////////////////////////////////////////////////////////////
        $col4 = 65 + 7; //H
        $fil4 = $fil3 + 2;

        $objPHPExcel->setActiveSheetIndex(0)
                ->mergeCells(chr($col4) . $fil4 . ':' . chr($col4 + 1) . ($fil4 + 1))
                ->setCellValue(chr($col4) . $fil4, 'EFECTIVIDAD ACADÉMICA');
        $this->cellColor(chr($col4) . $fil4 . ':' . chr($col4 + 1) . ($fil4 + 1), $blanco, $negro, 8, true, 'c', $objPHPExcel);


        $objPHPExcel->setActiveSheetIndex(0)
                ->mergeCells(chr($col4 + 2) . $fil4 . ':' . chr($col4 + 5) . $fil4)
                ->setCellValue(chr($col4 + 2) . $fil4 . '', 'BIMESTRE');
        $this->cellColor(chr($col4 + 2) . $fil4 . ':' . chr($col4 + 5) . $fil4, $blanco, $negro, 8, true, 'c', $objPHPExcel);


        $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue(chr($col4 + 2) . ($fil4 + 1), '1°')
                ->setCellValue(chr($col4 + 3) . ($fil4 + 1), '2°')
                ->setCellValue(chr($col4 + 4) . ($fil4 + 1), '3°')
                ->setCellValue(chr($col4 + 5) . ($fil4 + 1), '4°');
        $this->cellColor(chr($col4 + 2) . ($fil4 + 1), $blanco, $negro, 8, true, 'c', $objPHPExcel);
        $this->cellColor(chr($col4 + 3) . ($fil4 + 1), $blanco, $negro, 8, true, 'c', $objPHPExcel);
        $this->cellColor(chr($col4 + 4) . ($fil4 + 1), $blanco, $negro, 8, true, 'c', $objPHPExcel);
        $this->cellColor(chr($col4 + 5) . ($fil4 + 1), $blanco, $negro, 8, true, 'c', $objPHPExcel);



        $objPHPExcel->setActiveSheetIndex(0)
                ->mergeCells(chr($col4 + 6) . $fil4 . ':' . chr($col4 + 6) . ($fil4 + 1))
                ->setCellValue(chr($col4 + 6) . $fil4, 'PROM');
        $this->cellColor(chr($col4 + 6) . $fil4 . ':' . chr($col4 + 6) . ($fil4 + 1), $blanco, $negro, 8, true, 'c', $objPHPExcel);


        $objPHPExcel->setActiveSheetIndex(0)
                ->mergeCells(chr($col4) . ( $fil4 + 2) . ':' . chr($col4 + 1) . ($fil4 + 2))
                ->setCellValue(chr($col4) . ( $fil4 + 2), 'Comportamiento')
                ->mergeCells(chr($col4) . ($fil4 + 3) . ':' . chr($col4 + 1) . ($fil4 + 3))
                ->setCellValue(chr($col4) . ($fil4 + 3), 'Orden de Mérito');
        $this->cellColor(chr($col4) . ( $fil4 + 2) . ':' . chr($col4 + 1) . ($fil4 + 2), $blanco, $negro, 8, true, 'c', $objPHPExcel);
        $this->cellColor(chr($col4) . ($fil4 + 3) . ':' . chr($col4 + 1) . ($fil4 + 3), $blanco, $negro, 8, true, 'c', $objPHPExcel);


        ///////////////////////////////////////////////////////////////////
        //DATA CUARTAAAAAAAAAA TABLA
        ///////////////////////////////////////////////////////////////////

        $colaux = $col4 + 2;
        $fil4 = $fil4 + 2;
        foreach ($arrayefectividadacadem as $index => $fila) {
            $col4 = $colaux;
            foreach ($fila as $value) {
                $objPHPExcel->setActiveSheetIndex(0)
                        ->setCellValue(chr($col4) . $fil4, $value);
                $this->cellColor(chr($col4) . $fil4, $blanco, $negro, 8, true, 'c', $objPHPExcel);

                $col4++;
            }
            $fil4++;
        }

        // Rename worksheet
        $objPHPExcel->getActiveSheet()->setTitle('REPORTE DE NOTAS');

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $objPHPExcel->setActiveSheetIndex(0);

//        // Save a xls file
        $filename = $encabezado['nombre'];
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xls"');
        header('Cache-Control: max-age=0');
        header("Expires: 0");

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');

        $objWriter->save('php://output');

        unset($this->objWriter);
        unset($this->objWorksheet);
        unset($this->objReader);
        unset($this->objPHPExcel);
        exit();
        return;
    }

    private function cellColor($cells, $colorfondo, $colorletra, $tamletra, $bold, $alineacion, $obj) {
        $aling = NULL;
        if ($alineacion == 'd') {
            $aling = PHPExcel_Style_Alignment::HORIZONTAL_RIGHT;
        } else if ($alineacion == 'c') {
            $aling = PHPExcel_Style_Alignment::HORIZONTAL_CENTER;
        } if ($alineacion == 'i') {
            $aling = PHPExcel_Style_Alignment::HORIZONTAL_LEFT;
        } if ($alineacion == 'j') {
            $aling = PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY;
        }if ($alineacion == 'v') {
            $aling = PHPExcel_Style_Alignment::VERTICAL_CENTER;
        }

        $styleArray = array(
            'font' => array(
                'bold' => $bold,
                'color' => array('rgb' => $colorletra),
                'size' => $tamletra,
                'name' => 'Verdana',
                'rotation' => 90
            ),
            'alignment' => array(
                'horizontal' => $aling,
            ),
            'borders' => array(
                'outline' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                ),
            ),
            'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'startcolor' => array(
                    'rgb' => $colorfondo
                ),
            ),
        );

        $obj->getActiveSheet()->getStyle($cells)->applyFromArray($styleArray);
    }

    private function setAnchoColumna($col, $size, $obj) {
        if ($size == 0) {
            $obj->getActiveSheet()->getColumnDimension($col)->setAutoSize(true);
        } else {
            $obj->getActiveSheet()->getColumnDimension($col)->setWidth($size);
        }
    }

    ///////////////////////////////////////////////////
    //FIN  MUESTRA REPORTE BIMESTRAL X ALUMNO
    ///////////////////////////////////////////////////
    //

     
    
    ////
    ///////////////////////////////////////////////////
    // VERIFICA INGRESO DE NOTAS POR PARTE DE LO DOCENTES
    ///////////////////////////////////////////////////
    //
    
    public function actionVerificaingresonotas() {

        $this->renderPartial('seguimiento_ingrsonotas_docente');
    }

    public function actionAjax_carga_listadocentes() {

        $idanio = $_SESSION['anio'];
        $idfilial = $_SESSION['idfilial'];


        $cmdlistadocentes = " CALL CARGA_DOCENTES_CON_CURSOS_ASIGNADOS(" . $idanio . "," . $idfilial . ");";
        $datadocentes = Yii::app()->db->createCommand($cmdlistadocentes)->queryAll();

        $this->renderPartial('ajax_tablas/tabla_docentes', array('datadocentes' => $datadocentes));
    }

    public function actionAjax_carga_listacursosasignados() {

        $idanio = $_SESSION['anio'];
        $idfilial = $_SESSION['idfilial'];
        $iddocente = 0;

        if (isset($_POST['iddocente'])) {
            $iddocente = $_POST['iddocente'];
        }
        $cmdlistacursosa = " CALL CARGA_CURSOSASIGNADOS_X_DOCENTE(" . $idanio . "," . $iddocente . "," . $idfilial . ");";
        $listacursosa = Yii::app()->db->createCommand($cmdlistacursosa)->queryAll();

        $this->renderPartial('ajax_tablas/tabla_cursosasignados', array('datosCursos' => $listacursosa));
    }

    public function actionAjax_carga_notasbimestre() {

        $idcurso = $_POST['idcurso'];
        $idbimistre = $_POST['bimestre'];
        $idopcion = isset($_POST['opcion']) ? $_POST['opcion'] : 'html';


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

//             $this->layout = '//layouts/layout_onlycss';


            if ($idopcion == 'excel') {
                $this->reporte_excel_notasxbimestrexcurso($arrayDataNuevo, $arrayCabecera, $arrayCompetencias, $idbimistre);
            }

            $this->renderPartial('ajax_tablas/tabla_notasxbimestre', array('arrayDataNuevo' => $arrayDataNuevo, 'arrayCabecera' => $arrayCabecera,
                'arrayCompetencias' => $arrayCompetencias, 'arrayIdsCabecera' => $arrayIdsCabecera,
                'datoscurso' => $DatosCursoasignado, 'idbimestre' => $idbimistre));
        } else {
            echo '<h3>No hay alumnos matriculados en este curso</h3>';
        }
    }

    private function reporte_excel_notasxbimestrexcurso($arrayDataNuevo, $arrayCabecera, $arrayCompetencias, $idbimistre) {

        Yii::import('ext.phpexcel.XPHPExcel');
        $objPHPExcel = XPHPExcel::createPHPExcel();

        $objPHPExcel->getProperties()->setCreator("ENGELS")
                ->setLastModifiedBy("ENGELS")
                ->setTitle("REPORTE NOTAS X CURSO")
                ->setSubject("coming soom")
                ->setDescription("Test document for YiiExcel, generated using PHP classes.")
                ->setKeywords("office PHPExcel php YiiExcel UPNFM")
                ->setCategory("Test result file");

        $objPHPExcel->setActiveSheetIndex(0);



        //COLORES FUENTES

        $negro = '000000';
        $blanco = 'FFFFFF';
        $rojo = 'FF0000';
        $azul = '0000FF';

        // INICIO CABECERA
        $colini = 65;
        $filini = 1;

        $objPHPExcelSheet = $objPHPExcel->getActiveSheet();

        $objPHPExcelSheet->setCellValue(chr($colini) . ($filini), 'AREA: ');
        $this->cellColorMejor(chr($colini) . ($filini) . ':' . chr($colini + 1) . ($filini + 1), $blanco, $negro, 10, true, 'i', $objPHPExcel);

        $objPHPExcelSheet->setCellValue(chr($colini) . ($filini + 2), 'NIVEL:');
        $this->cellColorMejor(chr($colini) . ($filini + 2) . ':' . chr($colini + 1) . ($filini + 3), $blanco, $negro, 10, true, 'i', $objPHPExcel);

        $objPHPExcelSheet->setCellValue(chr($colini) . ($filini + 4), 'CURSO:');
        $this->cellColorMejor(chr($colini) . ($filini + 4) . ':' . chr($colini + 1) . ($filini + 5), $blanco, $negro, 10, true, 'i', $objPHPExcel);

        $objPHPExcelSheet->setCellValue(chr($colini) . ($filini + 6), 'GRADO:');
        $this->cellColorMejor(chr($colini) . ($filini + 6) . ':' . chr($colini + 1) . ($filini + 7), $blanco, $negro, 10, true, 'i', $objPHPExcel);

        $objPHPExcelSheet->setCellValue(chr($colini) . ($filini + 8), 'Nº');
        $this->cellColorMejor(chr($colini) . ($filini + 8) . ':' . chr($colini) . ($filini + 9), $blanco, $negro, 10, true, 'i', $objPHPExcel);

        $objPHPExcelSheet->setCellValue(chr($colini + 1) . ($filini + 8), 'ALUMNO');
        $this->cellColorMejor(chr($colini + 1) . ($filini + 8) . ':' . chr($colini + 1) . ($filini + 9), $blanco, $negro, 10, true, 'i', $objPHPExcel);

        $this->setAnchoColumna(chr($colini), 5, $objPHPExcel); //  PARA LA ENUMERACION
        $this->setAnchoColumna(chr($colini + 1), 50, $objPHPExcel); // para la columna de los nombes
        ////////////////////////////////////////////////

        $coldes = $colini + 2;
        $fildes = $filini + 1;

        foreach ($arrayCompetencias as $key => $value) {

            $objPHPExcelSheet->setCellValue(chr($coldes) . ($fildes), $key);
            $this->cellColorMejor(chr($coldes) . ($fildes) . ':' . chr($coldes + $value - 1) . ($fildes + 1), $blanco, $negro, 10, true, 'c', $objPHPExcel);
            $coldes+=$value;
            $objPHPExcelSheet->setCellValue(chr($coldes) . ($fildes), 'PROMEDIO');
            $this->cellColorMejor(chr($coldes) . ($fildes) . ':' . chr($coldes) . ($fildes + 8), $blanco, $negro, 10, true, 'v', $objPHPExcel);
            $objPHPExcelSheet->getStyle(chr($coldes) . ($fildes) . ':' . chr($coldes) . ($fildes + 8))->getAlignment()->setTextRotation(90);
            $coldes++;
        }

        $objPHPExcelSheet->setCellValue(chr($coldes) . ($fildes), 'PROMEDIO BIMESTRAL');
        $this->cellColorMejor(chr($coldes) . ($fildes) . ':' . chr($coldes) . ($fildes + 8), $blanco, $negro, 10, true, 'c', $objPHPExcel);
        $this->cellColorMejor(chr($coldes) . ($fildes) . ':' . chr($coldes) . ($fildes + 8), $blanco, $negro, 10, true, 'v', $objPHPExcel);
        $objPHPExcelSheet->getStyle(chr($coldes) . ($fildes) . ':' . chr($coldes) . ($fildes + 8))->getAlignment()->setTextRotation(90);


        $coldes = $colini + 2;
        $fildes = $filini + 3;

        foreach ($arrayCabecera as $value) {
            if ($value !== 'AN' && $value !== 'id') {
                if ($value == 'P') {
                    $coldes++;
                } else {
                    $objPHPExcelSheet->setCellValue(chr($coldes) . ($fildes), $value);
                    $this->cellColorMejor(chr($coldes) . ($fildes) . ':' . chr($coldes) . ($fildes + 6), $blanco, $negro, 10, true, 'c', $objPHPExcel);
                    $objPHPExcelSheet->getStyle(chr($coldes) . ($fildes) . ':' . chr($coldes) . ($fildes + 6))->getAlignment()->setTextRotation(90);
                    $coldes++;
                }
            }
        }


        $coldes = $colini;
        $fildes = $filini + 10;

        $nfilas = count($arrayDataNuevo);
        $ncolumnas = count($arrayDataNuevo[0]);

        for ($idfila = 0; $idfila < $nfilas; $idfila++) {

            $objPHPExcelSheet->setCellValue(chr($coldes) . ($fildes + $idfila), ($idfila + 1));
            $this->cellColorMejor(chr($coldes) . ($fildes + $idfila), $blanco, $negro, 10, true, 'i', $objPHPExcel);

            for ($idcolu = 1; $idcolu < $ncolumnas; $idcolu++) {

                $estilo = $negro;
                if ($arrayDataNuevo[$idfila][$idcolu] <= 10 && $idcolu !== 1) {
                    $estilo = $rojo;
                } else if ($arrayDataNuevo[$idfila][$idcolu] <= 20 && $idcolu !== 1) {
                    $estilo = $azul;
                }

                $objPHPExcelSheet->setCellValue(chr($coldes + $idcolu) . ($fildes + $idfila), $arrayDataNuevo[$idfila][$idcolu]);
                $this->cellColorMejor(chr($coldes + $idcolu) . ($fildes + $idfila), $blanco, $estilo, 10, true, 'c', $objPHPExcel);
            }
        }

   
        // Rename worksheet
        $objPHPExcel->getActiveSheet()->setTitle('REPORTE DE NOTAS');

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $objPHPExcel->setActiveSheetIndex(0);

//        // Save a xls file
        $filename = "Reporte Notas: " + $idbimistre;
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '.xls"');
        header('Cache-Control: max-age=0');
        header("Expires: 0");

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');

        $objWriter->save('php://output');

        unset($this->objWriter);
        unset($this->objWorksheet);
        unset($this->objReader);
        unset($this->objPHPExcel);
        exit();
        return;
    }

    private function cellColorMejor($cells, $colorfondo, $colorletra, $tamletra, $bold, $alineacion, $obj) {

        if (strlen($cells) > 3) {
            $obj->getActiveSheet()
                    ->mergeCells($cells);
        }

        $this->cellColor($cells, $colorfondo, $colorletra, $tamletra, $bold, $alineacion, $obj);
        $obj->getActiveSheet()
                ->getStyle($cells)->getAlignment()->setWrapText(true);
    }

    ///////////////////////////////////////////////////
    //  FIN  FIN  VERIFICA INGRESO DE NOTAS POR PARTE DE LO DOCENTES
    ///////////////////////////////////////////////////
    //////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////
    //EFECTIVIFAF ACADEMICA
    //////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////

    public function actionCargarNotasBimestrePuesto() {

        $filial = $_SESSION['idfilial'];
        $idanio = $_SESSION['anio'];
        $nivel = $_POST['nivel'];
        $grado = $_POST['grado'];
        $seccion = $_POST['seccion'];
        $bimestre = $_POST['bimestre'];

        $cmdactualizaea = "CALL actualiza_efectividad_academica (" . $idanio . "," . $filial . ",'" . $nivel . "','" . $grado . "'," . $seccion .
                "," . $bimestre . ");";
        Yii::app()->db->createCommand($cmdactualizaea)->execute(); //$command->execute();


        $mostrar = "CALL Call_bimestre_puesto(" . $idanio . "," . $filial . ",'" . $nivel . "','" . $grado . "'," . $seccion . "," . $bimestre . ");";
        $seleccion = Yii::app()->db->createCommand($mostrar)->queryAll();



        $this->renderPartial('reportes/reporteBimestreNotasPuesto', array('arrayDataNuevo' => $seleccion));
    }

    ///////////////////////////////////////////////////
    //FIN  MUESTRA REPORTE BIMESTRAL X ALUMNO
    ///////////////////////////////////////////////////
    //////////TUTOR NEW
    ///////////

    public function actionComportamiento() {
        $this->renderPartial('comportamiento');
    }

    public function actionCargarAlumnoComportamiento() {

        $idanio = $_SESSION['anio'];
        $nivel = $_POST['nivel'];
        $bimestre = $_POST['bimestre'];
        $grado = $_POST['grado'];
        $idfilial = $_SESSION['idfilial'];
        $idseccion = $_POST['seccion'];

        $cmdCargaAlumnosMatriculadosComportamiento = " CALL listar_alumno_comportamiento('" . $nivel . "','" . $grado . "'," . $idseccion .
                "," . $idanio . "," . $idfilial . "," . $bimestre . ");";
        $dataea = Yii::app()->db->createCommand($cmdCargaAlumnosMatriculadosComportamiento)->queryAll();

        $this->renderPartial('reportes/reporteComportamientoAlumno', array('arrayDataNuevo' => $dataea));
    }

    public function actionGuardarAlumnoComportamiento() {

        $comportamiento = $_POST['comportamiento'];
        $codMatricula = $_POST['codMatricula'];
        $bimestre = $_POST['bimestre'];

        $command = Yii::app()->db->createCommand();
        $command->update('efectividad_academica', array(
            'comportamiento' => $comportamiento), 'codigoMatricula=:codigoMatricula and idbimestre=:idbimestre', array(':codigoMatricula' => $codMatricula, ':idbimestre' => $bimestre));
    }

}
