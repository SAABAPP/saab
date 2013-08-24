<?php
$this->breadcrumbs=array(
	'Entradas'=>array('index'),
	$model->IDENTRADA,
);

$this->menu=array(
	array('label'=>'List Entrada','url'=>array('index')),
	array('label'=>'Create Entrada','url'=>array('create')),
	array('label'=>'Update Entrada','url'=>array('update','id'=>$model->IDENTRADA)),
	array('label'=>'Delete Entrada','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->IDENTRADA),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Entrada','url'=>array('admin')),
);
?>

<h1>View Entrada #<?php echo $model->IDENTRADA; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'IDENTRADA',
		'ENT_fecha',
		'ENT_tipo',
	),
)); ?>
