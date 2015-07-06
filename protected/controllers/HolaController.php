<?php
/**
 * 
 */
#http://localhost:50/PROYECTOS%20EN%20APTANA/GestionAcademicaYii/GestionAcademica/hola/index
class HolaController extends Controller {
	
	public function actionIndex() {
	    $model=CActiveRecord::model("Users")->findAll();
	    $twitter="@codigofacil";
		$this->render("index",array("model"=>$model, "twitter"=>$twitter));
	}
}

?>