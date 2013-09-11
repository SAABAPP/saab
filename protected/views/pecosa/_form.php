<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'pecosa-form',
	'enableAjaxValidation'=>false,
)); ?>



	<?php 
    $fecha = date("Y-m-d"); //obtiene fecha actual
    
  ?>	

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->hiddenField($model,'PEC_fecha',array('class'=>'span5','value'=>$fecha)); ?>

	<?php echo $form->hiddenField($model,'IDUSUARIO',array('class'=>'span5','value'=>Yii::app()->user->getState('idusuario'))); ?>

	<?php echo $form->hiddenField($model,'IDREQUERIMIENTO',array('class'=>'span5','value'=>$ordenCompra->IDREQUERIMIENTO)); ?>


	<div class="row-fluid">
          <div class="span12">
            <!-- Form header of check in begins -->
            <div class="form-horizontal">
              <div class="control-group pull-right">
                <label class="control-label">R.U.C.:</label>
                <div class="controls"><p><?php echo $cotizacion->iDPROVEEDOR->PRO_ruc?></p></div>
              </div>
              <div class="control-group">
                <label class="control-label">Señor(es):</label>
                <div class="controls"><p><?php echo $cotizacion->iDPROVEEDOR->PRO_razonSocial?></p></div>
              </div>
              <div class="control-group pull-right">
                <label class="control-label">Teléfono:</label>
                <div class="controls"><p><?php echo $cotizacion->iDPROVEEDOR->PRO_telefono?></p></div>
              </div>
              <div class="control-group">
                <label class="control-label">Dirección:</label>
                <div class="controls"><p><?php echo $cotizacion->iDPROVEEDOR->PRO_direccion?></p></div>
              </div>
              <div class="control-group">
                <label class="control-label">Le agradecemos enviar a nuestro almacén en:</label>
                <div class="controls"><br><br><p><?php echo Variables::model()->findByPk(3)->VAR_valor?></p></div>
              </div>              
              <div class="control-group">
                <!-- <label class="control-label">Nº Documento Referencia:</label> -->
                <?php echo $form->textFieldRow($model,'PEC_referencia',array('class'=>'span5','disabled'=>true,'maxlength'=>150,'value'=>$entradaOC->EOC_documento)); ?>                
              </div>
              <div class="control-group">
                <label class="control-label">Facturara a nombre de:</label>
                <div class="controls"><p><?php echo Variables::model()->findByPk(4)->VAR_valor?></p></div>
              </div>
              <div class="control-group">
                <label class="control-label">Lo siguiente:</label>
                <div class="controls"><p></p></div>
              </div>
            </div>
            <!-- Form header of check in ends -->
          </div>
        </div>
    <div id="bienes" >
	<?php $this->renderPartial('_details',array('requerimiento_bien'=>$requerimiento_bien)); ?>
	</div>
	<div class="form-actions text-center">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'secondary',
			'label'=>$model->isNewRecord ? 'Generar PECOSA' : 'Actualizar Bienes',
		)); ?>

	</div>

<?php $this->endWidget(); ?>
