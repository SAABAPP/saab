<?php
$this->breadcrumbs=array(
	'Requerimientos'=>array('index'),
	'Crear',
);


?>

<h2 class="center">Hoja de Requerimiento Bienes</h1>
<br>

<?php echo $this->renderPartial('_form', array('model'=>$model,'usuario'=>$usuario,'clasificador'=>$clasificador,'catalogo'=>$catalogo,'meta'=>$meta)); ?>
