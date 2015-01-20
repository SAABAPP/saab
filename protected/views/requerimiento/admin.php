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

<ul class="pull-right inline">
    <li>
        <?php 

        $this->widget('bootstrap.widgets.TbButton', array(
            'label'=>'Nuevo Requerimiento BIEN',
            'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
            'size'=>'large', // null, 'large', 'small' or 'mini'
            'htmlOptions'=>array('class'=>'text-bolder'),
            'url'=>array('create'),
            ));
        ?>
    </li>
    <li>
        <?php
        $this->widget('bootstrap.widgets.TbButton', array(
            'label'=>'Nuevo Requerimiento SERVICIO',
            'type'=>'secondary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
            'size'=>'large', // null, 'large', 'small' or 'mini'
            'htmlOptions'=>array('class'=>'text-bolder'),
            'url'=>array('servicio'),
            ));

        ?>
    </li>
</ul>


</div><!-- search-form -->
<br/><br/>
<hr>
<h3>Requerimientos</h3>
<br/>

<div class="span8 offset2">
<div class="offset2">
<?php 
$this->widget('bootstrap.widgets.TbButton', array(
	'label'=>'Requeridos',
    'type'=>'info', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    'size'=>'small', // null, 'large', 'small' or 'mini'
    'htmlOptions'=>array('class'=>' span2'),
    'url'=>array('admin?Requerimiento[REQ_estado]=Requerido'),
    ));
$this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Observados',
    'type'=>'warning', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    'size'=>'small', // null, 'large', 'small' or 'mini'
    'htmlOptions'=>array('class'=>' span2'),
    'url'=>array('admin?Requerimiento[REQ_estado]=Observado'),
    ));
$this->widget('bootstrap.widgets.TbButton', array(
	'label'=>'Aprobados',
    'type'=>'success', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    'size'=>'small', // null, 'large', 'small' or 'mini'
    'htmlOptions'=>array('class'=>' span2'),
    'url'=>array('admin?Requerimiento[REQ_estado]=Aprobado'),
    ));
$this->widget('bootstrap.widgets.TbButton', array(
	'label'=>'Almacenado',
    'type'=>'danger', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    'size'=>'small', // null, 'large', 'small' or 'mini'
    'htmlOptions'=>array('class'=>' span2'),
    'url'=>array('admin?Requerimiento[REQ_estado]=En almacen'),
    ));
$this->widget('bootstrap.widgets.TbButton', array(
	'label'=>'Finalizados',
    'type'=>'inverse', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    'size'=>'small', // null, 'large', 'small' or 'mini'
    'htmlOptions'=>array('class'=>' span2'),
    'url'=>array('admin?Requerimiento[REQ_estado]=Finalizado'),
    ));
echo '<br><br>';
?>
</div>
<br>
<?php
$columns=array();

array_push($columns, array(
	'header' => 'N°',
	'value'=>'$data->IDREQUERIMIENTO',
	)
);

// array_push($columns, array(
// 	'header' => 'Oficina',
// 	'value'=>'$data->iDUSUARIO->iDPERSONAL->iDAREA->ARE_nombre',
// 	)
// );

array_push($columns, array(
    'header' => 'Oficina',
    'value'=>'$data->REQ_oficina',
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
        if($data->REQ_estado=='Requerido' || $data->REQ_estado=='Necesitado'){
            $html .= CHtml::link("<i class='icon-plus'></i>", array('view', 'id' => $data->IDREQUERIMIENTO), array('title' => 'Verificar',));
            $html.='&nbsp;'.CHtml::link("<i class='icon-pencil'></i>", array('update', 'id' => $data->IDREQUERIMIENTO), array('title' => 'Actualizar',));             
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
	'rowCssClassExpression'=>'$data->REQ_estado=="Requerido"?"info":($data->REQ_estado=="Necesitado"?"warning":($data->REQ_estado=="En almacen"?"warehouse":($data->REQ_estado=="Aprobado"?"success":"finalized")))',
	'columns'=>$columns,
));
?>


</div>




