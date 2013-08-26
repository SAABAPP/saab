<?php
$this->breadcrumbs=array(
	'Biens'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Bien','url'=>array('index')),
	array('label'=>'Manage Bien','url'=>array('admin')),
);
?>

<h1>Create Bien</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>