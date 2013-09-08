<?php
$this->breadcrumbs=array(
	'Variables'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Variables','url'=>array('index')),
	array('label'=>'Manage Variables','url'=>array('admin')),
);
?>

<h1>Crear Variable</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>