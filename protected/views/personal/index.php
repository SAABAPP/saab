<?php
/* @var $this PersonalController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Personals',
);

$this->menu=array(
	array('label'=>'Create Personal', 'url'=>array('create')),
	array('label'=>'Manage Personal', 'url'=>array('admin')),
);
?>

<h1>Personals</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
