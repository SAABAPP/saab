<?php
/* @var $this CuaNecController */
/* @var $model CuaNec */

$this->breadcrumbs=array(
	'Cua Necs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CuaNec', 'url'=>array('index')),
	array('label'=>'Manage CuaNec', 'url'=>array('admin')),
);
?>

<h1>Create CuaNec</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>