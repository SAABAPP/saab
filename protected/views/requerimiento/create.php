<?php
$this->breadcrumbs=array(
	'Requerimientos'=>array('index'),
	'Crear',
);

// $this->menu=array(
// 	array('label'=>'List Requerimiento','url'=>array('index')),
// 	array('label'=>'Manage Requerimiento','url'=>array('admin')),
// );
?>

<h1>Create Requerimiento</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'usuario'=>$usuario,'clasificador'=>$clasificador,'itemRequerimiento'=>$itemRequerimiento)); ?>