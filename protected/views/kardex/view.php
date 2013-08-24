<?php
$this->breadcrumbs=array(
	'Kardexes'=>array('index'),
	$model->IDKARDEX,
);

$this->menu=array(
	array('label'=>'List Kardex','url'=>array('index')),
	array('label'=>'Create Kardex','url'=>array('create')),
	array('label'=>'Update Kardex','url'=>array('update','id'=>$model->IDKARDEX)),
	array('label'=>'Delete Kardex','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->IDKARDEX),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Kardex','url'=>array('admin')),
);
?>

<h1>View Kardex #<?php echo $model->IDKARDEX; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'IDKARDEX',
		'KAR_fechaMovimiento',
		'KAR_detalle',
		'IDENTRADABIEN',
		'IDENTRADA',
		'IDPECOSABIEN',
		'IDPECOSA',
	),
)); ?>
