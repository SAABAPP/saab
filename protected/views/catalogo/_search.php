<?php
/* @var $this CatalogoController */
/* @var $model Catalogo */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'IDCATALOGO'); ?>
		<?php echo $form->textField($model,'IDCATALOGO'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CAT_descripcion'); ?>
		<?php echo $form->textField($model,'CAT_descripcion',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CAT_codigo'); ?>
		<?php echo $form->textField($model,'CAT_codigo',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CAT_unidad'); ?>
		<?php echo $form->textField($model,'CAT_unidad',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->