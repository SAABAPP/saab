<?php
/* @var $this OrdenCompraController */
/* @var $model OrdenCompra */

$this->breadcrumbs=array(
	'Orden Compras'=>array('index'),
	$model->IDORDENCOMPRA,
);

$this->menu=array(
	array('label'=>'List OrdenCompra', 'url'=>array('index')),
	array('label'=>'Create OrdenCompra', 'url'=>array('create')),
	array('label'=>'Update OrdenCompra', 'url'=>array('update', 'id'=>$model->IDORDENCOMPRA)),
	array('label'=>'Delete OrdenCompra', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->IDORDENCOMPRA),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage OrdenCompra', 'url'=>array('admin')),
);
?>

<h1>View OrdenCompra #<?php echo $model->IDORDENCOMPRA; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'IDORDENCOMPRA',
		'IDREQUERIMIENTO',
	),
)); ?>
