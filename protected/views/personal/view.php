<?php

$this->breadcrumbs=array(
	'Personals'=>array('index'),
	'Personal N° '.$model->IDPERSONAL,
);
?>

<h1>Ver Bien #<?php echo $model->IDBIEN; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'IDPERSONAL',
		'PER_dni',
		'PER_nombres',
		'PER_paterno',
		'PER_materno',
		'IDAREA',
	),
)); ?>
