<?php
/* @var $this EntradaController */
/* @var $model Entrada */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'IDENTRADA'); ?>
		<?php echo $form->textField($model,'IDENTRADA'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ENT_fecha'); ?>
		<?php echo $form->textField($model,'ENT_fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ENT_tipo'); ?>
		<?php echo $form->textField($model,'ENT_tipo',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->