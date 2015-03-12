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
	));
?>
</div><!-- search-form -->
<br/><br/>
<hr>
<h3>Kardex</h3>
<br/>

<div class="span11">

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
	<tbody>
		<?php 
		
		$data=$model->search()->getData();


		foreach ($data as $value) {

			$entrada_cantidad=0;
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
					echo 'Pec/'.$value->iDPECOSABIEN->iDPECOSA->PEC_NroPecosa;
				else
					if(!empty($entrada))
						echo 'Ent/'.$value->iDENTRADABIEN->iDENTRADA->ENT_NroEntrada;
			?></th>
			<!--ENTRADA-->
			<th class="text-center"><?php 
				if(!empty($entrada)){
					$cantidad=$entrada_cantidad;
					$cantidad=$entrada->EBI_cantidad + $cantidad;
					echo $entrada->EBI_cantidad;
				}
			?></th>
			<th class="text-center"><?php
				if(!empty($entrada))
					echo "S/.".$entrada->EBI_precioCompra;
			?></th>
			<th class="text-center"><?php 
			if(!empty($entrada))
				echo  "S/.".$entrada->EBI_precioCompra*$entrada->EBI_cantidad;
			?></th>
			<!--SALIDA-->
			<th class="text-center"><?php 
				if(!empty($salida))
					echo $salida->PBI_cantidad;?>
			</th>
			<th class="text-center"><?php

			if(!empty($salida))
				echo "S/.2";
				// echo $entrada->EBI_precioCompra;
			?></th>
			<th class="text-center"><?php

			if(!empty($salida))
				echo 2*$salida->PBI_cantidad;
				// echo $entrada->EBI_precioCompra;
			?></th>
			<!--SALDO-->
			<th class="text-center"><?php
				if(!empty($salida))
					echo $cantidad - $salida->PBI_cantidad;
				else
					echo $cantidad;
			?></th>
			<th class="text-center"><?php
				if(!empty($salida))
					echo 2;
				else{
					$entrada_bien=EntradaBien::model()->findByAttributes(array('IDENTRADABIEN'=>$value->IDENTRADABIEN,'IDBIEN'=>$idbien));
					if(!empty($entrada_bien))
						echo $entrada_bien->EBI_precioCompra;
				}
			?></th>
			<th class="text-center"><?php
				if(!empty($salida))
					echo ($cantidad - $salida->PBI_cantidad)*2;
				else{
					$entrada_bien=EntradaBien::model()->findByAttributes(array('IDENTRADABIEN'=>$value->IDENTRADABIEN,'IDBIEN'=>$idbien));
					if(!empty($entrada_bien))
						echo $cantidad*$entrada_bien->EBI_precioCompra;
					}

			?></th>
		</tr>
		<?php 
			}

			// if (empty($entrada) or empty($salida)) {
			// 	echo 'vacio';
			// }
		}


		
		?>
	</tbody>

</table>


</div>
