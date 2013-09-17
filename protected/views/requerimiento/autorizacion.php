<?php
$this->breadcrumbs=array(
	'Requerimientos'=>array('index'),
	'Inicio',
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
	));

?>
</div><!-- search-form -->
<br/><br/>
<hr>
<h3>Requerimientos</h3>
<br/>

<div class="span8 offset2">
<?php
$columns=array();

array_push($columns, array(
	'header' => 'N°',
	'value'=>'$data->IDREQUERIMIENTO',
	)
);

array_push($columns, array(
	'header' => 'Oficina',
	'value'=>'$data->iDUSUARIO->iDPERSONAL->iDAREA->ARE_nombre',
	)
);

array_push($columns, array(
	'header' => 'Fecha',
	'value'=>'$data->REQ_fecha',
	)
);

array_push($columns, array(
	'header' => 'Estado',
	'value'=>'$data->REQ_estado',
	)
);


array_push($columns, array(
    'name' => 'buttons',
    'header' => 'Opc',
    'type' => 'raw',
    'htmlOptions' => array('class' => 'button-column'),
    'value' => function($data) {
        $html = "";
        
            $html .= CHtml::link("<i class='icon-plus'></i>", array('generarSalida', 'id' => $data->IDREQUERIMIENTO), array('title' => 'Verificar',));             
        
        return $html;
    },
));

$this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'requerimiento-grid',
	'dataProvider'=>$model->search(),
	'type'=>'bordered hover',
    'template'=>"{items}{pager}",
	// 'filter'=>$model,
	'rowCssClassExpression'=>'$data->REQ_estado=="Requerido"?"info":($data->REQ_estado=="Necesitado"?"warning":($data->REQ_estado=="En almacen"?"warehouse":($data->REQ_estado=="Aprobado"?"success":"finalized")))',
	'columns'=>$columns,
));
?>


</div>