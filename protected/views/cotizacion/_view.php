<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('IDCOTIZACION')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IDCOTIZACION),array('view','id'=>$data->IDCOTIZACION)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('COT_buenaPro')); ?>:</b>
	<?php echo CHtml::encode($data->COT_buenaPro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IDREQUERIMIENTO')); ?>:</b>
	<?php echo CHtml::encode($data->IDREQUERIMIENTO); ?>
	<br />


</div>