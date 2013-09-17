<?php
$this->breadcrumbs=array(
	'Personal'=>array('index'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'List Personal','url'=>array('index')),
	array('label'=>'Manage Personal','url'=>array('admin')),
);
?>

<h2 class="text-center">Nuevo Personal</h2>
<br>

<?php echo $this->renderPartial('_form', array('model'=>$model,'usuario'=>$usuario)); ?>