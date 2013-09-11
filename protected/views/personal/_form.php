<?php
/* @var $this PersonalController */
/* @var $model Personal */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'personal-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'PER_idResponsable'); ?>
		<?php echo $form->textField($model,'PER_idResponsable'); ?>
		<?php echo $form->error($model,'PER_idResponsable'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PER_dni'); ?>
		<?php echo $form->textField($model,'PER_dni',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'PER_dni'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PER_nombres'); ?>
		<?php echo $form->textField($model,'PER_nombres',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'PER_nombres'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PER_paterno'); ?>
		<?php echo $form->textField($model,'PER_paterno',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'PER_paterno'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PER_materno'); ?>
		<?php echo $form->textField($model,'PER_materno',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'PER_materno'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PER_sexo'); ?>
		<?php echo $form->textField($model,'PER_sexo',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'PER_sexo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PER_direccion'); ?>
		<?php echo $form->textField($model,'PER_direccion',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'PER_direccion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PER_telefono'); ?>
		<?php echo $form->textField($model,'PER_telefono',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'PER_telefono'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PER_celular'); ?>
		<?php echo $form->textField($model,'PER_celular',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'PER_celular'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PER_cargo'); ?>
		<?php echo $form->textField($model,'PER_cargo',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'PER_cargo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PER_estado'); ?>
		<?php echo $form->textField($model,'PER_estado'); ?>
		<?php echo $form->error($model,'PER_estado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'IDAREA'); ?>
		<?php echo $form->textField($model,'IDAREA'); ?>
		<?php echo $form->error($model,'IDAREA'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->