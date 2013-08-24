<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'pecosa-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'PEC_fecha',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'PEC_referencia',array('class'=>'span5','maxlength'=>150)); ?>

	<?php echo $form->textFieldRow($model,'IDUSUARIO',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'IDREQUERIMIENTO',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
