<?php
/* @var $this BienController */
/* @var $model Bien */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'bien-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'BIE_stockActual'); ?>
		<?php echo $form->textField($model,'BIE_stockActual'); ?>
		<?php echo $form->error($model,'BIE_stockActual'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'BIE_stockMinimo'); ?>
		<?php echo $form->textField($model,'BIE_stockMinimo'); ?>
		<?php echo $form->error($model,'BIE_stockMinimo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'BIE_caracteristica'); ?>
		<?php echo $form->textField($model,'BIE_caracteristica',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'BIE_caracteristica'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'BIE_marca'); ?>
		<?php echo $form->textField($model,'BIE_marca',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'BIE_marca'); ?>
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