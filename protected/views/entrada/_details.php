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
	'htmlOptions'=>array('width'=>'1em'),
	'value'=>'$data->RBI_cantidad',
	)
);

array_push($columns, array(
	'header'=>'Conforme',
	'htmlOptions'=>array('width'=>'1em'),
	'type' => 'raw',
	'value' => function($data) {
		return '<input type="checkbox" id="'.$data->bien->iDCATALOGO->IDCATALOGO.'" >';
	},
	)
);


?>

<?php

$this->widget('bootstrap.widgets.TbGridView', array(
	'type'=>'bordered',
	'dataProvider'=>$dataProvider,
	'template'=>"{items}",
	'columns'=>$columns,
	)
);
?>