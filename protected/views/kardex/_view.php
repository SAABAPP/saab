<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('IDKARDEX')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IDKARDEX),array('view','id'=>$data->IDKARDEX)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('KAR_fechaMovimiento')); ?>:</b>
	<?php echo CHtml::encode($data->KAR_fechaMovimiento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('KAR_detalle')); ?>:</b>
	<?php echo CHtml::encode($data->KAR_detalle); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IDENTRADABIEN')); ?>:</b>
	<?php echo CHtml::encode($data->IDENTRADABIEN); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IDENTRADA')); ?>:</b>
	<?php echo CHtml::encode($data->IDENTRADA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IDPECOSABIEN')); ?>:</b>
	<?php echo CHtml::encode($data->IDPECOSABIEN); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IDPECOSA')); ?>:</b>
	<?php echo CHtml::encode($data->IDPECOSA); ?>
	<br />


</div>