<?php
$this->breadcrumbs=array(
	'Personal'=>array('index'),
	'Inicio',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#personal-grid').yiiGridView('update', {
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
	
	 $this->widget('bootstrap.widgets.TbButton', array(
	'label'=>'Crear Personal',
    'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    'size'=>'large', // null, 'large', 'small' or 'mini'
    'htmlOptions'=>array('class'=>'pull-right span2'),
    'url'=>array('create'),
    ));

?>
</div><!-- search-form -->
<br/><br/>
<hr>
<h3>Mantenedor Personal</h3>
<br/>
<div class="span8 offset2">
<?php
$columns=array();

array_push($columns, array(
	'header' => 'N° DNI',
	'value'=>'$data->PER_dni',
	)
);

array_push($columns, array(
	'header' => 'Area',
	'value'=>'$data->iDAREA->ARE_nombre',
	)
);

array_push($columns, array(
	'header' => 'Nombres',
	'value'=>'$data->PER_nombres',
	)
);
array_push($columns, array(
	'header' => 'Apellido Paterno',
	'value'=>'$data->PER_paterno',
	)
);
array_push($columns, array(
	'header' => 'Apellido Materno',
	'value'=>'$data->PER_materno',
	)
);

array_push($columns, array(
    'name' => 'buttons',
    'header' => 'Estado',
    'type' => 'raw',
    'htmlOptions' => array('class' => 'button-column'),
    'value' => function($data) {

    	$estado=$data->PER_estado;

    	if (!$estado) {
    		$html="<i class='icon-user text-danger' style='font-size:16px'></i>";
    	}else{
    		$html="<i class='icon-user text-success' style='font-size:16px'></i>";
    	}
    	
    	
    	return $html;
    },
));

array_push($columns, array(
    'name' => 'buttons',
    'header' => 'Opciones',
    'type' => 'raw',
    'htmlOptions' => array('class' => 'button-column'),
    'value' => function($data) {

    	$html=CHtml::link("<i class='icon-pencil' style='font-size:16px'></i>", array("update", 'id' => $data->IDPERSONAL));

    	$estado=$data->PER_estado;

    	if (!$estado) {
    		$html.=CHtml::link("&nbsp;&nbsp;<i class='icon-check text-success' style='font-size:16px'></i>", array("on", 'id' => $data->IDPERSONAL));
    	}else{
    		$html.=CHtml::link("&nbsp;&nbsp;<i class='icon-ban-circle text-danger' style='font-size:16px'></i>", array("off", 'id' => $data->IDPERSONAL));
    	}

    	return $html;
    },
));

$this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'personal-grid',
	'dataProvider'=>$model->search(),
	'type'=>'bordered hover',
        'template'=>"{items}{pager}",
        'columns'=>$columns,
	// 'columns'=>array(
	// 	'PER_dni',
	// 	'PER_nombres',
	// 	'PER_paterno',
	// 	'PER_materno',
	// 	'iDAREA.ARE_nombre',
		
	// 	'PER_sexo',
	// 	'PER_direccion',
	// 	'PER_telefono',
	// 	'PER_celular',
		
	// 	'PER_estado',
	// 	'iDAREA.',
		
	// 	array(
	// 		'header'=>'Detalles',
	// 		'class'=>'bootstrap.widgets.TbButtonColumn',
	// 		'template'=>"{update}&nbsp;{add}",

	// 	),
	// ),
)); ?>

</div>
