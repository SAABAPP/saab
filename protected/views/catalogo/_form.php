<?php
/* @var $this CatalogoController */
/* @var $model Catalogo */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'catalogo-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'CAT_descripcion'); ?>
		<?php echo $form->textField($model,'CAT_descripcion',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'CAT_descripcion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CAT_codigo'); ?>
		<?php echo $form->textField($model,'CAT_codigo',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'CAT_codigo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CAT_unidad'); ?>
		<?php echo $form->textField($model,'CAT_unidad',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'CAT_unidad'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->