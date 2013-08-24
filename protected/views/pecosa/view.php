<?php
$this->breadcrumbs=array(
	'Pecosas'=>array('index'),
	$model->IDPECOSA,
);

$this->menu=array(
	array('label'=>'List Pecosa','url'=>array('index')),
	array('label'=>'Create Pecosa','url'=>array('create')),
	array('label'=>'Update Pecosa','url'=>array('update','id'=>$model->IDPECOSA)),
	array('label'=>'Delete Pecosa','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->IDPECOSA),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Pecosa','url'=>array('admin')),
);
?>

<h1>View Pecosa #<?php echo $model->IDPECOSA; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'IDPECOSA',
		'PEC_fecha',
		'PEC_referencia',
		'IDUSUARIO',
		'IDREQUERIMIENTO',
	),
)); ?>
