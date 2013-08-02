<?php
$this->breadcrumbs=array(
	'Catalogos'=>array('index'),
	$model->IDCATALOGO=>array('view','id'=>$model->IDCATALOGO),
	'Update',
);

$this->menu=array(
	array('label'=>'List Catalogo','url'=>array('index')),
	array('label'=>'Create Catalogo','url'=>array('create')),
	array('label'=>'View Catalogo','url'=>array('view','id'=>$model->IDCATALOGO)),
	array('label'=>'Manage Catalogo','url'=>array('admin')),
);
?>

<h1>Update Catalogo <?php echo $model->IDCATALOGO; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>