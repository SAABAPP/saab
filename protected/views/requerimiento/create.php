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

<<<<<<< HEAD
<h1>Crear Requerimiento</h1><br>

=======
<h2 class="center">Hoja de Requerimiento</h1>
<br>
>>>>>>> origin/saabDavid

<?php echo $this->renderPartial('_form', array('model'=>$model,'usuario'=>$usuario,'clasificador'=>$clasificador,'catalogo'=>$catalogo,'meta'=>$meta)); ?>
