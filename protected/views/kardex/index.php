<?php
/* @var $this KardexController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Kardexes',
);

$this->menu=array(
	array('label'=>'Create Kardex', 'url'=>array('create')),
	array('label'=>'Manage Kardex', 'url'=>array('admin')),
);
?>

<h1>Kardexes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
