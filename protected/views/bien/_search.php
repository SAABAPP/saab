<?php
/* @var $this BienController */
/* @var $model Bien */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'IDBIEN'); ?>
		<?php echo $form->textField($model,'IDBIEN'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'BIE_stockActual'); ?>
		<?php echo $form->textField($model,'BIE_stockActual'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'BIE_stockMinimo'); ?>
		<?php echo $form->textField($model,'BIE_stockMinimo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'BIE_caracteristica'); ?>
		<?php echo $form->textField($model,'BIE_caracteristica',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'BIE_marca'); ?>
		<?php echo $form->textField($model,'BIE_marca',array('size'=>60,'maxlength'=>150)); ?>
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