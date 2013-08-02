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


<div class="search-form" >
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<br/>
<br/>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'requerimiento-grid',
	'dataProvider'=>$model->search(),
	'type'=>'striped bordered condensed',
    'template'=>"{items}",
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
