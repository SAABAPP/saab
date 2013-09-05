<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'nea-form',
	'enableAjaxValidation'=>false,
)); ?>

	<br>

	<?php echo $form->errorSummary($model); ?>
	  <?php 
    $fecha = date("Y-m-d"); //obtiene fecha actual
    
    ?>

	<?php echo $form->textFieldRow($model,'NEA_referencia',array('class'=>'span3','maxlength'=>150,'placeholder'=>'Nro Documento o Referencia..')); ?>

	<?php echo $form->textFieldRow($model,'NEA_procedencia',array('class'=>'span3','maxlength'=>150,'placeholder'=>'Empresa..')); ?>

	<?php echo $form->hiddenField($model,'IDENTRADA',array('class'=>'span5')); ?>

	<?php echo $form->hiddenField($entrada,'ENT_fecha',array('class'=>'span5','value'=>$fecha)); ?>

	<?php echo $form->hiddenField($entrada,'ENT_tipo',array('class'=>'span5','maxlength'=>1,'value'=>'1')); ?>
    
	<div class="control-group row-fluid">
		<table class="table tableAdd table-bordered">
			<thead>
				<tr>
					<th >N°</th>
					<th >Bien</th>
					<th >Unidad</th>
					<th >Cantidad</th>
					<th>P.Unitario(S/.)</th>
					<th>Sub-Total(S/.)</th>
					<th class="button-column">Opciones</th>
				</tr>
				<tr>
				<td class="span1"></td>
				<td class="span7">
					<div class="filter-container">


						<?php 
						$this->widget('zii.widgets.jui.CJuiAutoComplete', array(

							'name'=>'busca_bien',
							'id'=>'catalogoBien',
							'value'=>$catalogo->IDCATALOGO,
							'source'=>$this->createUrl('Requerimiento/buscaBien/', array('valor'=>'')),
                                      //'sourceUrl'=>$this->createUrl(RequerimientoController::actionGetPostalCodeAction()),
							'options'=>array(
								'minLength'=>'1',
								),                                                            
							'htmlOptions'=>array('class'=>'span12 enabled','placeholder'=>'buscar bien..'),  
							'options'=>array(
								'showAnim'=>'fold',
								'beforeSend' => 'js:function(){        
                                                        //$("#loading").html("LOADING IMAGE HERE");               
								}',
								'complete' => 'js:function(){
                                                        //$("#loading").html("");
								}',
								'select' => 'js:function(event, ui){                                                         
									jQuery("#unidad_catalogo").val(ui.item["unidad"]);
									jQuery("#idbien").val(ui.item["id"]);


								}'


								),
							));



							?>
							<input id="idbien" type="hidden"> 
						</div>
				</td>
			    <td class="span1">
			    	<input name="" id="unidad_catalogo"  type="text"  disabled>
			    </td>
			    <td class="span1">
			    	<div class="filter-container">
			    		<input name="" id="cantidadBien" type="text" style="width:40px;" >
			    	</div>
			    </td>
			    <td class="span1">
			    	<div class="filter-container">
			    		<input name="" id="precio_unitario" type="text" style="width:40px;" >
			    	</div>
			    </td>
			    <td class="span1">
			    	<div class="filter-container">
			    		<input name="" id="sub_total" type="text" style="width:40px;" disabled>
			    	</div>
			    </td>
			    <td >
			    	<?php 
			    	$item=array();


			    	echo CHtml::link("<i class='icon-plus'></i>", 
			               // array('create#'),
			    		array('addItem'),
			    		array(
			    			'id' => 'btnAdd',
			    			'class' => 'btn btn-primary',
			    			'ajax' => array(
			    				'type' => 'POST',
			                      // 'url' => $this->createUrl('Requerimiento/buscaBien'),
			    				'url' => "js:$(this).attr('href')",
			    				'data' => array(
			    					'idbien' => "js: $('#idbien').val()",
			    					'descripcion' => "js: $('#catalogoBien').val()",
			    					'unidad'=>"js: $('#unidad_catalogo').val()",
			    					'cantidad' => "js: $('#cantidadBien').val()",
			    					'precio_unitario' => "js: $('#precio_unitario').val()",
			    					'sub_total'=>"js: $('#sub_total').val()",			    					
			    					
			    					),
			    				'error' => "function(req, status, error) {
			    					alert(req.responseText);
			    				}",
			    				'success' => "function(data) {
			    					
			    					$('#idbien').val('');
			    					$('#catalogoBien').val('');
			    					$('#unidad_catalogo').val('');
			    					$('#cantidadBien').val('');
			    					$('#precio_unitario').val('');
			    					$('#sub_total').val('');
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
    //$this->renderPartial('_details', array(
    //    'data' => $data,
    //));
$this->actionDetails();
echo "</div>"; 




?>

</div>

	<div class="form-actions text-center">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Guardar' : 'Actualizar',
		)); ?>
		<a class="btn inline secundario" type="button" href="admin.html">Cancelar</a>
	</div>

<?php $this->endWidget(); ?>
