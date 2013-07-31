<?php
/* @var $this MetaController */
/* @var $model Meta */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'meta-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'CODMETA'); ?>
		<?php echo $form->textField($model,'CODMETA',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'CODMETA'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'MET_descripcion'); ?>
		<?php echo $form->textField($model,'MET_descripcion',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'MET_descripcion'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->