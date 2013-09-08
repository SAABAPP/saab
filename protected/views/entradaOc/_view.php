<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('IDENTRADA')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IDENTRADA),array('view','id'=>$data->IDENTRADA)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IDORDENCOMPRA')); ?>:</b>
	<?php echo CHtml::encode($data->IDORDENCOMPRA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EOC_documento')); ?>:</b>
	<?php echo CHtml::encode($data->EOC_documento); ?>
	<br />


</div>