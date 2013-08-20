<?php
$this->breadcrumbs=array(
	'Cotizaciones'=>array('index'),
	'Inicio',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('cotizacion-grid', {
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
$cotizado= Yii::app()->db->createCommand()
    ->select('count(*) as cont')
    ->from('requerimiento R')
    ->join('cotizacion C', 'R.IDREQUERIMIENTO=C.IDREQUERIMIENTO')
    ->where(' R.IDREQUERIMIENTO=:id', array(':id'=>$model->IDREQUERIMIENTO))
    ->queryRow();

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
	'header' => 'Fecha',
	'value'=>'$data->REQ_fecha',
	)
);

array_push($columns, array(
    'name' => 'buttons',
    'header' => '',
    'type' => 'raw',
    'htmlOptions' => array('class' => 'button-column'),
    'value' => function($data) use($cotizado) {

        $html = "";
        switch ($cotizado) {
            case 0:
                $html .= CHtml::link("<i class='icon-pencil'></i>", array('update', 'id' => $data->id_pdido_tc), array(
                            'class' => 'btnEdit',
                            'title' => 'Editar',
                            'rel' => 'tooltip',
                        ));



                $html .= CHtml::link("<i class='icon-remove'></i>", array('changeStatus', 'id' => $data->id_pdido_tc), array(
                            'class' => 'null',
                            'title' => 'Anular',
                            'rel' => 'tooltip',
                        ));
                break;
            default:
                $html.=CHtml::link("<i class='icon-trash'></i>", array("changeStatus", 'id' => $data->id_pdido_tc), array(
                            'class' => 'delete',
                            'title' => 'Eliminar',
                            'rel' => 'tooltip',
                        ));
                break;
        }
        return $html;
    },
));


$this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'cotizacion-grid',
	'dataProvider'=>$model->search(),
	'type'=>'bordered hover',
    'template'=>"{items}",
	// 'filter'=>$model,
	'rowCssClassExpression'=>'$data->REQ_estado=="Requerido"?"info":($data->REQ_estado=="Observado"?"warning":($data->REQ_estado=="En almacen"?"warehouse":($data->REQ_estado=="Aprobado"?"success":"finalized")))',
	'columns'=>$columns,//array(
		// 'IDCOTIZACION',
		// 'COT_buenaPro',
		// 'IDREQUERIMIENTO',
		// array(
		// 	'header'=>'ciudad_id',
		// 	'value'=>'$data->ciudad->nombre',
		// 	'filter'=>Usuario::getListCiudad(),
		// ),
		// 'iDUSUARIO.iDPERSONAL.iDAREA.ARE_nombre',
		// 'REQ_fecha',
		// 'REQ_estado',
		// array(
		// 	'header'=>'Detalles',
		// 	'class'=>'bootstrap.widgets.TbButtonColumn',
		// 	'template'=>"{view} {add}",
		// ),
	// ),
));
?>
</div>