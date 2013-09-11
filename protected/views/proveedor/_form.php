<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'proveedor-form',
	'enableAjaxValidation'=>false,
)); ?>

	

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'PRO_razonSocial',array('class'=>'span5','maxlength'=>150)); ?>

	<?php echo $form->textFieldRow($model,'PRO_ruc',array('class'=>'span5','maxlength'=>11)); ?>

	<?php echo $form->textFieldRow($model,'PRO_rubro',array('class'=>'span5','maxlength'=>150)); ?>

	<?php echo $form->textFieldRow($model,'PRO_ciudad',array('class'=>'span5','maxlength'=>150)); ?>

	<?php echo $form->textFieldRow($model,'PRO_telefono',array('class'=>'span5','maxlength'=>12)); ?>

	<?php echo $form->textFieldRow($model,'PRO_fax',array('class'=>'span5','maxlength'=>12)); ?>

	<?php echo $form->textFieldRow($model,'PRO_direccion',array('class'=>'span5','maxlength'=>150)); ?>

	<?php echo $form->textFieldRow($model,'PRO_banco',array('class'=>'span5','maxlength'=>150)); ?>

	<?php echo $form->textFieldRow($model,'PRO_cci',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'PRO_contacto',array('class'=>'span5','maxlength'=>150)); ?>

	<?php echo $form->textFieldRow($model,'PRO_celular',array('class'=>'span5','maxlength'=>20)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Nuevo' : 'Guardar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
