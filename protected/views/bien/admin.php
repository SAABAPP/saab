<?php
$this->breadcrumbs=array(
	'Bienes'=>array('index'),
	'Inicio',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#bien-grid').yiiGridView('update', {
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
	'label'=>'Crear bien',
    'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    'size'=>'large', // null, 'large', 'small' or 'mini'
    'htmlOptions'=>array('class'=>'pull-right span2'),
    'url'=>array('create'),
    ));
?>
</div><!-- search-form -->
<br/><br/>
<hr>
<h3>Bienes</h3>
<br/>

<div class="span10 offset1">
<?php
$columns=array();

array_push($columns, array(
	'header' => 'N°',
	'value'=>'$data->IDBIEN',
	)
);

array_push($columns, array(
	'header' => 'Catalogo',
	'value'=>'$data->iDCATALOGO->CAT_descripcion',
	)
);

array_push($columns, array(
	'header' => 'Unidad',
	'value'=>'$data->iDCATALOGO->CAT_unidad',
	)
);

array_push($columns, array(
    'name' => 'buttons',
    'header' => 'Opc',
    'type' => 'raw',
    'htmlOptions' => array('class' => 'button-column'),
    'value' => function($data) {
    	return CHtml::link("<i class='icon-eye-open'></i>", array("view", 'id' => $data->IDBIEN));
    },
));

$this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'cotizacion-grid',
	'dataProvider'=>$model->search(),
	'type'=>'bordered hover',
    'template'=>"{items}{pager}",
	// 'filter'=>$model,
	'columns'=>$columns,
));
?>
</div>
