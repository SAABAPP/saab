<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'IDSERVICIO',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'SER_descripcion',array('class'=>'span5','maxlength'=>150)); ?>

	<?php echo $form->textFieldRow($model,'IDCATALOGO',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
