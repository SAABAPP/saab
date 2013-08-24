<?php
$this->breadcrumbs=array(
	'Personals',
);

$this->menu=array(
	array('label'=>'Create Personal','url'=>array('create')),
	array('label'=>'Manage Personal','url'=>array('admin')),
);
?>

<h1>Personals</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
