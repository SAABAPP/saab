<?php
$this->breadcrumbs=array(
	'Requerimientos'=>array('index'),
	$model->IDREQUERIMIENTO=>array('view','id'=>$model->IDREQUERIMIENTO),
	'Modificar',
);


?>



<?php 

if ($model->TIPO=='b') {
	echo '<h2 class="center">Hoja de Requerimiento Bien N°'.$model->IDREQUERIMIENTO .' </h1><br>';
echo $this->renderPartial('_form', array('model'=>$model,'usuario'=>$usuario,'clasificador'=>$clasificador,'catalogo'=>$catalogo,'meta'=>$meta)); 	
}
else{

echo $this->renderPartial('servicio', array('model'=>$model,'usuario'=>$usuario,'clasificador'=>$clasificador,'catalogo'=>$catalogo,'meta'=>$meta)); 	
}



?>