<?php
/* @var $this KardexController */
/* @var $model Kardex */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'kardex-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'KAR_fechaMovimiento'); ?>
		<?php echo $form->textField($model,'KAR_fechaMovimiento'); ?>
		<?php echo $form->error($model,'KAR_fechaMovimiento'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'KAR_detalle'); ?>
		<?php echo $form->textField($model,'KAR_detalle',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'KAR_detalle'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'IDENTRADABIEN'); ?>
		<?php echo $form->textField($model,'IDENTRADABIEN'); ?>
		<?php echo $form->error($model,'IDENTRADABIEN'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'IDENTRADA'); ?>
		<?php echo $form->textField($model,'IDENTRADA'); ?>
		<?php echo $form->error($model,'IDENTRADA'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'IDPECOSABIEN'); ?>
		<?php echo $form->textField($model,'IDPECOSABIEN'); ?>
		<?php echo $form->error($model,'IDPECOSABIEN'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'IDPECOSA'); ?>
		<?php echo $form->textField($model,'IDPECOSA'); ?>
		<?php echo $form->error($model,'IDPECOSA'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->