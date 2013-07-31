<?php
/* @var $this AsientoContableController */
/* @var $model AsientoContable */

$this->breadcrumbs=array(
	'Asiento Contables'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AsientoContable', 'url'=>array('index')),
	array('label'=>'Manage AsientoContable', 'url'=>array('admin')),
);
?>

<h1>Create AsientoContable</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>