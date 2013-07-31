<?php
/* @var $this PecosaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Pecosas',
);

$this->menu=array(
	array('label'=>'Create Pecosa', 'url'=>array('create')),
	array('label'=>'Manage Pecosa', 'url'=>array('admin')),
);
?>

<h1>Pecosas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
