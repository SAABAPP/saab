<?php
$this->breadcrumbs=array(
	'Requerimientos'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Create Requerimiento','url'=>array('create'),'itemOptions'=>array('class'=>'btn btn-large btn-primary'))
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



<h3>Requerimientos</h3>

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
