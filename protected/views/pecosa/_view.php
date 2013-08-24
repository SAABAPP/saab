<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('IDPECOSA')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IDPECOSA),array('view','id'=>$data->IDPECOSA)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PEC_fecha')); ?>:</b>
	<?php echo CHtml::encode($data->PEC_fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PEC_referencia')); ?>:</b>
	<?php echo CHtml::encode($data->PEC_referencia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IDUSUARIO')); ?>:</b>
	<?php echo CHtml::encode($data->IDUSUARIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IDREQUERIMIENTO')); ?>:</b>
	<?php echo CHtml::encode($data->IDREQUERIMIENTO); ?>
	<br />


</div>