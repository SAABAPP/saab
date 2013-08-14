<?php
$this->breadcrumbs=array(
	'Requerimientos'=>array('index'),
	'Requerimiento N° '.$model->IDREQUERIMIENTO,
);
?>

<h2 class ="center">Hoja de Requerimiento</h2>
<h3 class="center">N° <?php echo $model->IDREQUERIMIENTO; ?></h3>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'IDREQUERIMIENTO',
		'REQ_estado',
		'REQ_fecha',
		'REQ_presupuesto',
		'IDUSUARIO',
		'CODMETA',
		'IDCUANEC',
	),
)); ?>
