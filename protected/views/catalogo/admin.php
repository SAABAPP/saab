<?php
$this->breadcrumbs=array(
	'Catalogos'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Catalogo','url'=>array('index')),
	array('label'=>'Create Catalogo','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('catalogo-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>


<div class="search-form" >
<?php $this->renderPartial('_search',array(
	'catalogo'=>$catalogo,
)); ?>
</div><!-- search-form -->
<br/><br/>
<hr>
<h3>Catalogo</h3>
<br/>

<div class="span8 offset2">
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'catalogo-grid',
	'dataProvider'=>$catalogo->search(),
	'filter'=>$catalogo,
	'type'=>'bordered hover',
    'template'=>"{items}{pager}",
	'columns'=>array(
		'CAT_codigo',
		'CAT_descripcion',
		'CAT_unidad',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template' => '{update}{add}{view}',
		),
	),
)); ?>
</div>