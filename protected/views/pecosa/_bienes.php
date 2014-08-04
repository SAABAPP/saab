
<?php
$columns=array();
$i=0;
$dataProvider=$pecosaBien->search();

array_push($columns, array(
	'header' => 'N°',
	'value' => function($data) use(&$i){
		return ++$i;
	},
	)
);


array_push($columns, array(
	'header' => 'Descripcion',
	'value' => '$data->iDBIEN->iDCATALOGO->CAT_descripcion',
	)
);

array_push($columns, array(
	'header' => 'Unidad',
	'value' => '$data->iDBIEN->iDCATALOGO->CAT_unidad',
	)
);

array_push($columns, array(
	'header' => 'Cantidad',
	'htmlOptions'=>array('width'=>'1em'),
	'value' => '$data->PBI_cantidad',

	)
);


$valor='valor';

array_push($columns, array(
	'header'=>'P. Unitario (S/.)',
	'htmlOptions'=>array('width'=>'5em'),
	'value' => '$data->PBI_precioVenta',
	'type' => 'raw',
	// 'footer'=>$valor,
	)
);

array_push($columns, array(
	'header'=>'Total',
	'htmlOptions'=>array('width'=>'5em'),
	'type' => 'raw',
	'value' => function($data){
		return $data->PBI_precioVenta*$data->PBI_cantidad;

	},
	)
);




?>
<hr>
<h3>detalles de los bienes</h3>
<br>

<?php

$this->widget('bootstrap.widgets.TbGridView', array(
	'type'=>'bordered',
	'dataProvider'=>$dataProvider,
	'template'=>"{items}",
	'columns'=>$columns,
	)
);
?>