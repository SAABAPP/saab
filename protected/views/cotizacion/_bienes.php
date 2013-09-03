<?php
$columns=array();
$i=0;
$dataProvider=$requerimiento_bien->search();

array_push($columns, array(
	'header' => 'N°',
	'value' => function($data) use(&$i){
		return ++$i;
	},
	)
);


array_push($columns, array(
	'header' => 'Bien',
	'value'=>'$data->bien->iDCATALOGO->CAT_descripcion',
	)
);

array_push($columns, array(
	'header' => 'Unidad',
	'value'=>'$data->bien->iDCATALOGO->CAT_unidad',
	)
);

array_push($columns, array(
	'header' => 'Cantidad',
	'value'=>'$data->RBI_cantidad',
	)
);

array_push($columns, array(
	'header'=>'Precio unitario',
	'type' => 'raw',
	'value' => function($data) {
		return CHtml::textField('precioUnitario');
	},
	)
);

// array_push($columns, array(
// 	'header' => 'Sub Total',
// 	'value'=>'',
// 	)
// );
?>
<hr>
<br>
<h3>Ingresar los precios unitarios de los bienes</h3>
<br>
<!-- <div class="control-group pull-right">
	<label class="control-label" for="ruc">R.U.C.:</label>
	<div class="controls"><p>gggg</p></div>
</div>
<div class="control-group">
	<label class="control-label" for="solicitante">Señor(es):</label>
	<div class="controls"><p>11111111111</p></div>
</div> -->
<?php

$this->widget('bootstrap.widgets.TbGridView', array(
	'type'=>'bordered',
	'dataProvider'=>$dataProvider,
	'template'=>"{items}",
	'columns'=>$columns,
	)
);
?>