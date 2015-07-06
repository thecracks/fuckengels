<?php
/* @var $this PersonaController */
/* @var $model Persona */

$this->breadcrumbs=array(
	'Alumnos'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Lista de  Alumnos', 'url'=>array('index')),
	array('label'=>'Administrar Alumnos', 'url'=>array('admin')),
);
?>

<h1>Create Persona</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>