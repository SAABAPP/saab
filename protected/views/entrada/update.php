<?php
$this->breadcrumbs=array(
	'Entradas'=>array('index'),
	$model->IDENTRADA=>array('view','id'=>$model->IDENTRADA),
	'Update',
);

$this->menu=array(
	array('label'=>'List Entrada','url'=>array('index')),
	array('label'=>'Create Entrada','url'=>array('create')),
	array('label'=>'View Entrada','url'=>array('view','id'=>$model->IDENTRADA)),
	array('label'=>'Manage Entrada','url'=>array('admin')),
);
?>

<h1>Update Entrada <?php echo $model->IDENTRADA; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>