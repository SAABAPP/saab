<?php
/* @var $this ClasificadorController */
/* @var $model Clasificador */

$this->breadcrumbs=array(
	'Clasificadors'=>array('index'),
	$model->CODIGOCLASIFICADOR=>array('view','id'=>$model->CODIGOCLASIFICADOR),
	'Update',
);

$this->menu=array(
	array('label'=>'List Clasificador', 'url'=>array('index')),
	array('label'=>'Create Clasificador', 'url'=>array('create')),
	array('label'=>'View Clasificador', 'url'=>array('view', 'id'=>$model->CODIGOCLASIFICADOR)),
	array('label'=>'Manage Clasificador', 'url'=>array('admin')),
);
?>

<h1>Update Clasificador <?php echo $model->CODIGOCLASIFICADOR; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>