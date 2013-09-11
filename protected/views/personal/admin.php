<?php
$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	'Inicio',
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




<div class="search-form" >
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<br/><br/>
<hr>
<h3>Personal</h3>
<br/>

<div class="span8 offset2">
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'personal-grid',
	'dataProvider'=>$model->search(),
	// 'filter'=>$model,
	'type'=>'bordered hover',
    'template'=>"{items}{pager}",
	'columns'=>array(
		'PER_dni',
		'PER_nombres',
		'PER_paterno',
		'PER_materno',
		'usuarios.USU_usuario',
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
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
</div>