<?php
$this->breadcrumbs=array(
	'Metas'=>array('index'),
	'Manage',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#meta-grid').yiiGridView('update', {
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
		)
	);
	$this->widget('bootstrap.widgets.TbButton', array(
		'label'=>'Crear Meta',
	    'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
	    'size'=>'large', // null, 'large', 'small' or 'mini'
	    'htmlOptions'=>array('class'=>'pull-right span2'),
	    'url'=>array('create'),
	    )
	);
?>
</div><!-- search-form -->
<br/><br/>
<hr>
<h3>Mantenedor Meta</h3>
<br/>
<div class="span8 offset2">
<?php
$columns=array();

array_push($columns, array(
	'header' => 'N° Meta',
	'value'=>'$data->CODMETA',
	)
);

array_push($columns, array(
	'header' => 'Area',
	'value'=>'$data->MET_descripcion',
	)
);

array_push($columns, array(
    'name' => 'buttons',
    'header' => 'Opc',
    'type' => 'raw',
    'htmlOptions' => array('class' => 'button-column'),
    'value' => function($data) {
    	return CHtml::link("<i class='icon-eye-open'></i>", array("view", 'id' => $data->CODMETA));
    },
));

$this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'meta-grid',
	'dataProvider'=>$model->search(),
	'type'=>'bordered hover',
    'template'=>"{items}{pager}",
	// 'filter'=>$model,
	'columns'=>$columns,
));
?>
</div>
