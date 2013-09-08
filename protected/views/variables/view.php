<?php
$this->breadcrumbs=array(
	'Variables'=>array('index'),
	$model->IDVARIABLE,
);

$this->menu=array(
	array('label'=>'List Variables','url'=>array('index')),
	array('label'=>'Create Variables','url'=>array('create')),
	array('label'=>'Update Variables','url'=>array('update','id'=>$model->IDVARIABLE)),
	array('label'=>'Delete Variables','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->IDVARIABLE),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Variables','url'=>array('admin')),
);
?>

<h1>View Variables #<?php echo $model->IDVARIABLE; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'IDVARIABLE',
		'VAR_descripcion',
		'VAR_valor',
	),
)); ?>
