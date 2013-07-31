<?php
/* @var $this PersonalController */
/* @var $model Personal */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'IDPERSONAL'); ?>
		<?php echo $form->textField($model,'IDPERSONAL'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PER_idResponsable'); ?>
		<?php echo $form->textField($model,'PER_idResponsable'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PER_dni'); ?>
		<?php echo $form->textField($model,'PER_dni',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PER_nombres'); ?>
		<?php echo $form->textField($model,'PER_nombres',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PER_paterno'); ?>
		<?php echo $form->textField($model,'PER_paterno',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PER_materno'); ?>
		<?php echo $form->textField($model,'PER_materno',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PER_sexo'); ?>
		<?php echo $form->textField($model,'PER_sexo',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PER_direccion'); ?>
		<?php echo $form->textField($model,'PER_direccion',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PER_telefono'); ?>
		<?php echo $form->textField($model,'PER_telefono',array('size'=>12,'maxlength'=>12)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PER_celular'); ?>
		<?php echo $form->textField($model,'PER_celular',array('size'=>12,'maxlength'=>12)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PER_cargo'); ?>
		<?php echo $form->textField($model,'PER_cargo',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PER_estado'); ?>
		<?php echo $form->textField($model,'PER_estado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IDAREA'); ?>
		<?php echo $form->textField($model,'IDAREA'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->