<?php

class PrincipalController extends Controller {

    /**
     * Declares class-based actions.
     *
     *
     */
    public $layout = '//layouts/principal';

    //public $rutaBase= Yii::app()->request->baseUrl;

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

        echo Yii::app()->user->name;
        //echo Yii::app()->user->id;
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $this->render('iniciosesion');
    }

    public function actionRecibe() {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $user = $_POST["raza"];
        $raza = $_POST["sexo"];
        if ($user == 'admin') {
            
        } else {
            
        }

        $this->renderPartial('principal');
    }

    public function actionRecibe2() {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'

        $user = $_POST["username"];
        $pass = $_POST["password"];

        $arrayUsuario = array('username' => $_POST["username"], 'password' => $_POST["password"], 'rememberMe' => '0');



        $model = new LoginForm;

//        echo $_POST["username"] .'        '.$_POST["password"];
        // collect user input data
        // if(isset($_POST['']))
        // {
        /* $model -> attributes = $arrayUsuario;
          // validate user input and redirect to the previous page if valid
          if ($model -> validate() && $model -> login()) {
          if ($user === 'administrador') {
          $this -> redirect(Yii::app() -> user -> returnUrl . 'administrador');
          } else if ($user === 'alumno') {
          $this -> redirect(Yii::app() -> user -> returnUrl . 'alumno');
          } else if ($user === 'docente') {
          $this -> redirect(Yii::app() -> user -> returnUrl . 'docente');
          } else {
          $this -> render('iniciosesion');
          }
          } else {
          $this -> render('iniciosesion');
          } */

        if ($model->validate() && $model->login()) {



            ob_start();

            if (Yii::app()->user->getState('role') === 'administrador') {
                $this->redirect(Yii::app()->request->baseUrl . '/administrador');
            } else if (Yii::app()->user->getState('role') === 'alumno') {
                $this->redirect(Yii::app()->request->baseUrl . '/alumno');
            } else if (Yii::app()->user->getState('role') === 'docente') {
                $this->redirect(Yii::app()->request->baseUrl . '/docente');
            } else {
                $this->render('iniciosesion');
            }
        } else {
            $this->render('iniciosesion');
        }

        // }
        // display the login form
        // $this->render('login',array('model'=>$model));
    }

    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionEnfoque() {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $this->render('enfoque');
    }

    public function actionValores() {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $this->render('valoresInstitucionales');
    }

    public function actionNuestraHistoria() {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $this->render('nuestraHistoria');
    }

    public function actionNuevos() {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $this->render('nuevos');
    }

    public function actionRegulares() {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $this->render('regulares');
    }

    public function actionTraslados() {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $this->render('traslados');
    }

    public function actionSedeporvenir() {
        $this->render('sedePorvenir');
    }

    public function actionSedelaredo() {
        $this->render('sedeLaredo');
    }

    /*
     * Login para acceso a paginaPrincipal de C/Layout
     */

    public function actionAcceso() {

        $user = $_POST["username"];

        $arrayUsuario = array('username' => $_POST["username"], 'password' => $_POST["password"], 'rememberMe' => '0');

        $model = new LoginForm;

        $model->attributes = $arrayUsuario;

        if ($model->validate() && $model->login()) {

            if (Yii::app()->user->getState('role') === 'admin') {
                $_SESSION['layoutrol']='//layouts/administrador2';
                $this->redirect(Yii::app()->request->baseUrl . '/administrador');
            } else if (Yii::app()->user->getState('role') === 'secretaria') {
                $_SESSION['layoutrol']='//layouts/secretaria';
                $this->redirect(Yii::app()->request->baseUrl . '/administrador');
            } else if (Yii::app()->user->getState('role') === 'tutor') {
                 $_SESSION['layoutrol']='//layouts/tutor';
                $this->redirect(Yii::app()->request->baseUrl . '/administrador');
            } else if (Yii::app()->user->getState('role') === 'alumno') {
                $_SESSION['layoutrol']='//layouts/alumno2';
                $this->redirect(Yii::app()->request->baseUrl . '/alumno');
            } else if (Yii::app()->user->getState('role') === 'docente') {
                $_SESSION['layoutrol']='//layouts/docente2';
                $this->redirect(Yii::app()->request->baseUrl . '/docente');
            } else {
                $this->render('iniciosesion');
            }
        } else {
            $this->render('iniciosesion');
        }
    }

    /*
     * Fin Login
     * >

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
        // $model=new LoginForm;
        //
        // // if it is ajax validation request
        // if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
        // {
        // echo CActiveForm::validate($model);
        // Yii::app()->end();
        // }
        //
        // // collect user input data
        // if(isset($_POST['LoginForm']))
        // {
        // $model->attributes=$_POST['LoginForm'];
        // // validate user input and redirect to the previous page if valid
        // if($model->validate() && $model->login())
        // $this->redirect(Yii::app()->user->returnUrl);
        // }
        // // display the login form
        // $this->render('login',array('model'=>$model));
        $this->render('iniciosesion');
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

}
