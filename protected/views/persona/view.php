<?php
/* @var $this PersonaController */
/* @var $model Persona */

$this->breadcrumbs=array(
	'Personas'=>array('index'),
	$model->idpersona,
);

$this->menu=array(
	array('label'=>'Lista de Alumnos', 'url'=>array('index')),
	array('label'=>'Crear Alumnos', 'url'=>array('create')),
	array('label'=>'Actualizar Alumnos', 'url'=>array('update', 'id'=>$model->idpersona)),
	array('label'=>'Eliminar Alumnos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idpersona),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Alumnos', 'url'=>array('admin')),
);
?>

<h1>Ver Alumno #<?php echo $model->idpersona; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idpersona',
		'Nombre',
		'ApellidoPaterno',
		'ApellidoMaterno',
		'DNI',
		'fechanacimiento',
		'Pais',
		'EstadoCivil',
		'Lengua',
		'domicilio',
		'tipo',
		'usuario',
		'contra',
	),
)); ?>
