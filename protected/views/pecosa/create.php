<?php
/* @var $this PecosaController */
/* @var $model Pecosa */

$this->breadcrumbs=array(
	'Pecosas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Pecosa', 'url'=>array('index')),
	array('label'=>'Manage Pecosa', 'url'=>array('admin')),
);
?>

<h1>Create Pecosa</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>