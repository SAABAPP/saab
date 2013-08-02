<?php
$this->breadcrumbs=array(
	'Servicios'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Servicio','url'=>array('index')),
	array('label'=>'Manage Servicio','url'=>array('admin')),
);
?>

<h1>Create Servicio</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>