<?php
$this->breadcrumbs=array(
	'N.E.A.'=>array('index'),
	'Inicio',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('nea-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="search-form row-fluid" >
<?php
$this->renderPartial('_search',array(
	'model'=>$model,
	));

$this->widget('bootstrap.widgets.TbButton', array(
	'label'=>'Crear N.E.A.',
    'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    'size'=>'large', // null, 'large', 'small' or 'mini'
    'htmlOptions'=>array('class'=>'pull-right'),
    'url'=>array('create'),
    ));
?>
</div><!-- search-form -->
<hr>
<h3>Nota Entrada Almacén</h3>
<br/>

<div class="span8 offset2">
<?php
$this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'nea-grid',
	'dataProvider'=>$model->search(),
	'type'=>'bordered hover',
    'template'=>"{items}{pager}",
	// 'filter'=>$model,
	'columns'=>array(
		'IDENTRADA',
		'nea.NEA_procedencia',
		'ENT_fecha',
		array(
			'header'=>'Detalles',
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>"{view}",
		),
	),
));
?>
</div>




