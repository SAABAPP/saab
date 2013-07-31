<?php
/* @var $this CatalogoController */
/* @var $model Catalogo */

$this->breadcrumbs=array(
	'Catalogos'=>array('index'),
	$model->IDCATALOGO,
);

$this->menu=array(
	array('label'=>'List Catalogo', 'url'=>array('index')),
	array('label'=>'Create Catalogo', 'url'=>array('create')),
	array('label'=>'Update Catalogo', 'url'=>array('update', 'id'=>$model->IDCATALOGO)),
	array('label'=>'Delete Catalogo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->IDCATALOGO),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Catalogo', 'url'=>array('admin')),
);
?>

<h1>View Catalogo #<?php echo $model->IDCATALOGO; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'IDCATALOGO',
		'CAT_descripcion',
		'CAT_codigo',
		'CAT_unidad',
	),
)); ?>
