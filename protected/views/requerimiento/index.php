<?php
$this->breadcrumbs=array(
	'Requerimientos',
);

$this->menu=array(
	array('label'=>'Create Requerimiento','url'=>array('create')),
	array('label'=>'Manage Requerimiento','url'=>array('admin')),
);
?>

<h1>Requerimientos</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
