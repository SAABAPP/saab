<?php
$this->breadcrumbs=array(
	'Proveedors'=>array('index'),
	$model->IDPROVEEDOR=>array('view','id'=>$model->IDPROVEEDOR),
	'Update',
);

$this->menu=array(
	array('label'=>'List Proveedor','url'=>array('index')),
	array('label'=>'Create Proveedor','url'=>array('create')),
	array('label'=>'View Proveedor','url'=>array('view','id'=>$model->IDPROVEEDOR)),
	array('label'=>'Manage Proveedor','url'=>array('admin')),
);
?>

<h1>Update Proveedor <?php echo $model->IDPROVEEDOR; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>