<?php
/* @var $this AsientoContableController */
/* @var $model AsientoContable */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'asiento-contable-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'CODIGOCONTABLE'); ?>
		<?php echo $form->textField($model,'CODIGOCONTABLE',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'CODIGOCONTABLE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ACO_descripcion'); ?>
		<?php echo $form->textField($model,'ACO_descripcion',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'ACO_descripcion'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->