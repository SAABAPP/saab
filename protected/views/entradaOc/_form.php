<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'entrada-oc-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'IDENTRADA',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'IDORDENCOMPRA',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'EOC_documento',array('class'=>'span5','maxlength'=>50)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
