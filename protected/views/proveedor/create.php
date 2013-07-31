<?php
/* @var $this ProveedorController */
/* @var $model Proveedor */

$this->breadcrumbs=array(
	'Proveedors'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Proveedor', 'url'=>array('index')),
	array('label'=>'Manage Proveedor', 'url'=>array('admin')),
);
?>

<h1>Create Proveedor</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>