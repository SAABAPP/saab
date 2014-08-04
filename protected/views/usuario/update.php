<?php
$this->breadcrumbs=array(
	'Usuario'=>array('index'),
	// $model->IDUSUARIO=>array('view','id'=>$model->IDUSUARIO),
	'Actualizar',
);


?>

<h2>Actualizar Datos Usuario</h2>
<br>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>