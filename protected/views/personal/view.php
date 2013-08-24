<?php
$this->breadcrumbs=array(
	'Personals'=>array('index'),
	$model->IDPERSONAL,
);

$this->menu=array(
	array('label'=>'List Personal','url'=>array('index')),
	array('label'=>'Create Personal','url'=>array('create')),
	array('label'=>'Update Personal','url'=>array('update','id'=>$model->IDPERSONAL)),
	array('label'=>'Delete Personal','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->IDPERSONAL),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Personal','url'=>array('admin')),
);
?>

<h1>View Personal #<?php echo $model->IDPERSONAL; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'IDPERSONAL',
		'PER_idResponsable',
		'PER_dni',
		'PER_nombres',
		'PER_paterno',
		'PER_materno',
		'PER_sexo',
		'PER_direccion',
		'PER_telefono',
		'PER_celular',
		'PER_cargo',
		'PER_estado',
		'IDAREA',
	),
)); ?>
