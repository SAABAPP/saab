<?php
$this->breadcrumbs=array(
	'Servicios'=>array('index'),
	$model->IDSERVICIO,
);

$this->menu=array(
	array('label'=>'List Servicio','url'=>array('index')),
	array('label'=>'Create Servicio','url'=>array('create')),
	array('label'=>'Update Servicio','url'=>array('update','id'=>$model->IDSERVICIO)),
	array('label'=>'Delete Servicio','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->IDSERVICIO),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Servicio','url'=>array('admin')),
);
?>

<h1>View Servicio #<?php echo $model->IDSERVICIO; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'IDSERVICIO',
		'SER_descripcion',
		'IDCATALOGO',
	),
)); ?>
