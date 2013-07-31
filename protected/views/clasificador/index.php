<?php
/* @var $this ClasificadorController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Clasificadors',
);

$this->menu=array(
	array('label'=>'Create Clasificador', 'url'=>array('create')),
	array('label'=>'Manage Clasificador', 'url'=>array('admin')),
);
?>

<h1>Clasificadors</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
