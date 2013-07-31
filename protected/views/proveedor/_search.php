<?php
/* @var $this ProveedorController */
/* @var $model Proveedor */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'IDPROVEEDOR'); ?>
		<?php echo $form->textField($model,'IDPROVEEDOR'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PRO_razonSocial'); ?>
		<?php echo $form->textField($model,'PRO_razonSocial',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PRO_ruc'); ?>
		<?php echo $form->textField($model,'PRO_ruc',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PRO_rubro'); ?>
		<?php echo $form->textField($model,'PRO_rubro',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PRO_ciudad'); ?>
		<?php echo $form->textField($model,'PRO_ciudad',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PRO_telefono'); ?>
		<?php echo $form->textField($model,'PRO_telefono',array('size'=>12,'maxlength'=>12)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PRO_fax'); ?>
		<?php echo $form->textField($model,'PRO_fax',array('size'=>12,'maxlength'=>12)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PRO_direccion'); ?>
		<?php echo $form->textField($model,'PRO_direccion',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PRO_banco'); ?>
		<?php echo $form->textField($model,'PRO_banco',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PRO_cci'); ?>
		<?php echo $form->textField($model,'PRO_cci',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PRO_contacto'); ?>
		<?php echo $form->textField($model,'PRO_contacto',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PRO_celular'); ?>
		<?php echo $form->textField($model,'PRO_celular',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->