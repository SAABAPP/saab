<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'IDKARDEX',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'KAR_fechaMovimiento',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'KAR_detalle',array('class'=>'span5','maxlength'=>150)); ?>

	<?php echo $form->textFieldRow($model,'IDENTRADABIEN',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'IDENTRADA',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'IDPECOSABIEN',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'IDPECOSA',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
