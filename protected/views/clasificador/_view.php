<?php
/* @var $this ClasificadorController */
/* @var $data Clasificador */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('CODIGOCLASIFICADOR')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->CODIGOCLASIFICADOR), array('view', 'id'=>$data->CODIGOCLASIFICADOR)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CLA_descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->CLA_descripcion); ?>
	<br />


</div>