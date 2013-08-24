<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('IDENTRADA')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IDENTRADA),array('view','id'=>$data->IDENTRADA)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ENT_fecha')); ?>:</b>
	<?php echo CHtml::encode($data->ENT_fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ENT_tipo')); ?>:</b>
	<?php echo CHtml::encode($data->ENT_tipo); ?>
	<br />


</div>