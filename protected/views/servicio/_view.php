<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('IDSERVICIO')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IDSERVICIO),array('view','id'=>$data->IDSERVICIO)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SER_descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->SER_descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IDCATALOGO')); ?>:</b>
	<?php echo CHtml::encode($data->IDCATALOGO); ?>
	<br />


</div>