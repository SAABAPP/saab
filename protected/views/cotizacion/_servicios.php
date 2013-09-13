
<?php
$columns=array();
$i=0;
$dataProvider=$requerimiento_servicio->search();

array_push($columns, array(
	'header' => 'N°',
	'value' => function($data) use(&$i){
		return ++$i;
	},
	)
);


array_push($columns, array(
	'header' => 'Servicio',
	'value'=>'$data->servicio->iDCATALOGO->CAT_descripcion',
	)
);




array_push($columns, array(
	'header'=>'Código Servicio',
	'htmlOptions'=>array('width'=>'1em'),
	'type' => 'raw',
	'value' => function($data) {
		return CHtml::textField('codbien[]',$data->servicio->IDSERVICIO,array('style'=>'width:5em;','disabled'=>'true'));
	},
	)
);

array_push($columns, array(
	'header'=>'Precio unitario',
	'htmlOptions'=>array('width'=>'1em'),
	'type' => 'raw',
	'value' => function($data) {
		return CHtml::textField('precioUnitario[]','',array('style'=>'width:6em;','pattern'=>'[0-9]+(\.[0-9]{1,4}?)?'));
	},
	)
);

array_push($columns, array(
	'header'=>'Características',
	'htmlOptions'=>array('width'=>'10em'),
	'type' => 'raw',
	'value' => function($data) {
		return CHtml::textField('caracteristica[]',$data->RSE_detalle,array('style'=>'width:10em;','disabled'=>'true'));
	},
	)
);




?>
<hr>
<br>
<h3>Ingresar los detalles de los servicios</h3>
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