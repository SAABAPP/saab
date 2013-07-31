<?php
$this->breadcrumbs=array(
	'Cotizacions'=>array('index'),
	$model->IDCOTIZACION,
);

$this->menu=array(
	array('label'=>'List Cotizacion','url'=>array('index')),
	array('label'=>'Create Cotizacion','url'=>array('create')),
	array('label'=>'Update Cotizacion','url'=>array('update','id'=>$model->IDCOTIZACION)),
	array('label'=>'Delete Cotizacion','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->IDCOTIZACION),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Cotizacion','url'=>array('admin')),
);
?>

<h1>View Cotizacion #<?php echo $model->IDCOTIZACION; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'IDCOTIZACION',
		'COT_buenaPro',
		'IDREQUERIMIENTO',
	),
)); ?>
