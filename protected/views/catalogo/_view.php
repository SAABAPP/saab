<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('IDCATALOGO')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IDCATALOGO),array('view','id'=>$data->IDCATALOGO)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CAT_codigo')); ?>:</b>
	<?php echo CHtml::encode($data->CAT_codigo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CAT_descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->CAT_descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CAT_unidad')); ?>:</b>
	<?php echo CHtml::encode($data->CAT_unidad); ?>
	<br />


</div>