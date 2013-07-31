<?php
/* @var $this ServicioController */
/* @var $model Servicio */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'servicio-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'SER_descripcion'); ?>
		<?php echo $form->textField($model,'SER_descripcion',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'SER_descripcion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'IDCATALOGO'); ?>
		<?php echo $form->textField($model,'IDCATALOGO'); ?>
		<?php echo $form->error($model,'IDCATALOGO'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->