<?php
$this->breadcrumbs=array(
	'Requerimientos'=>array('index'),
	'Requerimiento N° '.$model->IDREQUERIMIENTO,
);
?>

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
            $i=0;
            $comprar='';

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
            
            if (Yii::app()->user->checkAccess("administrador") or Yii::app()->user->checkAccess("abastecimiento"))
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
                'value' => function($data) {
                  return CHtml::textField('cantidad', $data->RBI_cantidad);
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
            </div>
          </div>
          <?php
          if (Yii::app()->user->checkAccess("administrador") or Yii::app()->user->checkAccess("abastecimiento"))
          {
          	echo "<div class=\"control-group center\">
            <div class=\"controls\">
              <button class=\"btn inline disabled\" type=\"\">Autorizar Salida</button>
            </div>
          </div>";
          }
          ?>
          <?php
          if (Yii::app()->user->checkAccess("administrador") or Yii::app()->user->checkAccess("abastecimiento"))
          {
            echo "<div class=\"control-group\">
            <label for=\"presupuesto\" class=\"control-label\">Presupuesto:</label>
            <div class=\"controls\">
              <input type=\"text\" id=\"presupuesto\" placeholder=\"El presupuesto es...\">
            </div>
          </div>";
          }
          ?>
          <?php
          if (Yii::app()->user->checkAccess("administrador") or Yii::app()->user->checkAccess("abastecimiento"))
          {
            echo "<div class=\"control-group center\">
            <div class=\"controls\">
              <button class=\"btn inline\" type=\"\" onClick=\"print();\" >Guardar</button>
            </div>
          </div>";
          }else{
            echo "<div class=\"control-group center\">
            <div class=\"controls\">
              <button class=\"btn inline\" type=\"\" onClick=\"print();\" >Imprimir</button>
            </div>
          </div>";
          }
          ?>
        </form>
        <!-- Form of previsualization of requirement ends -->
      </div>
</div>

