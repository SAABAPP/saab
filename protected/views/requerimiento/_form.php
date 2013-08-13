
<?php 
  // $usuario = Yii::app()->user->getState('idusuario');
  // $requerimiento= new Requerimiento();
  // $requerimiento = Requerimiento::model()->findAll($usuario);

    
  $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'requerimiento-form',
	'enableAjaxValidation'=>false,
)); ?>



	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->hiddenField($model,'REQ_estado',array('class'=>'span5','maxlength'=>20,'value'=>'Requerido')); ?>

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
  

	<?php echo $form->hiddenField($model,'REQ_presupuesto',array('class'=>'span5')); ?>

	<?php echo $form->hiddenField($model,'IDUSUARIO',array('class'=>'span5','value'=>$usuario->IDUSUARIO)); ?>
  

	<?php echo $form->hiddenField($model,'CODMETA',array('class'=>'span5','maxlength'=>4)); ?>

	<?php echo $form->hiddenField($model,'IDCUANEC',array('class'=>'span5')); ?>


            
  <div class="control-group">
    <label id="control-label" class="control-label " for="dependencia">Dependencia:</label>
    <div class="controls">
      <input type="text" id="dependencia" class="span5" value="<?=$usuario->iDPERSONAL->iDAREA->ARE_nombre?>" placeholder="Dependencia a la que pertenece..." disabled>
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
                                                  //alert(ui.item.id+" "+ui.item.label + " "+ui.item.value);
                                                  jQuery("#CODIGOCLASIFICADOR").val(ui.item["id"]); 
                                                }'

                                        ),
                                ));

                
                        


     ?>
      <input type="text" id="CODIGOCLASIFICADOR" class="span5"  placeholder="prueba...">
    </div>
  </div>
  <div class="control-group">
    <table class="table tableAdd table-bordered">
      <thead>
        <tr>
          <th >N°</th>
          <th >Bien</th>
          <!-- <th >Marca</th> -->
          <th >Característica</th>
          <th >Unidad</th>
          <th >Cantidad</th>
          <th class="button-column">Opciones</th>
        </tr>
        <tr>
          <td class="span1"></td>
          <td class="span3">
            <div class="filter-container">


              <?php 
                  $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                                          'name'=>'busca_bien',
                                          'id'=>'catalogo',
                                          'value'=>$catalogo->CAT_descripcion,
                                          'source'=>$this->createUrl('Requerimiento/buscaBien'),
                                          'options'=>array(
                                              'minLength'=>'1',
                                          ),                                                            
                                          'htmlOptions'=>array('class'=>'span12','placeholder'=>'buscar bien..'),  
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
                                                          }'

                                                  ),
                                          ));


              ?>
              <!-- <input name="" id="bien" type="text"> -->
            </div>
          </td>
          <!-- <td >
            <div class="filter-container">
              <input name="" id="marca" class="span8" type="text" disabled>
            </div>
          </td> -->
          <td >
            <div class="filter-container">
              <input name="" id="caracteristica" class="span10" type="text" disabled>
            </div>
          </td>
          <td class="span3">
            <input name="" id="unidad_catalogo"  type="text" disabled>
          </td>
          <td class="span1">
            <div class="filter-container">
              <input name="" id="cantidad" type="text" style="width:40px;">
            </div>
          </td>
          <td >
            <a class="btn btn-primary "><i class="icon-plus"></i></a>
          </td>
        </tr>
      </thead>
    </table>
    <br/>
    <?php 

        $gridDataProvider = new CArrayDataProvider(array(
            //array('id'=>1, 'bien'=>'PAPEL BOND', 'marca'=>'Kerocopy', 'caracteristica'=>'Blanco','unidad'=>'unidades','cantidad'=>'12'),
            //array('id'=>2, 'bien'=>'Jacob', 'marca'=>'Thornton', 'caracteristica'=>'JavaScript','unidad'=>'unidades','cantidad'=>'12'),
            // array('id'=>3, 'bien'=>'Stu', 'marca'=>'Dent', 'caracteristica'=>'HTML'),
        ));


        $this->widget('bootstrap.widgets.TbGridView',array(
          'id'=>'requerimiento-grid',
          //'dataProvider'=>$bien->search(),
          'dataProvider'=>$gridDataProvider,
          'type'=>'bordered hover',
          'template'=>"{items}",
          'columns'=>array(

            // 'IDBIEN',
            // 'IDCATALOGO',
            array('name'=>'id', 'header'=>false,'headerHtmlOptions'=>array('style'=>'display:none'),'htmlOptions'=>array('style' => 'width:44px')),
            array('name'=>'bien', 'header'=>false,'headerHtmlOptions'=>array('style'=>'display:none'),'htmlOptions'=>array('style' => 'width:240px')),
            array('name'=>'marca', 'header'=>false,'headerHtmlOptions'=>array('style'=>'display:none'),'htmlOptions'=>array('style' => 'width:196px')),
            array('name'=>'caracteristica', 'header'=>false,'headerHtmlOptions'=>array('style'=>'display:none'),'htmlOptions'=>array('style' => 'width:197px')),
            array('name'=>'unidad', 'header'=>false,'headerHtmlOptions'=>array('style'=>'display:none'),'htmlOptions'=>array('style' => 'width:204px')),
            array('name'=>'cantidad', 'header'=>false,'headerHtmlOptions'=>array('style'=>'display:none'),'htmlOptions'=>array('style' => 'width:86px')),

              array(
                //'header'=>false,
                'headerHtmlOptions'=>array('style'=>'display:none'),
                'htmlOptions'=>array('style' => 'width:113px'),            
                'class'=>'bootstrap.widgets.TbButtonColumn',
                'template'=>"{delete}{new}",

              ),


            
            ),
        ));
    ?>
    <!-- <table class="table table-bordered">      
      <tbody>
        <tr class="odd">
          <td>PAPEL BOND 80 g TAMAÑO A4.</td><td>Kerocopy</td><td>Blanco</td><td>Millares</td><td>25</td><td nowrap="nowrap"><a class="update" rel="tooltip" href="#" title="Update"><i class="icon-pencil"></i></a> <a class="delete" rel="tooltip" href="#" title="Delete"><i class="icon-trash"></i></a></td>
        </tr>
        <tr class="even">
          <td>BOLIGRAFO (LAPICERO) DE TINTA SECA PUNTA FINA.</td><td>Pilot</td><td>Negro</td><td>Cajas</td><td>15</td><td nowrap="nowrap"><a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td>
        </tr>
        <tr class="odd">
          <td>PLUMON DE TINTA INDELEBLE PUNTA FINA.</td><td>Artesco</td><td>Rojo</td><td>Decenas</td><td>3</td><td nowrap="nowrap"><a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td>
        </tr>
        <tr class="even">
          <td>CD REGRABABLE DE 700 MB.</td><td>Sony</td><td></td><td>Cuarto de ciento</td><td>20</td><td nowrap="nowrap"><a class="update" title="Update" rel="tooltip" href="#"><i class="icon-pencil"></i></a> <a class="delete" title="Delete" rel="tooltip" href="#"><i class="icon-trash"></i></a></td>
        </tr>
      </tbody>
    </table> -->
  </div>
  <div class="control-group">
    <label for="observaciones" class="control-label">Utilizado en:</label>
    <div class="controls">
      <input type="text" name="observaciones" placeholder="Lista de metas....">
    </div>
  </div>
  <div class="control-group center">
    <div class="controls">
      <button class="btn inline" type="submit">Guardar</button>
      <a class="btn inline secundario" type="button" href="requerimiento.php">Cancelar</a>
    </div>
  </div>
  <div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
      'buttonType'=>'submit',
      'type'=>'primary',
      'label'=>$model->isNewRecord ? 'Guardar' : 'Actualizar',
    )); ?>
  </div>

<?php $this->endWidget(); ?>

