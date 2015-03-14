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
              'htmlOptions'=>array('class'=>'span6','placeholder'=>'Buscar Articulo..'),  
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
  <div class="form-group">
    <div class="span12">
      <div class="span3">
        <label>Min</label>
        <input id="bien_min" type="date" name="Bien[min]" step="1" min="2013-01-01" max="<?=date('Y-m-d')?>" required>

      </div>
      <div class="span3">
        <label>Max</label>
        <input id="bien_max" type="date" name="Bien[max]" step="1" min="2013-01-01" max="<?=date('Y-m-d')?>" required="required" disabled>
      </div>
    </div>

  </div>

	<?php echo $form->textFieldRow($bien,'IDBIEN',array('class'=>'span4 disabled')); ?>

  
  <br>
  

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Buscar',
		)); ?>
	</div>

<?php $this->endWidget(); ?>

<script type="text/javascript">
  $('#bien_min').on('change',function(event){
    
    var value=$(event.currentTarget).val();
    console.log('cambiando',value);
    $('#bien_max').attr('min',value);
    $('#bien_max').attr('disabled',false);

  });



</script>