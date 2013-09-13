
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
	'header' => 'Servicio',
	'type' => 'raw',
	'value' => function($data) {		
		$servicio=Servicio::model()->findByAttributes(array('IDSERVICIO'=>$data->DOC_bien));
		$catalogo=Catalogo::model()->findByAttributes(array('IDCATALOGO'=>$servicio->IDCATALOGO));
		return '<label>'.$catalogo->CAT_descripcion.'</label>';
	},
	)
);




// array_push($columns, array(
// 	'header'=>'Código Servicio',
// 	'htmlOptions'=>array('width'=>'1em'),
// 	'value' => '$data->DOC_bien'
// 	)
// );

array_push($columns, array(
	'header'=>'P. Unitario (S/.)',
	'htmlOptions'=>array('width'=>'5em'),
	'type' => 'raw',
	'value' => '$data->DOC_precioUnitario'
	)
);

array_push($columns, array(
	'header'=>'Características',
	'htmlOptions'=>array('width'=>'10em'),
	'value' => '$data->DOC_caracteristica',
	)
);




?>
<hr>
<br>
<h3>detalles de los servicios</h3>
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