<?php
/* @var $this NeaController */
/* @var $model Nea */

$this->breadcrumbs=array(
	'Neas'=>array('index'),
	$model->IDENTRADA=>array('view','id'=>$model->IDENTRADA),
	'Update',
);

$this->menu=array(
	array('label'=>'List Nea', 'url'=>array('index')),
	array('label'=>'Create Nea', 'url'=>array('create')),
	array('label'=>'View Nea', 'url'=>array('view', 'id'=>$model->IDENTRADA)),
	array('label'=>'Manage Nea', 'url'=>array('admin')),
);
?>

<h1>Update Nea <?php echo $model->IDENTRADA; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>