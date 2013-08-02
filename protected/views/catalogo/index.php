<?php
$this->breadcrumbs=array(
	'Catalogos',
);

$this->menu=array(
	array('label'=>'Create Catalogo','url'=>array('create')),
	array('label'=>'Manage Catalogo','url'=>array('admin')),
);
?>

<h1>Catalogos</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
