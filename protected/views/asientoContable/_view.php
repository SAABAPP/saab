<?php
/* @var $this AsientoContableController */
/* @var $data AsientoContable */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('CODIGOCONTABLE')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->CODIGOCONTABLE), array('view', 'id'=>$data->CODIGOCONTABLE)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ACO_descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->ACO_descripcion); ?>
	<br />


</div>