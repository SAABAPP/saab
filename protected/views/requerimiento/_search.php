<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'type'=>'vertical'
)); ?>

	<div class="span6 input-append">
		<?php echo $form->textFieldRow($model,'IDREQUERIMIENTO',
			array(
				'class'=>'span6',
				'placeholder' => 'N° de Requerimiento',
				'labelOptions' => array('label' => false),
				'autocomplete'=>'off',
			)
		);
		?>
		<?php 
			$this->widget('bootstrap.widgets.TbButton', array(
				'buttonType'=>'submit',			
				'icon'=>'icon-search',
				)
			);
		?>
	</div>

<?php $this->endWidget(); ?>