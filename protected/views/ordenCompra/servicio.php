<?php
$this->breadcrumbs=array(
	'Ordenes de Servicio'=>array('servicio'),
	'Inicio',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('ordenCommpra-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="search-form" >
<?php
$this->renderPartial('_search',array(
	'model'=>$model,
	));
?>
</div><!-- search-form -->
<br/><br/>
<hr>
<h3>Órdenes de Servicio</h3>
<br/>

<div class="span8 offset2">
<?php
$this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'ordenCommpra-grid',
	'dataProvider'=>$model->search(),
	'type'=>'bordered hover',
    'template'=>"{items}",
	// 'filter'=>$model,
	// 'rowCssClassExpression'=>'$data->REQ_estado=="Requerido"?"info":($data->REQ_estado=="Observado"?"warning":($data->REQ_estado=="En almacen"?"warehouse":($data->REQ_estado=="Aprobado"?"success":"finalized")))',
	'columns'=>array(
		'OC_NroOrdenCompra',
		'IDREQUERIMIENTO',
		'iDREQUERIMIENTO.iDUSUARIO.iDPERSONAL.iDAREA.ARE_nombre',
		'OC_fecha',	
		// 'REQ_presupuesto',
		array(
			'header'=>'Detalles',
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>"{view}",
		),
	),
));
?>


</div>

