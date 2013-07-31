<?php
/* @var $this VariablesController */
/* @var $model Variables */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'IDVARIABLE'); ?>
		<?php echo $form->textField($model,'IDVARIABLE'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'VAR_descripcion'); ?>
		<?php echo $form->textField($model,'VAR_descripcion',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'VAR_valor'); ?>
		<?php echo $form->textField($model,'VAR_valor',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->