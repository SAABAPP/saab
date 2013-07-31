<?php
/* @var $this NeaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Neas',
);

$this->menu=array(
	array('label'=>'Create Nea', 'url'=>array('create')),
	array('label'=>'Manage Nea', 'url'=>array('admin')),
);
?>

<h1>Neas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
