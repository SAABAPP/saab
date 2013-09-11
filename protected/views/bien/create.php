<?php
/* @var $this BienController */
/* @var $model Bien */

$this->breadcrumbs=array(
	'Bienes'=>array('index'),
	'Crear',
);
?>

<h2 class="center">Nuevo Bien</h1>
<br>

<?php echo $this->renderPartial('_form', array('model'=>$model,'catalogoBienes'=>$catalogoBienes,)); ?>