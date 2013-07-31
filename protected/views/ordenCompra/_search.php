<?php
/* @var $this OrdenCompraController */
/* @var $model OrdenCompra */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'IDORDENCOMPRA'); ?>
		<?php echo $form->textField($model,'IDORDENCOMPRA'); ?>
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