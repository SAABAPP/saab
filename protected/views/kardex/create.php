<?php
$this->breadcrumbs=array(
	'Kardexes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Kardex','url'=>array('index')),
	array('label'=>'Manage Kardex','url'=>array('admin')),
);
?>

<h1>Create Kardex</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>