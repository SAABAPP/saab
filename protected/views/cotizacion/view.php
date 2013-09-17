<?php
$this->breadcrumbs=array(
	'Cotizacion'=>array('index'),
	'Requerimiento N° '.$model->iDREQUERIMIENTO->IDREQUERIMIENTO,
);
?>

<h2 class ="center">Cotización de Requerimiento</h2>
<h3 class="center">N° <?php echo $model->iDREQUERIMIENTO->IDREQUERIMIENTO; ?></h3>
<br>

<form class="form-horizontal">
	<div class="control-group">
		<label class="control-label" for="solicitante">Solicitante:</label>
		<div class="controls"><p><?php echo $model->iDREQUERIMIENTO->iDUSUARIO->iDPERSONAL->PER_nombres." ".$model->iDREQUERIMIENTO->iDUSUARIO->iDPERSONAL->PER_paterno." ".$model->iDREQUERIMIENTO->iDUSUARIO->iDPERSONAL->PER_materno; ?></p></div>
	</div>
	<div class="control-group">
		<label class="control-label" for="dependencia">Dependencia:</label>
		<div class="controls"><p><?php echo $model->iDREQUERIMIENTO->iDUSUARIO->iDPERSONAL->iDAREA->ARE_nombre; ?></p></div>
	</div>
	<div class="control-group">
		<label for="unidad" class="control-label">Unidad:</label>
		<div class="controls"><p>Gerencia Regional de Eucación La Libertad</p></div>
	</div>

	<hr>
	<h4 class="pull-right">Presupuesto: S/. <?php  echo (isset($model->iDREQUERIMIENTO->REQ_presupuesto)) ? $model->iDREQUERIMIENTO->REQ_presupuesto : "No asignado"; ?></h4>
	<h3>Cotizaciones:</h3>
	<br>

	<?php
	$columns=array();
	$i=0;

	array_push($columns, array(
		'header' => 'N°',
		'value' => function($data) use(&$i){
			return ++$i;
		},
		)
	);

	array_push($columns, array(
		'header' => 'Razon social',
		'value'=>'$data->iDPROVEEDOR->PRO_razonSocial',
		)
	);

	array_push($columns, array(
		'header' => 'R.U.C.',
		'value'=>'$data->iDPROVEEDOR->PRO_ruc',
		)
	);

	array_push($columns, array(
		'header' => 'Monto (S/.)',
		'value'=>'$data->COT_total',
		)
	);

	$this->widget('bootstrap.widgets.TbGridView', array(
		'type'=>'bordered hover',
		'dataProvider'=>$dataProvider,
		'template'=>"{items}",
		'columns'=>$columns,
		'rowCssClassExpression'=>'$data[COT_buenaPro]==1?"success":""',
		)
	);
	?>
	<div class="control-group center">
		<div class="controls">
			<a id='imprimir' href='?imprimir' target='_blank' class="btn inline" >Imprimir Cotizacion</a>
		</div>
	</div>
</form>
