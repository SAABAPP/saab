<?php
/* @var $this PecosaController */
/* @var $model Pecosa */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pecosa-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'PEC_fecha'); ?>
		<?php echo $form->textField($model,'PEC_fecha'); ?>
		<?php echo $form->error($model,'PEC_fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PEC_referencia'); ?>
		<?php echo $form->textField($model,'PEC_referencia',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'PEC_referencia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'IDUSUARIO'); ?>
		<?php echo $form->textField($model,'IDUSUARIO'); ?>
		<?php echo $form->error($model,'IDUSUARIO'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'IDREQUERIMIENTO'); ?>
		<?php echo $form->textField($model,'IDREQUERIMIENTO'); ?>
		<?php echo $form->error($model,'IDREQUERIMIENTO'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->