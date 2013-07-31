<?php
/* @var $this AsientoContableController */
/* @var $model AsientoContable */

$this->breadcrumbs=array(
	'Asiento Contables'=>array('index'),
	$model->CODIGOCONTABLE,
);

$this->menu=array(
	array('label'=>'List AsientoContable', 'url'=>array('index')),
	array('label'=>'Create AsientoContable', 'url'=>array('create')),
	array('label'=>'Update AsientoContable', 'url'=>array('update', 'id'=>$model->CODIGOCONTABLE)),
	array('label'=>'Delete AsientoContable', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->CODIGOCONTABLE),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AsientoContable', 'url'=>array('admin')),
);
?>

<h1>View AsientoContable #<?php echo $model->CODIGOCONTABLE; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'CODIGOCONTABLE',
		'ACO_descripcion',
	),
)); ?>
