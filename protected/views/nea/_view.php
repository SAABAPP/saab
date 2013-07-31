<?php
/* @var $this NeaController */
/* @var $data Nea */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('IDENTRADA')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IDENTRADA), array('view', 'id'=>$data->IDENTRADA)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NEA_referencia')); ?>:</b>
	<?php echo CHtml::encode($data->NEA_referencia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NEA_procedencia')); ?>:</b>
	<?php echo CHtml::encode($data->NEA_procedencia); ?>
	<br />


</div>