<?php
$this->breadcrumbs=array(
	'Requerimientos'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Requerimiento','url'=>array('index')),
	array('label'=>'Create Requerimiento','url'=>array('create')),
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



<h1>Manage Requerimientos</h1>



<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'requerimiento-grid',
	'dataProvider'=>$model->search(),
	// 'filter'=>$model,
	'columns'=>array(

		'IDREQUERIMIENTO',
		'iDUSUARIO.iDPERSONAL.iDAREA.ARE_nombre',
		'REQ_fecha',
		'REQ_estado',
		
		// 'REQ_presupuesto',
		
		
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
