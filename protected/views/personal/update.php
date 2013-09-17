<?php
$this->breadcrumbs=array(
	'Personal'=>array('index'),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'List Personal','url'=>array('index')),
	array('label'=>'Create Personal','url'=>array('create')),
	array('label'=>'View Personal','url'=>array('view','id'=>$model->IDPERSONAL)),
	array('label'=>'Manage Personal','url'=>array('admin')),
);
?>

<h2 class="text-center">Actualizar Personal</h2><br>

<?php echo $this->renderPartial('_form',array('model'=>$model,'usuario'=>$usuario)); ?>