<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<h3>Busqueda Proveedor</h3><br>

	<?php echo $form->textFieldRow($model,'PRO_razonSocial',array('class'=>'span5','maxlength'=>150)); ?>

	<?php echo $form->textFieldRow($model,'PRO_ruc',array('class'=>'span5','maxlength'=>11)); ?>

	

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Buscar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
