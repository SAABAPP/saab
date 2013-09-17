<?php
$this->breadcrumbs=array(
	'Cua Necs'=>array('index'),
	$model->IDCUANEC=>array('view','id'=>$model->IDCUANEC),
	'Update',
);

$this->menu=array(
	array('label'=>'List CuaNec','url'=>array('index')),
	array('label'=>'Create CuaNec','url'=>array('create')),
	array('label'=>'View CuaNec','url'=>array('view','id'=>$model->IDCUANEC)),
	array('label'=>'Manage CuaNec','url'=>array('admin')),
);
?>

<h1>Update CuaNec <?php echo $model->IDCUANEC; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>