<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'cotizacion-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'COT_buenaPro',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'IDREQUERIMIENTO',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
