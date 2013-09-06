<?php
$this->breadcrumbs=array(
	'Requerimientos'=>array('index'),
	'Inicio',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('requerimiento-grid', {
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
	'label'=>'Crear requerimiento',
    'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    'size'=>'large', // null, 'large', 'small' or 'mini'
    'htmlOptions'=>array('class'=>'pull-right'),
    'url'=>array('create'),
    ));
?>
</div><!-- search-form -->
<br/><br/>
<hr>
<h3>Requerimientos</h3>
<br/>

<div class="span8 offset2">
<?php
$this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'requerimiento-grid',
	'dataProvider'=>$model->search(),
	'type'=>'bordered hover',
    'template'=>"{items}{pager}",
	// 'filter'=>$model,
	'rowCssClassExpression'=>'$data->REQ_estado=="Requerido"?"info":($data->REQ_estado=="Observado"?"warning":($data->REQ_estado=="En almacen"?"warehouse":($data->REQ_estado=="Aprobado"?"success":"finalized")))',
	'columns'=>array(
		'IDREQUERIMIENTO',
		'iDUSUARIO.iDPERSONAL.iDAREA.ARE_nombre',
		'REQ_fecha',
		'REQ_estado',		
		// 'REQ_presupuesto',		
		array(
			'header'=>'Detalles',
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>"{view}",
			// hacer que el boton update salga cuando estado=observado
		),
		
	),
));
?>


</div>




