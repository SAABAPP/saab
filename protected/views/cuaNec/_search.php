<?php
/* @var $this CuaNecController */
/* @var $model CuaNec */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'IDCUANEC'); ?>
		<?php echo $form->textField($model,'IDCUANEC'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CNE_anio'); ?>
		<?php echo $form->textField($model,'CNE_anio',array('size'=>4,'maxlength'=>4)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->