
<?php
$columns=array();
$i=0;
$dataProvider=$detalleOC->search();

array_push($columns, array(
	'header' => 'N°',
	'value' => function($data) use(&$i){
		return ++$i;
	},
	)
);


array_push($columns, array(
	'header' => 'Bien',
	'value' => function($data) {		
		$bien=Bien::model()->findByAttributes(array('IDBIEN'=>$data->DOC_bien));
		$catalogo=Catalogo::model()->findByAttributes(array('IDCATALOGO'=>$bien->IDCATALOGO));
		return $catalogo->CAT_descripcion;
	},
	)
);

array_push($columns, array(
	'header' => 'Unidad',
	'value' => function($data) {		
		$bien=Bien::model()->findByAttributes(array('IDBIEN'=>$data->DOC_bien));
		$catalogo=Catalogo::model()->findByAttributes(array('IDCATALOGO'=>$bien->IDCATALOGO));
		return $catalogo->CAT_unidad;
	},
	)
);

array_push($columns, array(
	'header' => 'Cantidad',
	'htmlOptions'=>array('width'=>'1em'),
	'value' => '$data->DOC_cantidad',
	)
);

// array_push($columns, array(
// 	'header'=>'Código bien',
// 	'htmlOptions'=>array('width'=>'1em'),
// 	'value' => '$data->DOC_bien',
// 	)
// );

array_push($columns, array(
	'header'=>'P. Unitario (S/.)',
	'htmlOptions'=>array('width'=>'5em'),
	'value' => '$data->DOC_precioUnitario',
	)
);

array_push($columns, array(
	'header'=>'Características',
	'htmlOptions'=>array('width'=>'10em'),
	'type' => 'raw',
	'value' => '$data->DOC_caracteristica',
	)
);

array_push($columns, array(
	'header'=>'Marca',
	'htmlOptions'=>array('width'=>'10em'),
	'type' => 'raw',
	'value' => '$data->DOC_marca',
	)
);


?>
<hr>
<br>
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