<?php

$this->breadcrumbs=array(
	'Bienes'=>array('index'),
	'Bien N° '.$model->IDBIEN,
);
?>

<h1>Bien #<?php echo $model->IDBIEN; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'IDBIEN',
		'BIE_stockActual',
		'BIE_stockMinimo',
		'BIE_caracteristica',
		'BIE_marca',
		'IDCATALOGO',
	),
)); ?>
<br>
<a class="btn inline secundario" type="button" href="admin">Regresar</a>