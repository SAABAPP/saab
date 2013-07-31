<?php
/* @var $this PersonalController */
/* @var $model Personal */

$this->breadcrumbs=array(
	'Personals'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Personal', 'url'=>array('index')),
	array('label'=>'Manage Personal', 'url'=>array('admin')),
);
?>

<h1>Create Personal</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>