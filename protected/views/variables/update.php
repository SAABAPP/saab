<?php
$this->breadcrumbs=array(
	'Variables'=>array('index'),
	$model->IDVARIABLE=>array('view','id'=>$model->IDVARIABLE),
	'Update',
);

$this->menu=array(
	array('label'=>'List Variables','url'=>array('index')),
	array('label'=>'Create Variables','url'=>array('create')),
	array('label'=>'View Variables','url'=>array('view','id'=>$model->IDVARIABLE)),
	array('label'=>'Manage Variables','url'=>array('admin')),
);
?>

<h1>Actualizar Variable <?php echo $model->IDVARIABLE; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>