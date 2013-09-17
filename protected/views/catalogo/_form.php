<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'catalogo-form',
	'enableAjaxValidation'=>false,
)); 
// Yii::app()->setGlobalState('CAT_codigo', '3');
$id=Yii::app()->user->getState('CAT_codigo');

?>



	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'CAT_codigo',array('class'=>'span5','maxlength'=>20,'value'=>'000000000000'.$id)); ?>

	<?php echo $form->textFieldRow($model,'CAT_descripcion',array('class'=>'span5','maxlength'=>150)); ?>

	<?php echo $form->textFieldRow($model,'CAT_unidad',array('class'=>'span5','maxlength'=>25)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Nuevo' : 'Guardar',
		)); ?>
	</div>

<?php 
++$id;
Yii::app()->user->setState('CAT_codigo', $id);

$this->endWidget(); ?>
