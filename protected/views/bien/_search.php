<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'IDBIEN',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'BIE_stockActual',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'BIE_stockMinimo',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'BIE_caracteristica',array('class'=>'span5','maxlength'=>150)); ?>

	<?php echo $form->textFieldRow($model,'BIE_marca',array('class'=>'span5','maxlength'=>150)); ?>

	<?php echo $form->textFieldRow($model,'IDCATALOGO',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
