<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'usuario-form',
	'enableAjaxValidation'=>true,
	'enableClientValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	)
)); ?>

	<!-- <p class="help-block">Fields with <span class="required">*</span> are required.</p> -->

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'USU_usuario',array('class'=>'span3','maxlength'=>150,'readonly'=>true)); ?>

	<?php echo $form->passwordFieldRow($model,'USU_password',array('class'=>'span3','maxlength'=>150,'value'=>'')); ?>

	<?php echo $form->passwordFieldRow($model,'USU_password2',array('class'=>'span3','maxlength'=>150,'value'=>'')); ?>

	<?php //echo $form->hiddenField($model,'IDPERSONAL',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'label'=>$model->isNewRecord ? 'Crear' : 'Guardar',
		)); ?>
		<button type="reset" class="btn secundario">Limpiar</button>
	</div>

<?php $this->endWidget(); ?>
