<?php
$this->breadcrumbs=array(
	'Usuario'=>array('index'),
	// $model->IDUSUARIO=>array('view','id'=>$model->IDUSUARIO),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'List Usuario','url'=>array('index')),
	array('label'=>'Create Usuario','url'=>array('create')),
	array('label'=>'View Usuario','url'=>array('view','id'=>$model->IDUSUARIO)),
	array('label'=>'Manage Usuario','url'=>array('admin')),
);
?>

<h2>Actualizar Datos Usuario</h2>
<br>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>