<?php
$this->breadcrumbs=array(
	'Requerimientos'=>array('index'),
	'Inicio',
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

<div class="search-form" >
<?php
	$this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<br/><br/><br/>
<hr>
<h3>Requerimientos</h3>
<br/>

<div class="span8 offset2">
<?php
	
	if (Yii::app()->user->checkAccess("administrador"))
    {
        echo 'HOLA';
    } else {
        echo 'ADIOS';
    }

	$this->widget('bootstrap.widgets.TbGridView',array(
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
			'header'=>'Opciones',
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
		
	),
)); ?>


</div>




