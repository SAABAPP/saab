<?php
/* @var $this NeaController */
/* @var $model Nea */

$this->breadcrumbs=array(
	'Neas'=>array('index'),
	$model->IDENTRADA,
);

$this->menu=array(
	array('label'=>'List Nea', 'url'=>array('index')),
	array('label'=>'Create Nea', 'url'=>array('create')),
	array('label'=>'Update Nea', 'url'=>array('update', 'id'=>$model->IDENTRADA)),
	array('label'=>'Delete Nea', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->IDENTRADA),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Nea', 'url'=>array('admin')),
);
?>

<h1>View Nea #<?php echo $model->IDENTRADA; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'NEA_referencia',
		'NEA_procedencia',
		'IDENTRADA',
	),
)); ?>
