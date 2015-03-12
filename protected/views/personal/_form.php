<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'personal-form',
	'enableAjaxValidation'=>false,
)); ?>
<?php echo $form->errorSummary(array($model,$usuario)); ?>



	<div class="control-group">
		<?php echo $form->hiddenField($model,'PER_estado',array('class'=>'span3','value'=>'1')); ?>
		<?php echo $form->textFieldRow($model,'PER_nombres',array('class'=>'span3','maxlength'=>150,'placeholder'=>'Nombres..')); ?>				
		<?php echo $form->textFieldRow($model,'PER_paterno',array('class'=>'span3','maxlength'=>150,'placeholder'=>'Apellido Paterno..')); ?>				
		<?php echo $form->textFieldRow($model,'PER_materno',array('class'=>'span3','maxlength'=>150,'placeholder'=>'Apellido Materno..')); ?>
		<?php echo $form->textFieldRow($model,'PER_dni',array('class'=>'span3','maxlength'=>8,'placeholder'=>'DNI..')); ?>
		<?php echo $form->radioButtonListRow($model, 'PER_sexo', array('H'=>'Hombre&nbsp;&nbsp;&nbsp;&nbsp;','M'=>'Mujer'),array('separator'=>'&nbsp;&nbsp;&nbsp;','labelOptions'=>array('style'=>'display:inline'))); ?>		
		<?php echo $form->textFieldRow($model,'PER_direccion',array('class'=>'span3','maxlength'=>150,'placeholder'=>'Direccion..')); ?>
		<?php echo $form->textFieldRow($model,'PER_telefono',array('class'=>'span3','maxlength'=>12,'placeholder'=>'Telefono Fijo..')); ?>
		<?php echo $form->textFieldRow($model,'PER_celular',array('class'=>'span3','maxlength'=>12,'placeholder'=>'Celular..')); ?>
		<?php echo $form->textFieldRow($model,'PER_cargo',array('class'=>'span3','maxlength'=>60,'placeholder'=>'Cargo..')); ?>
		<?php echo $form->hiddenField($model,'PER_idResponsable',array('class'=>'span3','value'=>'0')); ?>
		<label id="control-label" for="area" class="control-label">Área*</label>
		<div class="controls">
			<?php 
			$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
				'name'=>'busca_area',
				'id'=>'area',
				'value'=>$model->isNewRecord?$model->IDAREA:$model->iDAREA->ARE_nombre,
				'source'=>$this->createUrl('personal/buscaArea'),
				'options'=>array(
					'minLength'=>'1',
					),                                                            
				'htmlOptions'=>array('class'=>'span3','placeholder'=>'Buscar Area...'),  
				'options'=>array(
					'showAnim'=>'fold',
					'select' => 'js:function(event, ui){
						jQuery("#Personal_IDAREA").val(ui.item["id"]); 
					}'
					),
				));
			?>
		<?php echo $form->hiddenField($model,'IDAREA',array('class'=>'span5')); ?>	
		</div>
		<h2 class="center">Usuario del Sistema</h2><br>
		<?php echo $form->textFieldRow($usuario,'USU_usuario',array('class'=>'span3','maxlength'=>150,'placeholder'=>'Usuario..')); ?>
		<?php echo $form->passwordFieldRow($usuario,'USU_password',array('class'=>'span3','maxlength'=>150,'placeholder'=>'En Blanco para no cambiar..','value'=>'')); ?>
		<label id="control-label" for="tipo" class="control-label">Tipo Usuario*</label>
		<div class="controls">
			<?php 
			$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
				'name'=>'busca_tipo',
				'id'=>'tipo',
				'value'=>$asignacion->itemname,
				'source'=>$this->createUrl('personal/buscaAutorizacion'),
				'options'=>array(
					'minLength'=>'1',
					),                                                            
				'htmlOptions'=>array('class'=>'span3','placeholder'=>'Asignar Tipo Usuario...'),  
				'options'=>array(
					'showAnim'=>'fold',
					'select' => 'js:function(event, ui){
						jQuery("#AuthAssignment_itemname").val(ui.item["id"]); 
					}'
					),
				));
			?>

		<?php echo $form->hiddenField($asignacion,'itemname',array('class'=>'span5')); ?>	
		</div>
		
	
	</div>


	<div class="control-group">


	</div>


	<div class="control-group center">
		<div class="controls">
			<?php $this->widget('bootstrap.widgets.TbButton', array(
				'buttonType'=>'submit',
				'type'=>'primary',
				'label'=>$model->isNewRecord ? 'Crear Nuevo' : 'Actualizar',
			)); ?>
			<a class="btn inline secundario" type="button" href="<?php echo Yii::app()->request->baseUrl; ?>/personal/admin">Cancelar</a>
			
		</div>
	</div>
	<br><br>

	

	

	

	

	



	

	

	

	

	



	



<?php $this->endWidget(); ?>
