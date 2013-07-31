<?php
$this->breadcrumbs=array(
	'Cotizacions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Cotizacion','url'=>array('index')),
	array('label'=>'Manage Cotizacion','url'=>array('admin')),
);
?>

<h1>Create Cotizacion</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>