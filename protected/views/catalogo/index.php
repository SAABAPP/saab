<?php
/* @var $this CatalogoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Catalogos',
);

$this->menu=array(
	array('label'=>'Create Catalogo', 'url'=>array('create')),
	array('label'=>'Manage Catalogo', 'url'=>array('admin')),
);
?>

<h1>Catalogos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
