<?php
$this->breadcrumbs=array(
	'Entrada Ocs',
);

$this->menu=array(
	array('label'=>'Create EntradaOc','url'=>array('create')),
	array('label'=>'Manage EntradaOc','url'=>array('admin')),
);
?>

<h1>Entrada Ocs</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
