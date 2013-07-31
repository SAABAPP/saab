<?php
/* @var $this BienController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Biens',
);

$this->menu=array(
	array('label'=>'Create Bien', 'url'=>array('create')),
	array('label'=>'Manage Bien', 'url'=>array('admin')),
);
?>

<h1>Biens</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
