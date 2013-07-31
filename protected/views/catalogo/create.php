<?php
/* @var $this CatalogoController */
/* @var $model Catalogo */

$this->breadcrumbs=array(
	'Catalogos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Catalogo', 'url'=>array('index')),
	array('label'=>'Manage Catalogo', 'url'=>array('admin')),
);
?>

<h1>Create Catalogo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>