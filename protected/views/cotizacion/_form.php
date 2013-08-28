<?php 
$form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'cotizacion-form',
	'enableAjaxValidation'=>false,
	)
);
?>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->textFieldRow($model,'COT_buenaPro',array('class'=>'span5')); ?>

<?php echo $form->textFieldRow($model,'IDREQUERIMIENTO',array('class'=>'span5')); ?>

<div class="control-group">
	<table class="table tableAdd table-bordered">
		<thead>
			<tr>
				<th style="width:1em;">N°</th>
				<th style="width:30em;">Razón Social</th>
				<th style="width:7em;">R.U.C.</th>
				<th style="width:4em;">Monto</th>
				<th class="button-column" style="width:4em;">Añadir</th>
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
							'id'=>'proveedor',
							'value'=>$proveedor->PRO_razonSocial,
							'source'=>$this->createUrl('Cotizacion/buscaProveedor'),
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
						<input id="razonSocial" type="hidden">
					</div>
				</td>
		        <td>
		        	<input style="width:7em;" name="" id="ruc"  type="text" disabled>
		        </td>
		        <td>
		        	<input style="width:4em;" name="" id="monto" type="text" pattern="[0-9]{1,6}">
		        </td>
    			<td>
    				<?php 
    				$item=array();
    				echo CHtml::link("<i class='icon-plus'></i>",
    					array('addCotizacion'),
    					array(
    						'disabled' => 'true',
    						'id' => 'btnAdd',
    						'class' => 'btn btn-primary',
    						'ajax' => array(
    							'type' => 'POST',
    							'url' => "js:$(this).attr('href')",
    							'data' => array(
    								'idProveedor' => "js: $('#idProveedor').val()",
    								'ruc' => "js: $('#ruc').val()",
    								'monto' => "js: $('#monto').val()",
    								'razonSocial' => "js: $('#razonSocial').val()",
    								),
    							'error' => "function(req, status, error) {
    								alert(req.responseText);
    							}",
    							'success' => "function(data) {
    								$('#proveedor').val('');
    								$('#ruc').val('');
    								$('#monto').val('');
    								$('#detalleCotizacion').html(data);
    							}"
    							),
    						)
    					);
    				?>
	        	</td>
	        </tr>
	        </tbody>
	</table>
	<br/>

	<?php
	echo "<div id='detalleCotizacion'>";
	$this->actionDetails();
	echo "</div>";
	?>
</div>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'submit',
		'type'=>'primary',
		'label'=>$model->isNewRecord ? 'Create' : 'Save',
		));
	?>
</div>

<?php $this->endWidget(); ?>
