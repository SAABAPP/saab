<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'type'=>'vertical'
)); ?>

<<<<<<< HEAD
<<<<<<< HEAD
	<h3>Busqueda Proveedor</h3><br>

	<?php echo $form->textFieldRow($model,'PRO_razonSocial',array('class'=>'span5','maxlength'=>150)); ?>

	<?php echo $form->textFieldRow($model,'PRO_ruc',array('class'=>'span5','maxlength'=>11)); ?>

	

	<div class="form-actions">
=======
=======
>>>>>>> origin/saabCesar
	<div class="span8 input-append">
		<?php echo $form->textFieldRow($model,'IDPROVEEDOR',
			array(
				'class'=>'span4',
				'placeholder' => 'N° de Proveedor',
				'labelOptions' => array('label' => false),
				'autocomplete'=>'off',
			)
		); ?>
<<<<<<< HEAD
>>>>>>> origin/saabCesar
=======
>>>>>>> origin/saabCesar
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',			
			'icon'=>'icon-search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
