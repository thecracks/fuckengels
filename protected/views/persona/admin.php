<?php
/* @var $this PersonaController */
/* @var $model Persona */

$this->breadcrumbs=array(
	'Alumnos'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Lista de Alumnos', 'url'=>array('index')),
	array('label'=>'Registrar Alumnos', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#persona-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Personas</h1>

<p>
Si gusta podria usar operadores como (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
o <b>=</b>)en el inicio de cada busqueda para especificar la manera en que se van a hacer las comparaciones.
</p>

<?php echo CHtml::link('Busqueda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'persona-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idpersona',
		'Nombre',
		'ApellidoPaterno',
		'ApellidoMaterno',
		'DNI',
		'fechanacimiento',
		/*
		'Pais',
		'EstadoCivil',
		'Lengua',
		'domicilio',
		'tipo',
		'usuario',
		'contra',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
