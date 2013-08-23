<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'cotizacion-form',
	'enableAjaxValidation'=>false,
	)); ?>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'COT_buenaPro',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'IDREQUERIMIENTO',array('class'=>'span5')); ?>

	<div class="control-group">
		<table class="table tableAdd table-bordered">
			<thead>
				<tr>
					<th >N°</th>
					<th >Razón Social</th>
					<th >R.U.C.</th>
					<th >Monto</th>
					<th class="button-column">Opciones</th>
				</tr>
				<tr>
					<td class="span1"></td>
					<td class="span3">
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
										jQuery("#ruc").val(ui.item["ruc"]);
										jQuery("#idProveedor").val(ui.item["idProveedor"]);  
									}'
								),
							));
							?>
							<input id="idProveedor" type="hidden"> 
						</div>
					</td>
			        <td class="span2">
			        	<input name="" id="ruc"  type="text" disabled>
			        </td>
			        <td class="span1">
			        	<div class="filter-container">
			        		<input name="" id="monto" type="text" style="width:40px;">
			        	</div>
			        </td>
        			<td >
		        	<?php 
		        	$item=array();
		        	echo CHtml::link("<i class='icon-plus'></i>",
		        		array('addCotizacion'),
		        		array(
		        			'disabled' => 'true',
		        			'id' => 'btnAdd',
		        			'class' => 'btn btn-primary disabled',
		        			'ajax' => array(
		        				'type' => 'POST',
		        				'url' => "js:$(this).attr('href')",
		        				'data' => array(
		        					'idProveedor' => "js: $('#idProveedor').val()",
		        					'ruc' => "js: $('#ruc').val()",
		        					'monto' => "js: $('#monto').val()",
		        					),
		        				'error' => "function(req, status, error) {
		        					alert(req.responseText);
		        				}",
		        				'success' => "function(data) {
		        					// $('#cantidadBien').val('');
		        					// $('#catalogoBien').val('');
		        					$('#order-detail-div').html(data);                                
		        				}"
		        				),

		        			)
		        		);
		        		?>
		        		<!-- <a class="btn btn-primary "><i class="icon-plus"></i></a> -->
		        	</td>
		        </tr>
		    </thead>
		</table>
		<br/>

<?php
echo "<div id='order-detail-div'>";
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
