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
	'bien'=>$bien,
	'rango'=>$rango
	));
	
	$data=$model->filtrar($rango['min'],$rango['max'])->getData();
	// $data=$model->search()->getData();
	$_bien=$bien->search()->getData();
?>
</div><!-- search-form -->
<hr>
<h2 class="text-center">Kardex Fisico Valorado</h2>
<br/>

<div class="span11">
<?="<h5 class='text-center'>Desde la Fecha: <small>".$rango['min']."</small> Hasta la Fecha :<small> ".$rango['max']."</small></h5>"?>

<br>
<div class="span12" style="margin-bottom:20px">

	<div class="span8">
		<h4>Articulo: 
			<small><?php 
			foreach ($_bien as $value) {
				echo $value->iDCATALOGO->CAT_descripcion;
			}
			?></small>
		</h4>
	</div>
	<div class="span4">
		<h4>Unidad de Medida: <small><?php 
			foreach ($_bien as $value) {
				echo $value->iDCATALOGO->CAT_unidad;
			}
			?></small>
		</h4>
	</div>


</div>

		

<table class="table table-bordered">
	<thead>
		<tr>
			<th rowspan="2" colspan="1" >Fecha</th>
			<th rowspan="2" colspan="1" >N° Doc</th>
			<th colspan="3">Entrada</th>
			<th colspan="3">Salida</th>
			<th colspan="3">Saldo</th>
		</tr>
		<tr>
			<th>Cantidad</th>
			<th>P.Unit</th>
			<th>Importe</th>
			<th>Cantidad</th>
			<th>P.Unit</th>
			<th>Importe</th>
			<th>Cantidad</th>
			<th>P.Unit</th>
			<th>Importe</th>
		</tr>
	</thead>
	<tbody style="color: #999;">
		<?php 
		


		$costo_anterior=0;
		$cantidad=0;
		foreach ($data as $value) {

			// $entrada_cantidad=0;
			$entrada=EntradaBien::model()->findByAttributes(array('IDENTRADABIEN'=>$value->IDENTRADABIEN,'IDBIEN'=>$idbien));
			$salida=PecosaBien::model()->findByAttributes(array('IDPECOSABIEN'=>$value->IDPECOSABIEN,'IDBIEN'=>$idbien));
			
			if (!empty($entrada) or !empty($salida)){
				
			?>
		<tr >
			<?php

			 ?>
			<th class="text-center"><?=$value->KAR_fechaMovimiento;?></th>
			<th class="text-center"><?php 
				if(!empty($salida))
					echo 'Pec: '.$value->iDPECOSABIEN->iDPECOSA->PEC_NroPecosa;
				else
					if(!empty($entrada))
						echo 'Ent: '.$value->iDENTRADABIEN->iDENTRADA->ENT_NroEntrada;
			?></th>
			<!--ENTRADA-->
			<th class="text-center"><?php 
				if(!empty($entrada)){
					// $cantidad=$entrada_cantidad;
					$cantidad=$entrada->EBI_cantidad + $cantidad;
					echo $entrada->EBI_cantidad;
				}
			?></th>
			<th class="text-center"><?php
				if(!empty($entrada)){
					$costo_anterior=$entrada->EBI_precioCompra;
					echo "S/.".$costo_anterior;
				}
					
			?></th>
			<th class="text-center"><?php 
			if(!empty($entrada))
				echo  "S/.".$entrada->EBI_precioCompra*$entrada->EBI_cantidad;
			?></th>
			<!--SALIDA-->
			<th class="text-center"><?php 
				if(!empty($salida)){
					$cantidad=$cantidad - $salida->PBI_cantidad;
					echo $salida->PBI_cantidad;
				}
				?>
			</th>
			<th class="text-center"><?php

			if(!empty($salida))
				echo 'S/.'.$costo_anterior;
				// echo $entrada->EBI_precioCompra;
			?></th>
			<th class="text-center"><?php

			if(!empty($salida))
				echo "S/.".$costo_anterior*$salida->PBI_cantidad;
				// echo $entrada->EBI_precioCompra;
			?></th>
			<!--SALDO-->
			<th class="text-center"><?php
				// if(!empty($salida))
				// 	echo $cantidad - $salida->PBI_cantidad;
				// else
					echo $cantidad;
			?></th>
			<th class="text-center"><?php
				if(!empty($salida))
					echo  'S/.'.$costo_anterior;
				else{
					if(!empty($entrada))
						echo  'S/.'.$entrada->EBI_precioCompra;
				}
			?></th>
			<th class="text-center"><?php
				if(!empty($salida))
					echo  'S/.'.$cantidad*$costo_anterior;
				else{
					if(!empty($entrada))
						echo  'S/.'.$cantidad*$entrada->EBI_precioCompra;
					}

			?></th>
		</tr>
		<?php 
			}

			// if (empty($entrada) && empty($salida)) {
			// 	echo '<tr><th class="text-center" colspan="11">Vacio</th></tr>';
			// }
		}


		
		?>
	</tbody>

</table>
<div class="text-center" style="padding-bottom:20px">
	<a id='imprimir' href='<?php $valor=Yii::app()->request->requestUri; echo strlen($valor)>40?$valor."&":$valor."?" ?>imprimir' target='_blank' class="btn inline" type="\" >Imprimir Kardex</a>
</div>


</div>
