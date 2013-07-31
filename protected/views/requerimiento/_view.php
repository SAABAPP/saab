<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('IDREQUERIMIENTO')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IDREQUERIMIENTO),array('view','id'=>$data->IDREQUERIMIENTO)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('REQ_estado')); ?>:</b>
	<?php echo CHtml::encode($data->REQ_estado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('REQ_fecha')); ?>:</b>
	<?php echo CHtml::encode($data->REQ_fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('REQ_presupuesto')); ?>:</b>
	<?php echo CHtml::encode($data->REQ_presupuesto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IDUSUARIO')); ?>:</b>
	<?php echo CHtml::encode($data->IDUSUARIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CODMETA')); ?>:</b>
	<?php echo CHtml::encode($data->CODMETA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IDCUANEC')); ?>:</b>
	<?php echo CHtml::encode($data->IDCUANEC); ?>
	<br />


</div>