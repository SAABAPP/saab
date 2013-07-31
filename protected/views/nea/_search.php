<?php
/* @var $this NeaController */
/* @var $model Nea */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'NEA_referencia'); ?>
		<?php echo $form->textField($model,'NEA_referencia',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NEA_procedencia'); ?>
		<?php echo $form->textField($model,'NEA_procedencia',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IDENTRADA'); ?>
		<?php echo $form->textField($model,'IDENTRADA'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->