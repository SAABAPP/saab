<?php
/* @var $this VariablesController */
/* @var $model Variables */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'variables-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'VAR_descripcion'); ?>
		<?php echo $form->textField($model,'VAR_descripcion',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'VAR_descripcion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'VAR_valor'); ?>
		<?php echo $form->textField($model,'VAR_valor',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'VAR_valor'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->