<?php
/* @var $this BienController */
/* @var $data Bien */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('IDBIEN')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IDBIEN), array('view', 'id'=>$data->IDBIEN)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BIE_stockActual')); ?>:</b>
	<?php echo CHtml::encode($data->BIE_stockActual); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BIE_stockMinimo')); ?>:</b>
	<?php echo CHtml::encode($data->BIE_stockMinimo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BIE_caracteristica')); ?>:</b>
	<?php echo CHtml::encode($data->BIE_caracteristica); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('BIE_marca')); ?>:</b>
	<?php echo CHtml::encode($data->BIE_marca); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IDCATALOGO')); ?>:</b>
	<?php echo CHtml::encode($data->IDCATALOGO); ?>
	<br />


</div>