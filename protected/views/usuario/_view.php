<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('IDUSUARIO')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IDUSUARIO),array('view','id'=>$data->IDUSUARIO)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('USU_usuario')); ?>:</b>
	<?php echo CHtml::encode($data->USU_usuario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('USU_password')); ?>:</b>
	<?php echo CHtml::encode($data->USU_password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IDPERSONAL')); ?>:</b>
	<?php echo CHtml::encode($data->IDPERSONAL); ?>
	<br />


</div>