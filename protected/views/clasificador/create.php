<?php
/* @var $this ClasificadorController */
/* @var $model Clasificador */

$this->breadcrumbs=array(
	'Clasificadors'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Clasificador', 'url'=>array('index')),
	array('label'=>'Manage Clasificador', 'url'=>array('admin')),
);
?>

<h1>Create Clasificador</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>