<?php
$this->breadcrumbs=array(
	'Requerimientos'=>array('index'),
	$model->IDREQUERIMIENTO=>array('view','id'=>$model->IDREQUERIMIENTO),
	'Modificar',
);

$this->menu=array(
	array('label'=>'List Requerimiento','url'=>array('index')),
	array('label'=>'Create Requerimiento','url'=>array('create')),
	array('label'=>'View Requerimiento','url'=>array('view','id'=>$model->IDREQUERIMIENTO)),
	array('label'=>'Manage Requerimiento','url'=>array('admin')),
);
?>

<h1>Update Requerimiento <?php echo $model->IDREQUERIMIENTO; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model,'usuario'=>$usuario)); ?>