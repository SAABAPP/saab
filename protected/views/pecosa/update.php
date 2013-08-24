<?php
$this->breadcrumbs=array(
	'Pecosas'=>array('index'),
	$model->IDPECOSA=>array('view','id'=>$model->IDPECOSA),
	'Update',
);

$this->menu=array(
	array('label'=>'List Pecosa','url'=>array('index')),
	array('label'=>'Create Pecosa','url'=>array('create')),
	array('label'=>'View Pecosa','url'=>array('view','id'=>$model->IDPECOSA)),
	array('label'=>'Manage Pecosa','url'=>array('admin')),
);
?>

<h1>Update Pecosa <?php echo $model->IDPECOSA; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>