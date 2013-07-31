<?php
/* @var $this MetaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Metas',
);

$this->menu=array(
	array('label'=>'Create Meta', 'url'=>array('create')),
	array('label'=>'Manage Meta', 'url'=>array('admin')),
);
?>

<h1>Metas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
