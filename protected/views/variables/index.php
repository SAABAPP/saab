<?php
/* @var $this VariablesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Variables',
);

$this->menu=array(
	array('label'=>'Create Variables', 'url'=>array('create')),
	array('label'=>'Manage Variables', 'url'=>array('admin')),
);
?>

<h1>Variables</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
