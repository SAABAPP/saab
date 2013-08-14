<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'usuario-form',
	'enableAjaxValidation'=>false,
)); ?>

	<!-- <p class="help-block">Fields with <span class="required">*</span> are required.</p> -->

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'USU_usuario',array('class'=>'span3','maxlength'=>150,'readonly'=>true)); ?>

	<?php echo $form->passwordFieldRow($model,'USU_password',array('class'=>'span3','maxlength'=>150)); ?>

	<p class="text-info">Repetir contraseña.</p>

	<?php echo $form->passwordFieldRow($model,'USU_password',array('class'=>'span3','maxlength'=>150)); ?>

	<?php //echo $form->hiddenField($model,'IDPERSONAL',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Guardar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
