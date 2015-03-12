<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'type'=>'vertical',

)); ?>


	<?php //echo $form->textFieldRow($model,'KAR_fechaMovimiento',array('class'=>'span5')); ?>

	<?php 
          $this->widget('zii.widgets.jui.CJuiAutoComplete', 
          	array(

              'name'=>'busca_bien',
              'id'=>'catalogoBien',
              // 'value'=>$bien->IDBIEN,
              'source'=>$this->createUrl('Requerimiento/buscaBien/', array('valor'=>'')),
              //'sourceUrl'=>$this->createUrl(RequerimientoController::actionGetPostalCodeAction()),
              'options'=>array(
                  'minLength'=>'1',
              ),                                                            
              'htmlOptions'=>array('class'=>'span5','placeholder'=>'Buscar Articulo..'),  
              'options'=>array(
                      'showAnim'=>'fold',
                      'beforeSend' => 'js:function(){        
                                //$("#loading").html("LOADING IMAGE HERE");               
                      }',
                      'complete' => 'js:function(){
                                //$("#loading").html("");
                      }',
                      'select' => 'js:function(event, ui){ 
                            jQuery("#Bien_IDBIEN").val(ui.item["id"]); 
                              
                      }'


              ),
            ));

          

      ?>

	<?php echo $form->textFieldRow($bien,'IDBIEN',array('class'=>'span5 disabled')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Buscar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
