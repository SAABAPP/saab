<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'IDREQUERIMIENTO',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'REQ_estado',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'REQ_fecha',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'REQ_presupuesto',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'IDUSUARIO',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'CODMETA',array('class'=>'span5','maxlength'=>4)); ?>

	<?php echo $form->textFieldRow($model,'IDCUANEC',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
