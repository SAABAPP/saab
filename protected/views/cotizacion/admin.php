<?php
$this->breadcrumbs=array(
	'Cotizaciones'=>array('index'),
	'Inicio',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('cotizacion-grid', {
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
<h3>Requerimientos</h3>
<br/>

<div class="span8 offset2">
<?php
$columns=array();
// $cotizado= Yii::app()->db->createCommand('select count(*) from requerimiento R
// inner join requerimiento_bien RB
// on R.IDREQUERIMIENTO=RB.IDREQUERIMIENTO
// where R.IDREQUERIMIENTO=11')->queryAll();
// foreach ($cotizado as $c) {
// 	echo $c;
// }
array_push($columns, array(
	'header' => 'N°',
	'value'=>'$data->IDREQUERIMIENTO',
	)
);

array_push($columns, array(
	'header' => 'Oficina',
	'value'=>'$data->iDUSUARIO->iDPERSONAL->iDAREA->ARE_nombre',
	)
);

array_push($columns, array(
	'header' => 'Fecha',
	'value'=>'$data->REQ_fecha',
	)
);

array_push($columns, array(
	'header' => 'Estado',
	'value'=>'$data->REQ_estado',
	)
);

array_push($columns, array(
	'header' => 'Fecha',
	'value'=>'$data->REQ_fecha',
	)
);

$this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'cotizacion-grid',
	'dataProvider'=>$model->search(),
	'type'=>'bordered hover',
    'template'=>"{items}",
	// 'filter'=>$model,
	'rowCssClassExpression'=>'$data->REQ_estado=="Requerido"?"info":($data->REQ_estado=="Observado"?"warning":($data->REQ_estado=="En almacen"?"warehouse":($data->REQ_estado=="Aprobado"?"success":"finalized")))',
	'columns'=>$columns,//array(
		// 'IDCOTIZACION',
		// 'COT_buenaPro',
		// 'IDREQUERIMIENTO',
		// array(
		// 	'header'=>'ciudad_id',
		// 	'value'=>'$data->ciudad->nombre',
		// 	'filter'=>Usuario::getListCiudad(),
		// ),
		// 'iDUSUARIO.iDPERSONAL.iDAREA.ARE_nombre',
		// 'REQ_fecha',
		// 'REQ_estado',
		// array(
		// 	'header'=>'Detalles',
		// 	'class'=>'bootstrap.widgets.TbButtonColumn',
		// 	'template'=>"{view} {add}",
		// ),
	// ),
));
?>
</div>