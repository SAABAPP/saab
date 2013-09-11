<?php
$this->breadcrumbs=array(
	'Proveedors'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Proveedor','url'=>array('index')),
	array('label'=>'Manage Proveedor','url'=>array('admin')),
);
?>

<h1>Proveedor</h1>
<br>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>