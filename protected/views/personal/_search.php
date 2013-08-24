<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'IDPERSONAL',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'PER_idResponsable',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'PER_dni',array('class'=>'span5','maxlength'=>8)); ?>

	<?php echo $form->textFieldRow($model,'PER_nombres',array('class'=>'span5','maxlength'=>150)); ?>

	<?php echo $form->textFieldRow($model,'PER_paterno',array('class'=>'span5','maxlength'=>150)); ?>

	<?php echo $form->textFieldRow($model,'PER_materno',array('class'=>'span5','maxlength'=>150)); ?>

	<?php echo $form->textFieldRow($model,'PER_sexo',array('class'=>'span5','maxlength'=>1)); ?>

	<?php echo $form->textFieldRow($model,'PER_direccion',array('class'=>'span5','maxlength'=>150)); ?>

	<?php echo $form->textFieldRow($model,'PER_telefono',array('class'=>'span5','maxlength'=>12)); ?>

	<?php echo $form->textFieldRow($model,'PER_celular',array('class'=>'span5','maxlength'=>12)); ?>

	<?php echo $form->textFieldRow($model,'PER_cargo',array('class'=>'span5','maxlength'=>60)); ?>

	<?php echo $form->textFieldRow($model,'PER_estado',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'IDAREA',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
