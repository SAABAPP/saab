<?php
$this->breadcrumbs=array(
	'Entradas'=>array('index'),
	'Manage',
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('entrada-grid', {
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


?>
</div><!-- search-form -->
<hr>
<h3>Lista de Ordenes de Compra:</h3>
<br/>

<div class="span8 offset2">

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'entrada-grid',
	'dataProvider'=>$model->search(),
	'type'=>'bordered hover',
    'template'=>"{items}{pager}",
	'columns'=>array(
		'IDENTRADA',
		'ENT_fecha',
		'ENT_tipo',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
</div>
