<?php
/* @var $this PersonaController */
/* @var $model Persona */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'persona-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<!--<p class="note">Fields with <span class="required">*</span> are required.</p>-->

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Nombre'); ?>
		<?php echo $form->textField($model,'Nombre',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'Nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ApellidoPaterno'); ?>
		<?php echo $form->textField($model,'ApellidoPaterno',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'ApellidoPaterno'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ApellidoMaterno'); ?>
		<?php echo $form->textField($model,'ApellidoMaterno',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'ApellidoMaterno'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DNI'); ?>
		<?php echo $form->textField($model,'DNI',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'DNI'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechanacimiento'); ?>
		<?php echo $form->textField($model,'fechanacimiento'); ?>
		<?php echo $form->error($model,'fechanacimiento'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Pais'); ?>
		<?php echo $form->textField($model,'Pais',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'Pais'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'EstadoCivil'); ?>
		<?php echo $form->textField($model,'EstadoCivil',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'EstadoCivil'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Lengua'); ?>
		<?php echo $form->textField($model,'Lengua',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'Lengua'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'domicilio'); ?>
		<?php echo $form->textField($model,'domicilio',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'domicilio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tipo'); ?>
		<?php echo $form->textField($model,'tipo',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'tipo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'usuario'); ?>
		<?php echo $form->textField($model,'usuario',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'usuario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contra'); ?>
		<?php echo $form->textField($model,'contra',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'contra'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->