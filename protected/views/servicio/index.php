<?php
/* @var $this ServicioController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Servicios',
);

$this->menu=array(
	array('label'=>'Create Servicio', 'url'=>array('create')),
	array('label'=>'Manage Servicio', 'url'=>array('admin')),
);
?>

<h1>Servicios</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
