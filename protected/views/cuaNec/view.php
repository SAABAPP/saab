<?php
/* @var $this CuaNecController */
/* @var $model CuaNec */

$this->breadcrumbs=array(
	'Cua Necs'=>array('index'),
	$model->IDCUANEC,
);

$this->menu=array(
	array('label'=>'List CuaNec', 'url'=>array('index')),
	array('label'=>'Create CuaNec', 'url'=>array('create')),
	array('label'=>'Update CuaNec', 'url'=>array('update', 'id'=>$model->IDCUANEC)),
	array('label'=>'Delete CuaNec', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->IDCUANEC),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CuaNec', 'url'=>array('admin')),
);
?>

<h1>View CuaNec #<?php echo $model->IDCUANEC; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'IDCUANEC',
		'CNE_anio',
	),
)); ?>
