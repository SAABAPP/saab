<?php
/* @var $this ProveedorController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Proveedors',
);

$this->menu=array(
	array('label'=>'Create Proveedor', 'url'=>array('create')),
	array('label'=>'Manage Proveedor', 'url'=>array('admin')),
);
?>

<h1>Proveedors</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
