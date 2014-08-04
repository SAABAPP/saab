<?php
$this->breadcrumbs=array(
	'Requerimientos'=>array('index'),
	'Requerimiento N° '.$model->IDREQUERIMIENTO,
);
?>

<?php 

  Yii::app()->user->setState('comprar',null);
  Yii::app()->user->setState('idcomprar',0);

$form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
  'id'=>'requerimiento-form',
  'enableAjaxValidation'=>false,
  // 'enableClientValidation'=>false,
  // 'clientOptions'=>array(
  //     'validateOnSubmit'=>true,
  //   )
  )); ?>

<?php echo $form->errorSummary($model); ?>

<h2 class ="center">Hoja de Requerimiento</h2>
<h3 class="center">N° <?php echo $model->IDREQUERIMIENTO; ?></h3>
<br>
<div class="row-fluid">
	<div class="row-fluid">
        <div class="span12">
        <!-- Form of previsualization of requirement begins -->
        <form class="form-horizontal">
           <div class="control-group pull-right">
              <label class="control-label">Fecha:</label>
              <div class="controls"><p>  <?php 

                  $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                  'model' => $pecosa,
                                  'language' => 'es',
                                  'htmlOptions'=>array('class'=>'span12','placeholder'=>'Fecha..'),
                                  'attribute' => 'PEC_fecha',
                                  'options' => array(
                                      'showAnim' => 'fold',
                                      'dateFormat' => 'yy-m-d',
                                  ),
                      ));
                  
                  ?>
                </p></div>
          </div>  
          <?php echo $form->textFieldRow($pecosa,'PEC_NroPecosa',array('class'=>'span3','placeholder'=>'Nro de Pecosa')); ?>
          <div class="control-group">
            <label class="control-label" for="solicitante">Solicitante:</label>
            <div class="controls"><p><?php echo $model->iDUSUARIO->iDPERSONAL->PER_nombres." ".$model->iDUSUARIO->iDPERSONAL->PER_paterno." ".$model->iDUSUARIO->iDPERSONAL->PER_materno; ?></p></div>
          </div>
          <div class="control-group">
            <label class="control-label" for="dependencia">Dependencia:</label>
            <div class="controls"><p><?php echo $model->iDUSUARIO->iDPERSONAL->iDAREA->ARE_nombre; ?></p></div>
          </div>
          <div class="control-group">
            <label for="unidad" class="control-label">Unidad:</label>
            <div class="controls"><p>Gerencia Regional de Eucación La Libertad</p></div>
          </div>
          <div class="control-group">
            <?php
            $columns=array();
            $col_comprar=array();
            $i=0;
            $comprar='';

            if($model->TIPO=='b'){
                array_push($columns, array(
                  'header' => 'N°',
                  'value' => function($data) use(&$i){
                    return ++$i;
                  },
                  )
                );
                

                array_push($columns, array(
                  'header' => 'Bien',
                  'value'=>'$data->bien->iDCATALOGO->CAT_descripcion',
                  )
                );
                
                array_push($columns, array(
                  'header' => 'Unidad',
                  'value'=>'$data->bien->iDCATALOGO->CAT_unidad',
                  )
                );

                // array_push($columns, array(
                //   'header' => 'Cantidad',
                //   'value'=>'$data->RBI_cantidad',
                //   )
                // );
                array_push($columns, array(
                    'header'=>'Cantidad',
                    'type' => 'raw',
                    'value' => function($data,$col_comprar) {
                            $cant=$data->RBI_cantidad;
                            $idbien=$data->IDBIEN;
                            
                            $col_comprar=Yii::app()->user->getState('comprar');
                            $id_comprar=Yii::app()->user->getState('idcomprar');
                            $col_comprar=array_merge((array)$col_comprar,(array)$cant);
                            $id_comprar=array_merge((array)$id_comprar,(array)$idbien);
                            Yii::app()->user->setState('comprar',$col_comprar);
                            Yii::app()->user->setState('idcomprar',$id_comprar);


                            return $cant;
                    },
                    )
                  );
                
                             
            }


            $this->widget('bootstrap.widgets.TbGridView', array(
              'type'=>'bordered',
              'dataProvider'=>$dataProvider,
              'template'=>"{items}",
              'columns'=>$columns,
              )
            );
            ?>
          </div>
          <div class="control-group">
            <label for="observaciones" class="control-label">Utilizado en:</label>
            <div class="controls">
              <p><?php echo $model->cODMETA->MET_descripcion; ?></p>
            </div><br>
          <?php echo $form->hiddenField($model,'REQ_estado',array('class'=>'span5','value'=>'Finalizado')); ?>
          
          <?php

          if ((Yii::app()->user->checkAccess("administrador") or Yii::app()->user->checkAccess("almacen")) )
          {
            
            echo "<div class=\"control-group offset3\">
            <div class=\"controls\">";
            
            $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType'=>'submit',
            'type'=>'secondary',
            'label'=>$model->isNewRecord ? 'Guardar' : 'Generar Pecosa',
            )); 
            echo "</div></div>";
          }else{
            echo "<div class=\"control-group center\">
            <div class=\"controls\">
              <a id='imprimir' href='?imprimir' target='_blank' class=\"btn inline\" type=\"\" >Imprimir Requerimiento</a>
            </div>
          </div>";
          }



          ?>
        </form><br><br>
        <!-- Form of previsualization of requirement ends -->
      </div>
</div>
<?php $this->endWidget(); ?>