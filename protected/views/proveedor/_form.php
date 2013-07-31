<?php
/* @var $this ProveedorController */
/* @var $model Proveedor */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'proveedor-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'PRO_razonSocial'); ?>
		<?php echo $form->textField($model,'PRO_razonSocial',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'PRO_razonSocial'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PRO_ruc'); ?>
		<?php echo $form->textField($model,'PRO_ruc',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'PRO_ruc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PRO_rubro'); ?>
		<?php echo $form->textField($model,'PRO_rubro',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'PRO_rubro'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PRO_ciudad'); ?>
		<?php echo $form->textField($model,'PRO_ciudad',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'PRO_ciudad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PRO_telefono'); ?>
		<?php echo $form->textField($model,'PRO_telefono',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'PRO_telefono'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PRO_fax'); ?>
		<?php echo $form->textField($model,'PRO_fax',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'PRO_fax'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PRO_direccion'); ?>
		<?php echo $form->textField($model,'PRO_direccion',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'PRO_direccion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PRO_banco'); ?>
		<?php echo $form->textField($model,'PRO_banco',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'PRO_banco'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PRO_cci'); ?>
		<?php echo $form->textField($model,'PRO_cci',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'PRO_cci'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PRO_contacto'); ?>
		<?php echo $form->textField($model,'PRO_contacto',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'PRO_contacto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PRO_celular'); ?>
		<?php echo $form->textField($model,'PRO_celular',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'PRO_celular'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->