<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'IDUSUARIO'); ?>
		<?php echo $form->textField($model,'IDUSUARIO'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'USU_usuario'); ?>
		<?php echo $form->textField($model,'USU_usuario',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IDPERSONAL'); ?>
		<?php echo $form->textField($model,'IDPERSONAL'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->