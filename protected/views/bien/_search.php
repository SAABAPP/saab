<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'type'=>'vertical'
)); ?>

	<div class="span8 input-append">
		<?php echo $form->textFieldRow($model,'nombre_bien',
			array(
				'class'=>'span4',
				'placeholder' => 'Nombre de Bien',
				'labelOptions' => array('label' => false),
				'autocomplete'=>'off',
			)
		); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',			
			'icon'=>'icon-search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>