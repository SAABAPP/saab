<?php
/* @var $this OrdenCompraController */
/* @var $data OrdenCompra */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('IDORDENCOMPRA')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IDORDENCOMPRA), array('view', 'id'=>$data->IDORDENCOMPRA)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('IDREQUERIMIENTO')); ?>:</b>
	<?php echo CHtml::encode($data->IDREQUERIMIENTO); ?>
	<br />


</div>