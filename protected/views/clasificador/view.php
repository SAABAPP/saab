<?php
/* @var $this ClasificadorController */
/* @var $model Clasificador */

$this->breadcrumbs=array(
	'Clasificadors'=>array('index'),
	$model->CODIGOCLASIFICADOR,
);

$this->menu=array(
	array('label'=>'List Clasificador', 'url'=>array('index')),
	array('label'=>'Create Clasificador', 'url'=>array('create')),
	array('label'=>'Update Clasificador', 'url'=>array('update', 'id'=>$model->CODIGOCLASIFICADOR)),
	array('label'=>'Delete Clasificador', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->CODIGOCLASIFICADOR),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Clasificador', 'url'=>array('admin')),
);
?>

<h1>View Clasificador #<?php echo $model->CODIGOCLASIFICADOR; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'CODIGOCLASIFICADOR',
		'CLA_descripcion',
	),
)); ?>
