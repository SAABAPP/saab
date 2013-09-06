<?php
$this->breadcrumbs=array(
	'Pecosas'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Pecosa','url'=>array('index')),
	array('label'=>'Create Pecosa','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('pecosa-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Pecosas</h1>



<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'pecosa-grid',
	'dataProvider'=>$model->search(),
	'type'=>'bordered hover',
    'template'=>"{items}{pager}",
	'columns'=>array(
		'IDPECOSA',
		'PEC_fecha',
		'PEC_referencia',
		'IDUSUARIO',
		'IDREQUERIMIENTO',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
