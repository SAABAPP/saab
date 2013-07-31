<?php
/* @var $this EntradaOcController */
/* @var $model EntradaOc */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'entrada-oc-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'IDENTRADA'); ?>
		<?php echo $form->textField($model,'IDENTRADA'); ?>
		<?php echo $form->error($model,'IDENTRADA'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'IDORDENCOMPRA'); ?>
		<?php echo $form->textField($model,'IDORDENCOMPRA'); ?>
		<?php echo $form->error($model,'IDORDENCOMPRA'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->