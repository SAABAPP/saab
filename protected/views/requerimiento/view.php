<?php
$this->breadcrumbs=array(
	'Requerimientos'=>array('index'),
	'Requerimiento N° '.$model->IDREQUERIMIENTO,
);

$this->menu=array(
	array('label'=>'List Requerimiento','url'=>array('index')),
	array('label'=>'Create Requerimiento','url'=>array('create')),
	array('label'=>'Update Requerimiento','url'=>array('update','id'=>$model->IDREQUERIMIENTO)),
	array('label'=>'Delete Requerimiento','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->IDREQUERIMIENTO),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Requerimiento','url'=>array('admin')),
);
?>

<h1>View Requerimiento #<?php echo $model->IDREQUERIMIENTO; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'IDREQUERIMIENTO',
		'REQ_estado',
		'REQ_fecha',
		'REQ_presupuesto',
		'IDUSUARIO',
		'CODMETA',
		'IDCUANEC',
	),
)); ?>
