<?php
$this->breadcrumbs=array(
	'Personals'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Personal','url'=>array('index')),
	array('label'=>'Create Personal','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('personal-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Personals</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'personal-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'IDPERSONAL',
		'PER_idResponsable',
		'PER_dni',
		'PER_nombres',
		'PER_paterno',
		'PER_materno',
		/*
		'PER_sexo',
		'PER_direccion',
		'PER_telefono',
		'PER_celular',
		'PER_cargo',
		'PER_estado',
		'IDAREA',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
