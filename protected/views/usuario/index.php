<?php
$this->breadcrumbs=array(
	'Usuarios',
);

$this->menu=array(
	array('label'=>'Create Usuario','url'=>array('create')),
	array('label'=>'Manage Usuario','url'=>array('admin')),
);
?>

<h1>Usuarios</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
