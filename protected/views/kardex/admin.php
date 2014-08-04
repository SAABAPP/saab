<?php
$this->breadcrumbs=array(
	'Kardex'=>array('index'),
	'Inicio',
);

$this->menu=array(
	array('label'=>'List Kardex','url'=>array('index')),
	array('label'=>'Create Kardex','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('kardex-grid', {
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
<h3>Kardex</h3>
<br/>

<div class="span8 offset2">

<table class="table table-bordered">

		<tr>
			<th class="span1" rowspan="2" >Fecha</th>
			<th  class="span1"rowspan="2" >N° Doc</th>
			<th  class="span2" colspan="3">Entrada</th>
			<th  class="span2" colspan="3">Salida</th>
			<th  class="span2" colspan="3">Saldo</th>
		</tr>
		<tr>
			
			<th >Cantidad</th>
			<th>P.Unit</th>
			<th>Importe</th>
			<th>Cantidad</th>
			<th>P.Unit</th>
			<th>Importe</th>
			<th>Cantidad</th>
			<th>P.Unit</th>
			<th>Importe</th>
		</tr>

</table>

<?php
$columns=array();
$valor='valor';
Yii::app()->user->setState('entrada_cantidad',0);
array_push($columns, array(
	'header'=>'',
	'value'=>function($data) use(&$valor){
		$entrada=EntradaBien::model()->findByAttributes(array('IDENTRADABIEN'=>$data->IDENTRADABIEN,'IDBIEN'=>'8806'));
		$salida=PecosaBien::model()->findByAttributes(array('IDPECOSABIEN'=>$data->IDPECOSABIEN,'IDBIEN'=>'8806'));

		if (!empty($entrada) or !empty($salida)){
			return $data->KAR_fechaMovimiento;			
		}
		else{
			$valor='ocultar';
			return $valor;
		}


	},

	// 'cssClassExpression'=>'"hide"',
	'headerHtmlOptions'=>array('style'=>'display:none'),
	'htmlOptions'=>array('class'=>'span1'),
	)
);


array_push($columns, array(
	'type' => 'raw',
	'header'=>'',
	'headerHtmlOptions'=>array('style'=>'display:none'),
	'htmlOptions'=>array('style'=>'width:101px'),		
	'value'=> function($data){

		$entrada=EntradaBien::model()->findByAttributes(array('IDENTRADABIEN'=>$data->IDENTRADABIEN,'IDBIEN'=>'8806'));
		$salida=PecosaBien::model()->findByAttributes(array('IDPECOSABIEN'=>$data->IDPECOSABIEN,'IDBIEN'=>'8806'));
		if(!empty($salida))
			return 'Pec/'.$data->iDPECOSABIEN->iDPECOSA->PEC_NroPecosa;
		else
			if(!empty($entrada))
				return 'Ent/'.$data->iDENTRADABIEN->iDENTRADA->ENT_NroEntrada;

	},
	)
);

//------------ENTRADA-------------------------------------->
array_push($columns, array(
	'type' => 'raw',
	'header'=>'	',
	'headerHtmlOptions'=>array('style'=>'display:none'),
	'htmlOptions'=>array('class'=>'span1'),
	'value'=> function($data,$bien){

		$entrada_bien=EntradaBien::model()->findByAttributes(array('IDENTRADABIEN'=>$data->IDENTRADABIEN,'IDBIEN'=>'8806'));
		if(!empty($entrada_bien)){
			$cantidad=Yii::app()->user->getState('entrada_cantidad');
			$cantidad=$entrada_bien->EBI_cantidad + $cantidad;
			Yii::app()->user->setState('entrada_cantidad',$cantidad);
			return $entrada_bien->EBI_cantidad;
		}
			
		

	},
	)
);
array_push($columns, array(
	'header'=>'',
	'type' => 'raw',
	'headerHtmlOptions'=>array('style'=>'display:none'),
	'htmlOptions'=>array('class'=>'span1'),
	'value'=> function($data){
		$entrada_bien=EntradaBien::model()->findByAttributes(array('IDENTRADABIEN'=>$data->IDENTRADABIEN,'IDBIEN'=>'8806'));
		if(!empty($entrada_bien))
			return $entrada_bien->EBI_precioCompra;
		

	},
	)
);
array_push($columns, array(
	'header'=>'',
	'type' => 'raw',
	'headerHtmlOptions'=>array('style'=>'display:none'),
	'htmlOptions'=>array('class'=>'span1'),
	'value'=> function($data){
		$entrada_bien=EntradaBien::model()->findByAttributes(array('IDENTRADABIEN'=>$data->IDENTRADABIEN,'IDBIEN'=>'8806'));
		if(!empty($entrada_bien))
			return $entrada_bien->EBI_precioCompra*$entrada_bien->EBI_cantidad;
		

	},
	)
);

//-------------------SALIDA---------------------------------------->
array_push($columns, array(
	'header'=>'',
	'type' => 'raw',
	'headerHtmlOptions'=>array('style'=>'display:none'),
	'htmlOptions'=>array('class'=>'span1'),	
	'value'=> function($data){
		$salida_bien=PecosaBien::model()->findByAttributes(array('IDPECOSABIEN'=>$data->IDPECOSABIEN,'IDBIEN'=>'8806'));
		if(!empty($salida_bien))
			return $salida_bien->PBI_cantidad;
		

	},
	)
);
array_push($columns, array(
	'header'=>'',
	'type' => 'raw',
	'headerHtmlOptions'=>array('style'=>'display:none'),
	'htmlOptions'=>array('class'=>'span1'),
	'value'=> function($data){
		$entrada_bien=EntradaBien::model()->findByAttributes(array('IDENTRADABIEN'=>$data->IDENTRADABIEN,'IDBIEN'=>'8806'));
		$salida_bien=PecosaBien::model()->findByAttributes(array('IDPECOSABIEN'=>$data->IDPECOSABIEN,'IDBIEN'=>'8806'));
		if(!empty($salida_bien))
			return 2;
			// return $entrada_bien->EBI_precioCompra;
		

	},
	)
);
array_push($columns, array(
	'header'=>'',
	'type' => 'raw',
	'headerHtmlOptions'=>array('style'=>'display:none'),
	'htmlOptions'=>array('class'=>'span1'),
	'value'=> function($data){
		$entrada_bien=EntradaBien::model()->findByAttributes(array('IDENTRADABIEN'=>$data->IDENTRADABIEN,'IDBIEN'=>'8806'));
		$salida_bien=PecosaBien::model()->findByAttributes(array('IDPECOSABIEN'=>$data->IDPECOSABIEN,'IDBIEN'=>'8806'));
		if(!empty($salida_bien))
			return 2*$salida_bien->PBI_cantidad;
		

	},
	)
);
//-----------------------SALDO------------------------------------------>
array_push($columns, array(
	'header'=>'',
	'type' => 'raw',
	'headerHtmlOptions'=>array('style'=>'display:none'),
	'htmlOptions'=>array('class'=>'span1'),	
	'value'=> function($data){
		$cantidad=Yii::app()->user->getState('entrada_cantidad');
		$salida_bien=PecosaBien::model()->findByAttributes(array('IDPECOSABIEN'=>$data->IDPECOSABIEN,'IDBIEN'=>'8806'));
		if(!empty($salida_bien))
			return $cantidad - $salida_bien->PBI_cantidad;
		else
			return $cantidad;
		

	},
	)
);
array_push($columns, array(
	'header'=>'',
	'type' => 'raw',
	'headerHtmlOptions'=>array('style'=>'display:none'),
	'htmlOptions'=>array('class'=>'span1'),	
	'value'=> function($data){
		$salida_bien=PecosaBien::model()->findByAttributes(array('IDPECOSABIEN'=>$data->IDPECOSABIEN,'IDBIEN'=>'8806'));
		if(!empty($salida_bien))
			return 2;
		else{
			$entrada_bien=EntradaBien::model()->findByAttributes(array('IDENTRADABIEN'=>$data->IDENTRADABIEN,'IDBIEN'=>'8806'));
			if(!empty($entrada_bien))
				return $entrada_bien->EBI_precioCompra;
		}

	},
	)
);
array_push($columns, array(
	'header'=>' ',
	'type' => 'raw',
	'headerHtmlOptions'=>array('style'=>'display:none'),
	'htmlOptions'=>array('class'=>'span1'),
	'value'=> function($data){
		$cantidad=Yii::app()->user->getState('entrada_cantidad');
		$salida_bien=PecosaBien::model()->findByAttributes(array('IDPECOSABIEN'=>$data->IDPECOSABIEN,'IDBIEN'=>'8806'));
		if(!empty($salida_bien))
			return ($cantidad - $salida_bien->PBI_cantidad)*2;
		else{
			$entrada_bien=EntradaBien::model()->findByAttributes(array('IDENTRADABIEN'=>$data->IDENTRADABIEN,'IDBIEN'=>'8806'));
			if(!empty($entrada_bien))
				return $cantidad*$entrada_bien->EBI_precioCompra;
			}
		
		

	},
	)
);

$this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'kardex-grid',
	'dataProvider'=>$model->search(),
	'type'=>'bordered hover',
	// 'rowCssClassExpression'=>'Yii::app()->user->getState(\'visible_valor\')==\'nulo\'?"hide":""',
    'template'=>"{items}{pager}",	
	'columns'=>$columns,

));

Yii::app()->clientScript->registerScript('kardex_', "

	valor=$('#kardex-grid td').text(function(){		
		v=$(this).text();
		if(v=='ocultar')
			$(this).parent().remove();
	}); 
	   

	");


?>

</div>
