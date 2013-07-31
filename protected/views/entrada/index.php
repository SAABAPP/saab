<?php
/* @var $this EntradaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Entradas',
);

$this->menu=array(
	array('label'=>'Create Entrada', 'url'=>array('create')),
	array('label'=>'Manage Entrada', 'url'=>array('admin')),
);
?>

<h1>Entradas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
