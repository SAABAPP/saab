<?php
/* @var $this MetaController */
/* @var $model Meta */

$this->breadcrumbs=array(
	'Metas'=>array('index'),
	$model->CODMETA,
);

$this->menu=array(
	array('label'=>'List Meta', 'url'=>array('index')),
	array('label'=>'Create Meta', 'url'=>array('create')),
	array('label'=>'Update Meta', 'url'=>array('update', 'id'=>$model->CODMETA)),
	array('label'=>'Delete Meta', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->CODMETA),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Meta', 'url'=>array('admin')),
);
?>

<h1>View Meta #<?php echo $model->CODMETA; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'CODMETA',
		'MET_descripcion',
	),
)); ?>
