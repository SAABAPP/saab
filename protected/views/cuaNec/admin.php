<?php
$this->breadcrumbs=array(
	'Cuadro Necesidades'=>array('index'),
	'Inicio',
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('cua-nec-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>


<h3>Necesidades</h3><br>

<div class="search-form" >
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); 

$this->widget('bootstrap.widgets.TbButton', array(
	'label'=>'Necesidad BIEN',
    'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    'size'=>'large', // null, 'large', 'small' or 'mini'
    'htmlOptions'=>array('class'=>'pull-right span2'),
    'url'=>array('create'),
    ));
$this->widget('bootstrap.widgets.TbButton', array(
	'label'=>'Necesidad SERVICIO',
    'type'=>'secondary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    'size'=>'large', // null, 'large', 'small' or 'mini'
    'htmlOptions'=>array('class'=>'pull-right span2'),
    'url'=>array('servicio'),
    ));



?>

</div><!-- search-form -->
<br><br><hr>

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
        if($data->REQ_estado=='Requerido'){
            $html .= CHtml::link("<i class='icon-pencil'></i>", array('view', 'id' => $data->IDREQUERIMIENTO), array('title' => 'Verificar',));             
        }
        else{
        	$html .= CHtml::link("<i class='icon-eye-open'></i>", array('view', 'id' => $data->IDREQUERIMIENTO), array('title' => 'Verificar',)); 
        	
        }
        return $html;
    },
));

$this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'requerimiento-grid',
	'dataProvider'=>$model->search(),
	'type'=>'bordered hover',
    'template'=>"{items}{pager}",
	// 'filter'=>$model,
	'rowCssClassExpression'=>'$data->REQ_estado=="Requerido"?"info":($data->REQ_estado=="Observado"?"warning":($data->REQ_estado=="En almacen"?"warehouse":($data->REQ_estado=="Aprobado"?"success":"finalized")))',
	'columns'=>$columns,
));
?>


</div>
