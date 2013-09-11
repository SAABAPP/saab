<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('IDPROVEEDOR')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IDPROVEEDOR),array('view','id'=>$data->IDPROVEEDOR)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PRO_razonSocial')); ?>:</b>
	<?php echo CHtml::encode($data->PRO_razonSocial); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PRO_ruc')); ?>:</b>
	<?php echo CHtml::encode($data->PRO_ruc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PRO_rubro')); ?>:</b>
	<?php echo CHtml::encode($data->PRO_rubro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PRO_ciudad')); ?>:</b>
	<?php echo CHtml::encode($data->PRO_ciudad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PRO_telefono')); ?>:</b>
	<?php echo CHtml::encode($data->PRO_telefono); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PRO_fax')); ?>:</b>
	<?php echo CHtml::encode($data->PRO_fax); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('PRO_direccion')); ?>:</b>
	<?php echo CHtml::encode($data->PRO_direccion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PRO_banco')); ?>:</b>
	<?php echo CHtml::encode($data->PRO_banco); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PRO_cci')); ?>:</b>
	<?php echo CHtml::encode($data->PRO_cci); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PRO_contacto')); ?>:</b>
	<?php echo CHtml::encode($data->PRO_contacto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PRO_celular')); ?>:</b>
	<?php echo CHtml::encode($data->PRO_celular); ?>
	<br />

	*/ ?>

</div>