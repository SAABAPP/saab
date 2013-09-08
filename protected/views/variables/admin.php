<?php
$this->breadcrumbs=array(
	'Variables'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'List Variables','url'=>array('index')),
	array('label'=>'Create Variables','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('variables-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>


<div class="search-form" >
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<br/><br/>
<hr>
<h3>Variables</h3>
<br/>

<div class="span8 offset2">
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'variables-grid',
	'dataProvider'=>$model->search(),
	'type'=>'bordered hover',
    'template'=>"{items}{pager}",
	'columns'=>array(
		'IDVARIABLE',
		'VAR_descripcion',
		'VAR_valor',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>"{update}{add}",
		),
	),
)); ?>
</div>
