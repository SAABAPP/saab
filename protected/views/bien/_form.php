<?php

?>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'bien-form',
	'enableAjaxValidation'=>false,
	)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="control-group">
		<label id="control-label" class="control-label">Stock Actual:</label>
		<div class="controls">
			<?php echo $form->textField($model,'BIE_stockActual'); ?>
		</div>
	</div>

	<div class="control-group">
		<label id="control-label" class="control-label">Stock Mínimo:</label>
		<div class="controls">
			<?php echo $form->textField($model,'BIE_stockMinimo'); ?>
		</div>
	</div>

	<div class="control-group">
		<label id="control-label" class="control-label">Características:</label>
		<div class="controls">
			<?php echo $form->textField($model,'BIE_caracteristica'); ?>
		</div>
	</div>

	<div class="control-group">
		<label id="control-label" class="control-label">Marca:</label>
		<div class="controls">
			<?php echo $form->textField($model,'BIE_marca'); ?>
		</div>
	</div>

	<div class="control-group">
		<label id="control-label" class="control-label">Nombre:</label>
		<div class="controls">
			<?php 
			$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
				'name'=>'busca_bien',
				'id'=>'bien',
				'value'=>$catalogoBiebes->CAT_descripcion,
				'source'=>$this->createUrl('Bien/buscaCatalogo'),
				'options'=>array(
					'minLength'=>'1',
					),                                                            
				'htmlOptions'=>array('class'=>'span12','placeholder'=>'Buscar nombre de bien...'),  
				'options'=>array(
					'showAnim'=>'fold',
					'beforeSend' => 'js:function(){        
                                                        //$("#loading").html("LOADING IMAGE HERE");               
					}',
					'complete' => 'js:function(){
                                                        //$("#loading").html("");
					}',
					'select' => 'js:function(event, ui){
						jQuery("#Bien_IDCATALOGO").val(ui.item["idCatalogo"]);  
					}'
					),
				));
				?>
					<?php echo//$form->textField($model,'IDCATALOGO');
					$form->hiddenField($model,'IDCATALOGO');
					?>
				</div>
			</div>

			<div class="control-group center">
				<div class="controls">
					<?php $this->widget('bootstrap.widgets.TbButton', array(
						'buttonType'=>'submit',
						'type'=>'primary',
						'label'=>$model->isNewRecord ? 'Guardar' : 'Actualizar',
						)); ?>
						<a class="btn inline secundario" type="button" href="admin.html">Cancelar</a>
					</div>
				</div>>

				<?php $this->endWidget(); ?>