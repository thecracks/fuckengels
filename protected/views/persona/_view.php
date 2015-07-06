<?php
/* @var $this PersonaController */
/* @var $data Persona */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idpersona')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idpersona), array('Vista', 'id'=>$data->idpersona)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Nombre')); ?>:</b>
	<?php echo CHtml::encode($data->Nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ApellidoPaterno')); ?>:</b>
	<?php echo CHtml::encode($data->ApellidoPaterno); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ApellidoMaterno')); ?>:</b>
	<?php echo CHtml::encode($data->ApellidoMaterno); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DNI')); ?>:</b>
	<?php echo CHtml::encode($data->DNI); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechanacimiento')); ?>:</b>
	<?php echo CHtml::encode($data->fechanacimiento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Pais')); ?>:</b>
	<?php echo CHtml::encode($data->Pais); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('EstadoCivil')); ?>:</b>
	<?php echo CHtml::encode($data->EstadoCivil); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Lengua')); ?>:</b>
	<?php echo CHtml::encode($data->Lengua); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('domicilio')); ?>:</b>
	<?php echo CHtml::encode($data->domicilio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo')); ?>:</b>
	<?php echo CHtml::encode($data->tipo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuario')); ?>:</b>
	<?php echo CHtml::encode($data->usuario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contra')); ?>:</b>
	<?php echo CHtml::encode($data->contra); ?>
	<br />

	*/ ?>

</div>