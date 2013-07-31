<?php
/* @var $this BienController */
/* @var $model Bien */

$this->breadcrumbs=array(
	'Biens'=>array('index'),
	$model->IDBIEN=>array('view','id'=>$model->IDBIEN),
	'Update',
);

$this->menu=array(
	array('label'=>'List Bien', 'url'=>array('index')),
	array('label'=>'Create Bien', 'url'=>array('create')),
	array('label'=>'View Bien', 'url'=>array('view', 'id'=>$model->IDBIEN)),
	array('label'=>'Manage Bien', 'url'=>array('admin')),
);
?>

<h1>Update Bien <?php echo $model->IDBIEN; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>