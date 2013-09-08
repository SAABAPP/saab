<?php
$this->breadcrumbs=array(
	'Entrada Ocs'=>array('index'),
	$model->IDENTRADA=>array('view','id'=>$model->IDENTRADA),
	'Update',
);

$this->menu=array(
	array('label'=>'List EntradaOc','url'=>array('index')),
	array('label'=>'Create EntradaOc','url'=>array('create')),
	array('label'=>'View EntradaOc','url'=>array('view','id'=>$model->IDENTRADA)),
	array('label'=>'Manage EntradaOc','url'=>array('admin')),
);
?>

<h1>Update EntradaOc <?php echo $model->IDENTRADA; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>