<?php
/* @var $this OrdenCompraController */
/* @var $model OrdenCompra */

$this->breadcrumbs=array(
	'Orden Compras'=>array('index'),
	$model->IDORDENCOMPRA=>array('view','id'=>$model->IDORDENCOMPRA),
	'Update',
);

$this->menu=array(
	array('label'=>'List OrdenCompra', 'url'=>array('index')),
	array('label'=>'Create OrdenCompra', 'url'=>array('create')),
	array('label'=>'View OrdenCompra', 'url'=>array('view', 'id'=>$model->IDORDENCOMPRA)),
	array('label'=>'Manage OrdenCompra', 'url'=>array('admin')),
);
?>

<h1>Update OrdenCompra <?php echo $model->IDORDENCOMPRA; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>