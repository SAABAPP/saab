<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('CODMETA')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->CODMETA),array('view','id'=>$data->CODMETA)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MET_descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->MET_descripcion); ?>
	<br />


</div>