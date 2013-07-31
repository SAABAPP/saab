<?php
/* @var $this PecosaController */
/* @var $model Pecosa */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'IDPECOSA'); ?>
		<?php echo $form->textField($model,'IDPECOSA'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PEC_fecha'); ?>
		<?php echo $form->textField($model,'PEC_fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PEC_referencia'); ?>
		<?php echo $form->textField($model,'PEC_referencia',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IDUSUARIO'); ?>
		<?php echo $form->textField($model,'IDUSUARIO'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IDREQUERIMIENTO'); ?>
		<?php echo $form->textField($model,'IDREQUERIMIENTO'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->