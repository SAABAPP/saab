<?php
$this->breadcrumbs=array(
	'Kardex'=>array('index'),
	'Inicio',
);

$this->menu=array(
	array('label'=>'List Kardex','url'=>array('index')),
	array('label'=>'Create Kardex','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('kardex-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>


<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'kardex-grid',
	'dataProvider'=>$model->search(),
	'type'=>'bordered hover',
    'template'=>"{items}{pager}",
	'columns'=>array(
		
		'KAR_fechaMovimiento',
		'KAR_detalle',
		'IDENTRADABIEN',
		'IDENTRADA',
		'IDPECOSABIEN',
		'IDPECOSA',
		
		// array(
		// 	'class'=>'bootstrap.widgets.TbButtonColumn',
		// ),
	),
)); ?>
