<?php
$this->breadcrumbs=array(
	'Metas',
);

$this->menu=array(
	array('label'=>'Create Meta','url'=>array('create')),
	array('label'=>'Manage Meta','url'=>array('admin')),
);
?>

<h1>Metas</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
