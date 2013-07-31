<?php
/* @var $this OrdenCompraController */
/* @var $model OrdenCompra */

$this->breadcrumbs=array(
	'Orden Compras'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List OrdenCompra', 'url'=>array('index')),
	array('label'=>'Manage OrdenCompra', 'url'=>array('admin')),
);
?>

<h1>Create OrdenCompra</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>