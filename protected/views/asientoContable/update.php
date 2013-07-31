<?php
/* @var $this AsientoContableController */
/* @var $model AsientoContable */

$this->breadcrumbs=array(
	'Asiento Contables'=>array('index'),
	$model->CODIGOCONTABLE=>array('view','id'=>$model->CODIGOCONTABLE),
	'Update',
);

$this->menu=array(
	array('label'=>'List AsientoContable', 'url'=>array('index')),
	array('label'=>'Create AsientoContable', 'url'=>array('create')),
	array('label'=>'View AsientoContable', 'url'=>array('view', 'id'=>$model->CODIGOCONTABLE)),
	array('label'=>'Manage AsientoContable', 'url'=>array('admin')),
);
?>

<h1>Update AsientoContable <?php echo $model->CODIGOCONTABLE; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>