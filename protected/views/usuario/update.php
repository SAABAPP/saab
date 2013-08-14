<?php
$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->IDUSUARIO=>array('view','id'=>$model->IDUSUARIO),
	'Update',
);

$this->menu=array(
	array('label'=>'List Usuario','url'=>array('index')),
	array('label'=>'Create Usuario','url'=>array('create')),
	array('label'=>'View Usuario','url'=>array('view','id'=>$model->IDUSUARIO)),
	array('label'=>'Manage Usuario','url'=>array('admin')),
);
?>

<h1>Cambiar contraseña <?php //echo $model->IDUSUARIO; ?></h1>
<br>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>