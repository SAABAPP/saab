<?php 
  // $usuario = Yii::app()->user->getState('idusuario');
  // $requerimiento= new Requerimiento();
  // $requerimiento = Requerimiento::model()->findAll($usuario);


$form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
  'id'=>'requerimiento-form',
  'enableAjaxValidation'=>false,
  // 'enableClientValidation'=>false,
  // 'clientOptions'=>array(
  //     'validateOnSubmit'=>true,
  //   )
  )); ?>



  <?php echo $form->errorSummary($model); ?>
 

  <?php echo $form->hiddenField($model,'REQ_estado',array('class'=>'span5','maxlength'=>20,'value'=>'Necesitado')); ?>

  <?php 
    $fecha = date("Y-m-d"); //obtiene fecha actual
    
    ?>

    <?php echo $form->hiddenField($model,'REQ_fecha',array('class'=>'span5','value'=>$fecha)); ?>
    <div class="control-group">
      <label id="control-label" class="control-label" for="solicitante">Solicitante:</label>
      <div class="controls">
        <input type="text" id="solicitante" class="span5" placeholder="Su nombre..."
        value="<?php echo $usuario->iDPERSONAL->PER_nombres." ".$usuario->iDPERSONAL->PER_paterno." ".$usuario->iDPERSONAL->PER_materno; ?>" disabled>
      </div>
    </div>


    <?php echo $form->hiddenField($model,'REQ_presupuesto',array('class'=>'span5','value'=>'0')); ?>

    <?php echo $form->hiddenField($model,'IDUSUARIO',array('class'=>'span5','value'=>$usuario->IDUSUARIO)); ?>
    <?php echo $form->hiddenField($model,'TIPO',array('class'=>'span5','value'=>'b')); ?>
    <?php echo $form->hiddenField($model,'CODMETA',array('class'=>'codmeta span5')); ?>
    
    <?php echo $form->hiddenField($model,'IDCUANEC',array('class'=>'span5')); ?>
    



    <div class="control-group">
      <label id="control-label" class="control-label " for="dependencia">Dependencia:</label>
      <div class="controls">
        <input type="text" id="dependencia" class="span5" value="<?php echo $usuario->iDPERSONAL->iDAREA->ARE_nombre; ?>" placeholder="Dependencia a la que pertenece..." disabled>
      </div>
    </div>
    <div class="control-group">
      <label id="control-label" for="unidad" class="control-label">Unidad:</label>
      <div class="controls">
        <input type="text" id="unidad" class="span5" value="Gerencia Regional de Educacion la Libertad" placeholder="Unidad a la que pertenece..." disabled>
      </div>
    </div>
    <div class="control-group">
      <label id="control-label" for="clasificador" class="control-label">Clasificador:</label>    

      <div class="controls">
        <?php
        $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
          'name'=>'busca_clasificador',
          'id'=>'clasificador',
          'value'=>$clasificador->CLA_descripcion,
          'source'=>$this->createUrl('Requerimiento/buscaClasificador'),
          'options'=>array(
            'minLength'=>'1',
            ),                                                            
          'htmlOptions'=>array('class'=>'span5','placeholder'=>'A que clasificador pertenece..'),  
          'options'=>array(
            'showAnim'=>'fold',
            'beforeSend' => 'js:function(){        
                                                  //$("#loading").html("LOADING IMAGE HERE");               
            }',
            'complete' => 'js:function(){
                                                  //$("#loading").html("");
            }',
            'select' => 'js:function(event, ui){ 
               
                        jQuery("#CODIGOCLASIFICADOR").val(ui.item["id"]);
                        $.ajax({
                          type: "post",
                          url: "'.Yii::app()->request->baseUrl.'/Requerimiento/idCatalogo",
                          data: {                
                            idclasificador: ui.item["id"] 
                          },
                          error:function(req, status, error) {
                            alert(req.responseText);
                          },
                          success: function (data) {
                            
                              $("#catalogoBien").removeAttr("disabled");
                              $("#cantidadBien").removeAttr("disabled");                           
                                             

                          }
                        }) 

            }'

            ),
          ));



          ?>

          

          <input type="hidden" id="CODIGOCLASIFICADOR" class="span5"  placeholder="codigo...">
        </div>
    </div>
    <div class="control-group">
        <table class="table tableAdd table-bordered">
          <thead>
            <tr>
              <th >N°</th>
              <th >Bien</th>
              <!-- <th >Marca</th> -->
              <!-- <th >Característica</th> -->
              <th >Unidad</th>
              <th >Cantidad</th>
              <th class="button-column">Opciones</th>
            </tr>
            <tr>
              <td class="span1"></td>
              <td class="span8">
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
                                          'htmlOptions'=>array('class'=>'span12 enabled','placeholder'=>'buscar bien..','disabled'=>'true'),  
                                          'options'=>array(
                                                  'showAnim'=>'fold',
                                                  'beforeSend' => 'js:function(){        
                                                            //$("#loading").html("LOADING IMAGE HERE");               
                                                  }',
                                                  'complete' => 'js:function(){
                                                            //$("#loading").html("");
                                                  }',
                                                  'select' => 'js:function(event, ui){ 
                                                            //alert(ui.item.id+" "+ui.item.label + " "+ui.item.value);
                                                          jQuery("#unidad_catalogo").val(ui.item["unidad"]);
                                                          jQuery("#idbien").val(ui.item["id"]);  
                                                          
                                                  }'


                      ),
                    ));

                  

              ?>
              <input id="idbien" type="hidden"> 
            </div>
          </td>

          <!-- <td >
            <div class="filter-container">
              <input name="" id="marca" class="span8" type="text" disabled>
            </div>
          </td> -->
          <!-- <td class="span2">
            <div class="filter-container">
              <input name="" id="caracteristica"  type="text" disabled>
            </div>
          </td> -->
          <td class="span2">
            <input name="" id="unidad_catalogo"  type="text" disabled>
          </td>
          <td class="span1">
            <div class="filter-container">
              <input name="" id="cantidadBien" type="text" style="width:40px;" disabled>
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
                              'rbi_cantidad' => "js: $('#cantidadBien').val()",
                              'descripcion' => "js: $('#catalogoBien').val()",
                              'unidad'=>"js: $('#unidad_catalogo').val()",
                          ),
                          'error' => "function(req, status, error) {
                                          alert(req.responseText);
                                      }",
                          'success' => "function(data) {
                                          $('#clasificador').attr('disabled',true);
                                          $('#unidad_catalogo').val('');
                                          $('#idbien').val('');
                                          $('#cantidadBien').val('');
                                          $('#catalogoBien').val('');
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
  <div class="control-group">
    <label for="observaciones" class="control-label">Utilizado en:</label>
    <div class="controls">
      <?php
      $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
        'name'=>'busca_meta',
        'id'=>'meta',
        'value'=>$meta->MET_descripcion,
        'source'=>$this->createUrl('Requerimiento/buscaMeta'),
        'options'=>array(
          'minLength'=>'1',
          ),                                                            
        'htmlOptions'=>array('class'=>'span12','placeholder'=>'Ingresa el nombre de la meta...'),  
        'options'=>array(
          'showAnim'=>'fold',
          'beforeSend' => 'js:function(){        
                                                            //$("#loading").html("LOADING IMAGE HERE");               
          }',
          'complete' => 'js:function(){
                                                            //$("#loading").html("");
          }',
          'select' => 'js:function(event, ui){ 
                                                            //alert(ui.item.id+" "+ui.item.label + " "+ui.item.value);
            jQuery(".codmeta").val(ui.item["id"]);
            var $codmeta= ui.item["id"];
          }'
          ),
        ));
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
      <a class="btn inline secundario" type="button" href="admin">Cancelar</a>
    </div>
  </div>
  <div class="form-actions">
    
    </div>

    <?php $this->endWidget(); ?>
