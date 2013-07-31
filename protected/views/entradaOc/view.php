<?php
/* @var $this EntradaOcController */
/* @var $model EntradaOc */

$this->breadcrumbs=array(
	'Entrada Ocs'=>array('index'),
	$model->IDENTRADA,
);

$this->menu=array(
	array('label'=>'List EntradaOc', 'url'=>array('index')),
	array('label'=>'Create EntradaOc', 'url'=>array('create')),
	array('label'=>'Update EntradaOc', 'url'=>array('update', 'id'=>$model->IDENTRADA)),
	array('label'=>'Delete EntradaOc', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->IDENTRADA),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EntradaOc', 'url'=>array('admin')),
);
?>

<h1>View EntradaOc #<?php echo $model->IDENTRADA; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'IDENTRADA',
		'IDORDENCOMPRA',
	),
)); ?>
