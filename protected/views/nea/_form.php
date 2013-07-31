<?php
/* @var $this NeaController */
/* @var $model Nea */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'nea-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'NEA_referencia'); ?>
		<?php echo $form->textField($model,'NEA_referencia',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'NEA_referencia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NEA_procedencia'); ?>
		<?php echo $form->textField($model,'NEA_procedencia',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'NEA_procedencia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'IDENTRADA'); ?>
		<?php echo $form->textField($model,'IDENTRADA'); ?>
		<?php echo $form->error($model,'IDENTRADA'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->