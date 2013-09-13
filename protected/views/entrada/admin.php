<?php
$this->breadcrumbs=array(
	'Entradas'=>array('index'),
	'Inicio',
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

<?php 

$columns=array();

array_push($columns, array(
	'header' => 'N°',
	'value'=>'$data->IDREQUERIMIENTO',
	)
);

array_push($columns, array(
	'header' => 'Oficina',
	'value'=>'$data->iDREQUERIMIENTO->iDUSUARIO->iDPERSONAL->iDAREA->ARE_nombre',
	)
);

array_push($columns, array(
	'header' => 'Fecha',
	'value'=>'$data->iDREQUERIMIENTO->REQ_fecha',
	)
);

array_push($columns, array(
	'header' => 'Estado',
	'value'=>'$data->iDREQUERIMIENTO->REQ_estado',
	)
);


array_push($columns, array(
    'name' => 'buttons',
    'header' => 'Opc',
    'type' => 'raw',
    'htmlOptions' => array('class' => 'button-column'),
    'value' => function($data) {
        $html = "";
        if($data->iDREQUERIMIENTO->REQ_estado=='Aprobado'){
            $html .= CHtml::link("<i class='icon-plus'></i>", array('create', 'id' => $data->IDORDENCOMPRA), array('title' => 'Añadir',));             
        }
        else
            $html .= CHtml::link("<i class='icon-eye-open'></i>", array('view', 'id' => $data->IDORDENCOMPRA), array('title' => 'Añadir',));        	
        return $html;
    },
));



$this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'entrada-grid',
	'dataProvider'=>$model->search(),
	'type'=>'bordered hover',
    'template'=>"{items}{pager}",
    'rowCssClassExpression'=>'$data->iDREQUERIMIENTO->REQ_estado=="Requerido"?"info":($data->iDREQUERIMIENTO->REQ_estado=="Observado"?"warning":($data->iDREQUERIMIENTO->REQ_estado=="En almacen"?"warehouse":($data->iDREQUERIMIENTO->REQ_estado=="Aprobado"?"success":"finalized")))',
	'columns'=>$columns,
)); ?>
</div>
