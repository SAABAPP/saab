<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuario-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'USU_usuario'); ?>
		<?php echo $form->textField($model,'USU_usuario',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'USU_usuario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'USU_password'); ?>
		<?php echo $form->textField($model,'USU_password',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'USU_password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'IDPERSONAL'); ?>
		<?php echo $form->textField($model,'IDPERSONAL'); ?>
		<?php echo $form->error($model,'IDPERSONAL'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->