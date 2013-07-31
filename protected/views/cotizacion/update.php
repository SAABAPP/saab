<?php
$this->breadcrumbs=array(
	'Cotizacions'=>array('index'),
	$model->IDCOTIZACION=>array('view','id'=>$model->IDCOTIZACION),
	'Update',
);

$this->menu=array(
	array('label'=>'List Cotizacion','url'=>array('index')),
	array('label'=>'Create Cotizacion','url'=>array('create')),
	array('label'=>'View Cotizacion','url'=>array('view','id'=>$model->IDCOTIZACION)),
	array('label'=>'Manage Cotizacion','url'=>array('admin')),
);
?>

<h1>Update Cotizacion <?php echo $model->IDCOTIZACION; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>