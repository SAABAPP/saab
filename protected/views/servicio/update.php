<?php
$this->breadcrumbs=array(
	'Servicios'=>array('index'),
	$model->IDSERVICIO=>array('view','id'=>$model->IDSERVICIO),
	'Update',
);

$this->menu=array(
	array('label'=>'List Servicio','url'=>array('index')),
	array('label'=>'Create Servicio','url'=>array('create')),
	array('label'=>'View Servicio','url'=>array('view','id'=>$model->IDSERVICIO)),
	array('label'=>'Manage Servicio','url'=>array('admin')),
);
?>

<h1>Update Servicio <?php echo $model->IDSERVICIO; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>