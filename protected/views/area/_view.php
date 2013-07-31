<?php
/* @var $this AreaController */
/* @var $data Area */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('IDAREA')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->IDAREA), array('view', 'id'=>$data->IDAREA)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ARE_nombre')); ?>:</b>
	<?php echo CHtml::encode($data->ARE_nombre); ?>
	<br />


</div>