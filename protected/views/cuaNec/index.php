<?php
/* @var $this CuaNecController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cua Necs',
);

$this->menu=array(
	array('label'=>'Create CuaNec', 'url'=>array('create')),
	array('label'=>'Manage CuaNec', 'url'=>array('admin')),
);
?>

<h1>Cua Necs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
