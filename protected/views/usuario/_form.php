<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'usuario-form',
	'enableAjaxValidation'=>false,
)); ?>



	<?php echo $form->errorSummary($model); ?>
	<?php echo $form->textFieldRow($model,'USU_usuario',array('class'=>'span3','maxlength'=>150,'readonly'=>true)); ?>

	<?php echo $form->passwordFieldRow($model,'USU_password',array('class'=>'span3','maxlength'=>150,'value'=>'')); ?>

	<?php echo $form->passwordFieldRow($model,'USU_password2',array('class'=>'span3','maxlength'=>150,'value'=>'')); ?>



	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Crear' : 'Guardar',
		)); ?>
		<button type="reset" class="btn secundario">Limpiar</button>
	</div>

<?php $this->endWidget(); ?>
