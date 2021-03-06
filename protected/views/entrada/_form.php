<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'entrada-form',
	'enableAjaxValidation'=>false,
)); ?>



<?php echo $form->errorSummary($model); ?>

<div class="control-group pull-right">
            <label class="control-label">Fecha:</label>
            <div class="controls"><p>  <?php 

                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                'model' => $model,
                                'language' => 'es',
                                'htmlOptions'=>array('class'=>'span12','placeholder'=>'Fecha..','required'=>'required'),
                                'attribute' => 'ENT_fecha',
                                'options' => array(
                                    'showAnim' => 'fold',
                                    'dateFormat' => 'yy-m-d',
                                    'minDate'=>$ordenCompra->OC_fecha,
                                ),
                    ));
                
                ?>
              </p></div>
</div>
	<?php echo $form->textFieldRow($model,'ENT_NroEntrada',array('class'=>'span3','placeholder'=>'Nro de Entrada','required'=>'required')); ?>

	<?php echo $form->hiddenField($model,'ENT_tipo',array('class'=>'span5','maxlength'=>1,'value'=>'0')); ?>
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
                <div class="controls"><br><p><?php echo Variables::model()->findByPk(3)->VAR_valor?></p></div>
              </div>              
              <div class="control-group">
                <label class="control-label">Nº Documento Referencia:</label>
                <div class="controls"><input type="text" id="Documento" class="span3"  name="EntradaOC" placeholder="Nº Documento Referencia.." required ></div>
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
			'label'=>$model->isNewRecord ? 'Ingresar Bienes' : 'Actializar Bienes',
		)); ?>

	</div>

<?php $this->endWidget(); ?>
