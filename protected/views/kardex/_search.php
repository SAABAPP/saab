<?php
/* @var $this KardexController */
/* @var $model Kardex */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'IDKARDEX'); ?>
		<?php echo $form->textField($model,'IDKARDEX'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'KAR_fechaMovimiento'); ?>
		<?php echo $form->textField($model,'KAR_fechaMovimiento'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'KAR_detalle'); ?>
		<?php echo $form->textField($model,'KAR_detalle',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IDENTRADABIEN'); ?>
		<?php echo $form->textField($model,'IDENTRADABIEN'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IDENTRADA'); ?>
		<?php echo $form->textField($model,'IDENTRADA'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IDPECOSABIEN'); ?>
		<?php echo $form->textField($model,'IDPECOSABIEN'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IDPECOSA'); ?>
		<?php echo $form->textField($model,'IDPECOSA'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->