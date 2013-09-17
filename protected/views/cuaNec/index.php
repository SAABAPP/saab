<?php
$this->breadcrumbs=array(
	'Cuadro Necesidades',
);


?>

<br><h2 class="text-center">Cuadro de Necesidades</h2><br>

<div class="row-fluid">
<?php if(Variables::model()->findByPk(5)->VAR_valor=='0'){?>  

	<h4>Autorizar Cuadro de Necesidades</h4><br>
	<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'cua-nec-form',
	'enableAjaxValidation'=>false,
	'type'=>'inline',

)); ?>


	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'CNE_anio',array('class'=>'span3','maxlength'=>4)); ?>

	
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'submit',
			'label'=>$model->isNewRecord ? 'Crear y Autorizar' : 'Guardar',
	)); ?> <a class="span3 btn btn-info btn-large pull-right" href="<?php echo Yii::app()->request->baseUrl; ?>/cuaNec/admin">Mostrar Cuadro Necesidades Actual</a>
	
	

<?php $this->endWidget(); ?>

<?php }
	else{
?>	<div class="offset3">
		<a class="span4 btn btn-secondary btn-large" href="<?php echo Yii::app()->request->baseUrl; ?>/cuaNec/cerrar">Cerrar Cuadro Necesidades Actual</a>&nbsp;&nbsp;<a class="span4 btn btn-info btn-large " href="<?php echo Yii::app()->request->baseUrl; ?>/cuaNec/admin">Mostrar Cuadro Necesidades Actual</a>
	</div>
<br><br>
<?php }?>  
</div>





