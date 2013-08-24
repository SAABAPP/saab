<?php
$this->breadcrumbs=array(
	'Kardexes'=>array('index'),
	$model->IDKARDEX=>array('view','id'=>$model->IDKARDEX),
	'Update',
);

$this->menu=array(
	array('label'=>'List Kardex','url'=>array('index')),
	array('label'=>'Create Kardex','url'=>array('create')),
	array('label'=>'View Kardex','url'=>array('view','id'=>$model->IDKARDEX)),
	array('label'=>'Manage Kardex','url'=>array('admin')),
);
?>

<h1>Update Kardex <?php echo $model->IDKARDEX; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>