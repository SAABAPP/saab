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
<<<<<<< HEAD
<?php
	$this->renderPartial('_search',array(
		'model'=>$model,
		)
	);
	$this->widget('bootstrap.widgets.TbButton', array(
		'label'=>'Crear personal',
	    'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
	    'size'=>'large', // null, 'large', 'small' or 'mini'
	    'htmlOptions'=>array('class'=>'pull-right span2'),
	    'url'=>array('create'),
	    )
	);
=======
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
>>>>>>> saabCarlos
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
	'header' => 'N° Personal',
	'value'=>'$data->IDPERSONAL',
	)
);

array_push($columns, array(
	'header' => 'Area',
	'value'=>'$data->iDAREA->ARE_nombre',
	)
);

array_push($columns, array(
	'header' => 'nombre',
	'value'=>'$data->PER_nombres',
	)
);

array_push($columns, array(
    'name' => 'buttons',
    'header' => 'Opc',
    'type' => 'raw',
    'htmlOptions' => array('class' => 'button-column'),
    'value' => function($data) {
    	return CHtml::link("<i class='icon-eye-open'></i>", array("view", 'id' => $data->IDPERSONAL));
    },
));

$this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'personal-grid',
	'dataProvider'=>$model->search(),
	'type'=>'bordered hover',
    'template'=>"{items}{pager}",
<<<<<<< HEAD
<<<<<<< HEAD
	'columns'=>array(
		'PER_dni',
		'PER_nombres',
		'PER_paterno',
		'PER_materno',
		'iDAREA.ARE_nombre',
		/*
		'PER_sexo',
		'PER_direccion',
		'PER_telefono',
		'PER_celular',
		
		'PER_estado',
		'iDAREA.',
		*/
		array(
			'header'=>'Detalles',
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>"{update}&nbsp;{add}",

		),
	),
)); ?>
=======
=======
>>>>>>> origin/saabCesar
	// 'filter'=>$model,
	'columns'=>$columns,
));
?>
<<<<<<< HEAD
>>>>>>> origin/saabCesar
=======
>>>>>>> origin/saabCesar
</div>