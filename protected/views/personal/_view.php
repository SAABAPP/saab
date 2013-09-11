<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('IDPERSONAL')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IDPERSONAL),array('view','id'=>$data->IDPERSONAL)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PER_idResponsable')); ?>:</b>
	<?php echo CHtml::encode($data->PER_idResponsable); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PER_dni')); ?>:</b>
	<?php echo CHtml::encode($data->PER_dni); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PER_nombres')); ?>:</b>
	<?php echo CHtml::encode($data->PER_nombres); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PER_paterno')); ?>:</b>
	<?php echo CHtml::encode($data->PER_paterno); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PER_materno')); ?>:</b>
	<?php echo CHtml::encode($data->PER_materno); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PER_sexo')); ?>:</b>
	<?php echo CHtml::encode($data->PER_sexo); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('PER_direccion')); ?>:</b>
	<?php echo CHtml::encode($data->PER_direccion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PER_telefono')); ?>:</b>
	<?php echo CHtml::encode($data->PER_telefono); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PER_celular')); ?>:</b>
	<?php echo CHtml::encode($data->PER_celular); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PER_cargo')); ?>:</b>
	<?php echo CHtml::encode($data->PER_cargo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PER_estado')); ?>:</b>
	<?php echo CHtml::encode($data->PER_estado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IDAREA')); ?>:</b>
	<?php echo CHtml::encode($data->IDAREA); ?>
	<br />

	*/ ?>

</div>