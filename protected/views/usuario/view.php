<?php
$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->IDUSUARIO,
);

$this->menu=array(
	array('label'=>'List Usuario','url'=>array('index')),
	array('label'=>'Create Usuario','url'=>array('create')),
	array('label'=>'Update Usuario','url'=>array('update','id'=>$model->IDUSUARIO)),
	array('label'=>'Delete Usuario','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->IDUSUARIO),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Usuario','url'=>array('admin')),
);
?>

<h1>View Usuario #<?php echo $model->IDUSUARIO; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'IDUSUARIO',
		'USU_usuario',
		'USU_password',
		'IDPERSONAL',
	),
)); ?>
