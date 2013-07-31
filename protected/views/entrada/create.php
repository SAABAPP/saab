<?php
/* @var $this EntradaController */
/* @var $model Entrada */

$this->breadcrumbs=array(
	'Entradas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Entrada', 'url'=>array('index')),
	array('label'=>'Manage Entrada', 'url'=>array('admin')),
);
?>

<h1>Create Entrada</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>