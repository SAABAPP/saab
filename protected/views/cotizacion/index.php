<?php
$this->breadcrumbs=array(
	'Cotizacions',
);

$this->menu=array(
	array('label'=>'Create Cotizacion','url'=>array('create')),
	array('label'=>'Manage Cotizacion','url'=>array('admin')),
);
?>

<h1>Cotizacions</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
