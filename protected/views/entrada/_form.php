<?php
/* @var $this EntradaController */
/* @var $model Entrada */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'entrada-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'ENT_fecha'); ?>
		<?php echo $form->textField($model,'ENT_fecha'); ?>
		<?php echo $form->error($model,'ENT_fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ENT_tipo'); ?>
		<?php echo $form->textField($model,'ENT_tipo',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'ENT_tipo'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->