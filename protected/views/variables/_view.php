<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('IDVARIABLE')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IDVARIABLE),array('view','id'=>$data->IDVARIABLE)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('VAR_descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->VAR_descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('VAR_valor')); ?>:</b>
	<?php echo CHtml::encode($data->VAR_valor); ?>
	<br />


</div>