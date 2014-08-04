<?php
$this->breadcrumbs=array(
	'PECOSA'=>array('index'),
	'Inicio',
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('pecosa-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>


<div class="search-form row-fluid" >
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'type'=>'vertical',
)); ?>


	<div class="span8 input-append">
		<?php echo $form->textFieldRow($model,'PEC_NroPecosa',
			array(
				'class'=>'span4',
				'placeholder' => 'N° de PECOSA',
				'labelOptions' => array('label' => false),
				'autocomplete'=>'off',
			)
		); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',			
			'icon'=>'icon-search',
		)); ?>
	</div>



<?php $this->endWidget(); ?>
</div><!-- search-form -->
<hr>
<h3>Lista de Pedidos en Almacén</h3>
<br/>

<div class="span8 offset2">
<?php 

$columns=array();

array_push($columns, array(
	'header' => 'N°',
	'value'=>'$data->PEC_NroPecosa',
	)
);

array_push($columns, array(
	'header' => 'Doc. Referencia',
	'value'=>'$data->PEC_referencia',
	)
);

array_push($columns, array(
	'header' => 'Fecha',
	'value'=>'$data->PEC_fecha',
	)
);

array_push($columns, array(
	'header' => 'N° Requerimiento',
	'value'=>'$data->IDREQUERIMIENTO',
	)
);


array_push($columns, array(
    'name' => 'buttons',
    'header' => 'Opc',
    'type' => 'raw',
    'htmlOptions' => array('class' => 'button-column'),
    'value' => function($data) {
        $html = "";

            $html .= CHtml::link("<i class='icon-eye-open'></i>", array('view', 'id' => $data->IDPECOSA), array('title' => 'Ver',));             
        
          	
        return $html;
    },
));



$this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'pecosa-grid',
	'dataProvider'=>$model->search(),
	'type'=>'bordered hover',
    'template'=>"{items}{pager}",
    'rowCssClassExpression'=>'$data->iDREQUERIMIENTO->REQ_estado=="Requerido"?"info":($data->iDREQUERIMIENTO->REQ_estado=="Observado"?"warning":($data->iDREQUERIMIENTO->REQ_estado=="En almacen"?"warehouse":($data->iDREQUERIMIENTO->REQ_estado=="Aprobado"?"success":"finalized")))',
	'columns'=>$columns,
)); ?>	


</div>
