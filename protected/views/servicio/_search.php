<?php
/* @var $this ServicioController */
/* @var $model Servicio */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'IDSERVICIO'); ?>
		<?php echo $form->textField($model,'IDSERVICIO'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'SER_descripcion'); ?>
		<?php echo $form->textField($model,'SER_descripcion',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IDCATALOGO'); ?>
		<?php echo $form->textField($model,'IDCATALOGO'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->