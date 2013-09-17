<?php
$this->breadcrumbs=array(
  'Requerimientos'=>array('index'),
  'Requerimiento N° '.$model->IDREQUERIMIENTO,
);
?>

<?php 

Yii::app()->clearGlobalState('comprar');
Yii::app()->clearGlobalState('idcomprar');

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

                array_push($columns, array(
                  'header' => 'Cantidad',
                  'value'=>'$data->RBI_cantidad',
                  )
                );
                
                if ((Yii::app()->user->checkAccess("administrador") or Yii::app()->user->checkAccess("abastecimiento")) && ($model->REQ_estado=='Requerido' or $model->REQ_estado=='Necesitado'))
                {
                  array_push($columns, array(
                    'header' => 'Stock actual',
                    'value'=>'$data->bien->BIE_stockActual',
                    )
                  );
                  
                  array_push($columns, array(
                    'header' => 'Stock mínimo',
                    'value'=>'$data->bien->BIE_stockMinimo',
                    )
                  );
                  
                  array_push($columns, array(
                    'header'=>'Cantidad a comprar',
                    'type' => 'raw',
                    'value' => function($data,$col_comprar) {
                            $cant=$data->RBI_cantidad;
                            $stock=$data->bien->BIE_stockActual;
                            $min=$data->bien->BIE_stockMinimo;
                            $idbien=$data->IDBIEN;
                            $compra=0;

                            if($stock >= $cant){
                              if(($stock-$cant)<$min)
                                $compra=2*$cant+($min - $stock);
                              else
                                $compra=$cant;
                            }
                            else
                              $compra=$min - ($stock - $cant);

                            $col_comprar=Yii::app()->user->getState('comprar');
                            $id_comprar=Yii::app()->user->getState('idcomprar');
                            $col_comprar=array_merge((array)$col_comprar,(array)$compra);
                            $id_comprar=array_merge((array)$id_comprar,(array)$idbien);
                            Yii::app()->user->setState('comprar',$col_comprar);
                            Yii::app()->user->setState('idcomprar',$id_comprar);


                            return CHtml::textField('cantidad', $compra);
                    },
                    )
                  );
                }              
            }
            else{
                array_push($columns, array(
                  'header' => 'N°',
                  'value' => function($data) use(&$i){
                    return ++$i;
                  },
                  )
                );
                

                array_push($columns, array(
                  'header' => 'Servicio',
                  'value'=>'$data->servicio->iDCATALOGO->CAT_descripcion',
                  )
                );
                
                array_push($columns, array(
                  'header' => 'Descripcion',
                  'value'=>'$data->RSE_detalle',
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
            </div>
          </div>
          
          <?php
          if ((Yii::app()->user->checkAccess("administrador") or Yii::app()->user->checkAccess("abastecimiento")) && ($model->REQ_estado=='Requerido' or $model->REQ_estado=='Necesitado'))
          {
            echo "<div class=\"control-group\">
            <label for=\"presupuesto\" class=\"control-label\">Presupuesto:</label>
            <div class=\"controls\">
              ".$form->textField($model,'REQ_presupuesto',array('class'=>'span3','placeholder'=>'ingresar un presupuesto..'))."
            </div>
          </div>";

          }
          ?>
          <?php

          if ((Yii::app()->user->checkAccess("administrador") or Yii::app()->user->checkAccess("abastecimiento")) && ($model->REQ_estado=='Requerido' or $model->REQ_estado=='Necesitado'))
          {
            
            echo "<div class=\"control-group offset3\">
            <div class=\"controls\">";
            if ($model->TIPO=='b') {
                echo "<a href='salida/".$model->IDREQUERIMIENTO."' class=\"btn inline\" type=\"\" >Autorizar Salida</a>&nbsp;&nbsp;&nbsp;&nbsp;";
            }
            $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType'=>'submit',
            'type'=>'primary',
            'label'=>$model->isNewRecord ? 'Guardar' : 'Asignar Presupuesto',
            )); 
            echo "</div></div>";
          }else{
            echo "<div class=\"control-group center\">
            <div class=\"controls\">
              <a id='imprimir' href='?imprimir' target='_blank' class=\"btn inline\" type=\"\" >Imprimir Cuadro de Necesidades</a>
            </div>
          </div>";
          }



          ?>
        </form>
        <!-- Form of previsualization of requirement ends -->
      </div>
</div>
<?php $this->endWidget(); ?>
