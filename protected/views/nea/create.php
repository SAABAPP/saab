<?php
/* @var $this NeaController */
/* @var $model Nea */

$this->breadcrumbs=array(
	'Neas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Nea', 'url'=>array('index')),
	array('label'=>'Manage Nea', 'url'=>array('admin')),
);
?>

<h1>Create Nea</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>