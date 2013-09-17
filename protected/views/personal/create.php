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

<<<<<<< HEAD
<h1>Crear Personal</h1>
=======
<h2 class="text-center">Nuevo Personal</h2>
<br>
>>>>>>> saabCarlos

<?php echo $this->renderPartial('_form', array('model'=>$model,'usuario'=>$usuario)); ?>
