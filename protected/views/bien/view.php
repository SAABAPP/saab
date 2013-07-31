<?php
/* @var $this BienController */
/* @var $model Bien */

$this->breadcrumbs=array(
	'Biens'=>array('index'),
	$model->IDBIEN,
);

$this->menu=array(
	array('label'=>'List Bien', 'url'=>array('index')),
	array('label'=>'Create Bien', 'url'=>array('create')),
	array('label'=>'Update Bien', 'url'=>array('update', 'id'=>$model->IDBIEN)),
	array('label'=>'Delete Bien', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->IDBIEN),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Bien', 'url'=>array('admin')),
);
?>

<h1>View Bien #<?php echo $model->IDBIEN; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'IDBIEN',
		'BIE_stockActual',
		'BIE_stockMinimo',
		'BIE_caracteristica',
		'BIE_marca',
		'IDCATALOGO',
	),
)); ?>
