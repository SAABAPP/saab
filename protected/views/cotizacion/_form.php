<?php 
Yii::app()->clientScript->registerScript('submit-form', "


	var monto_bajo=".Yii::app()->user->getState('montoBajo')."

	$('#cotizacion-form').submit(function(event){
		
		var cantidad=[];
		var precio=[];
		var total=0;
		$.each(event.currentTarget,function(index,data){			
			if(data.name=='cantidad[]'){
				console.log(data.value);
				cantidad.push(data.value);
			}
			if(data.name=='precioUnitario[]'){
				console.log(data.value);
				precio.push(data.value);
			}

		});
		$.each(precio,function(index,data){
			total=total+data*(cantidad[index]?cantidad[index]:1);

		});

		console.log(cantidad,precio,total,monto_bajo);
		// Math.round(total);
		if (total==monto_bajo) {
			$('#error_verificar').hide();
			return;
		}else{
			event.preventDefault();
			$('#error_verificar').show();
		}
		
	});

");

$form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'cotizacion-form',
	'enableAjaxValidation'=>false,
	)
);

?>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->hiddenField($requerimiento,'REQ_estado',array('class'=>'span5','value'=>'Aprobado')); ?>

<?php //echo $form->textFieldRow($model,'IDREQUERIMIENTO',array('class'=>'span5')); ?>

<div class="control-group">
	<table class="table tableAdd table-bordered">
		<thead>
			<tr>
				<th style="width:1em;">N°</th>
				<th style="width:30em;">Razón Social</th>
				<th style="width:7em;">R.U.C.</th>
				<th style="width:6em;">Monto</th>
				<th style="width:4em;">Añadir</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td style="width:1em;"></td>
				<td style="width:30em;">
					<div class="filter-container">
						<?php 
						$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
							'name'=>'busca_proveedor',
							'id'=>'razonSocial',
							'value'=>$proveedor->PRO_razonSocial,
							'source'=>$this->createUrl('cotizacion/buscaProveedor'),
							'options'=>array(
								'minLength'=>'1',
								),                                                            
							'htmlOptions'=>array('class'=>'span12','placeholder'=>'Buscar proveedor...'),  
							'options'=>array(
								'showAnim'=>'fold',
								'beforeSend' => 'js:function(){        
                                                        //$("#loading").html("LOADING IMAGE HERE");               
								}',
								'complete' => 'js:function(){
                                                        //$("#loading").html("");
								}',
								'select' => 'js:function(event, ui){
									jQuery("#razonSocial").val(ui.item["razonSocial"]);
									jQuery("#ruc").val(ui.item["ruc"]);
									jQuery("#idProveedor").val(ui.item["idProveedor"]);  
								}'
							),
						));
						?>
						<input id="idProveedor" type="hidden">
					</div>
				</td>
		        <td>
		        	<input style="width:7em;" name="" id="ruc"  type="text" disabled>
		        </td>
		        <td>
		        	<input style="width:6em;" name="" id="monto" type="text" pattern="[0-9]+(\.[0-9]{1,4}?)?">
		        </td>
    			<td>
    				<?php 
    				$item=array();
    				echo CHtml::link("<i class='icon-plus'></i>",
    					array('addCotizacion'),
    					array(
    						// 'disabled' => 'true',
    						'id' => 'btnAdd',
    						'class' => 'btn btn-primary',
    						'ajax' => array(
    							'type' => 'POST',
    							'url' => "js:$(this).attr('href')",
    							'data' => array(
    								'idProveedor' => "js: $('#idProveedor').val()",
    								'ruc' => "js: $('#ruc').val()",
    								'monto' => "js: $('#monto').val()",
    								'razonSocial' => "js: $('#razonSocial').val()",//aca
    								),
    							'error' => "function(req, status, error) {
    								alert(req.responseText);
    							}",
    							'success' => "function(data) {
    								$('#razonSocial').val('');
    								$('#idProveedor').val('');
    								$('#ruc').val('');
    								$('#monto').val('');
    								$('#detalleCotizacion').html(data);
    								window.location.reload();
    							}"
    							),
    						)
    					);
    				?>
	        	</td>
	        </tr>
	        </tbody>
	</table>
	<br>

	<?php
	echo "<div id='detalleCotizacion'>";
	$this->actionDetails();
	echo "</div>";
	?>
</div>
<div id="divAnalizar" class="control-group center" style="visibility:visible !important">
	<div class="controls">
		<?php
		
		if($requerimiento->REQ_presupuesto >= $this->evaluarMenor()){

			echo CHtml::link("Analizar", 
				array('analizar'),
				array(
					'id' => 'analizar',
					'class' => 'btn',
					'ajax' => array(
						'type' => 'POST',
	                          // 'url' => $this->createUrl('Requerimiento/buscaBien'),
						'url' => "js:$(this).attr('href')",
						'data' => array(
							// 'idbien' => "js: $('#idbien').val()",
							// 'rbi_cantidad' => "js: $('#cantidadBien').val()",
							// 'descripcion' => "js: $('#catalogoBien').val()",
							// 'unidad'=>"js: $('#unidad_catalogo').val()",
							),
						'error' => "function(req, status, error) {
							alert(req.responseText);
						}",
						'success' => "function(data) {
							// $('#unidad_catalogo').val('');
							// $('#idbien').val('');
							// $('#cantidadBien').val('');
							// $('#catalogoBien').val('');
							// $('#order-detail-div').html(data);                                
						}"
						),

					)
				);
		}
		else{
			echo "<a class='btn'  href='../observar/$requerimiento->IDREQUERIMIENTO'>Pasar a observado</a>";
						
		}

		?>
	</div>
</div>
<div id="bienes" class="oculto">
	<div id="error_verificar" class="alert alert-error alert-block" style="display:none">
		<h4><strong>Verificar!!!</strong><br><small>El total de la (cantidad)*(Precio Unitario) <br>no es igual al monto total de la Cotizacion</small></h4>
	</div>
	<?php
		if($requerimiento->TIPO=='b'){
			$this->renderPartial('_bienes',array('requerimiento'=>$requerimiento,'requerimiento_bien'=>$requerimiento_bien,'ordenCompra'=>$ordenCompra));
		}
		else 
			$this->renderPartial('_servicios',array('requerimiento'=>$requerimiento,'requerimiento_servicio'=>$requerimiento_servicio,'ordenCompra'=>$ordenCompra)); 		 
	?>
	<div class="form-actions text-center">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'secondary',
			'label'=>$model->isNewRecord ? 'Acta Otorgamiento y Generar Orden de Compra' : 'Actualizar',
		)); ?>

	</div>
</div>





<?php $this->endWidget(); ?>
