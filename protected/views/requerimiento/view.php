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
            if (Yii::app()->user->checkAccess("administrador") or Yii::app()->user->checkAccess("abastecimiento"))
            {
              $this->widget('bootstrap.widgets.TbGridView', array(
                'type'=>'bordered',
                'dataProvider'=>$dataProvider,
                'template'=>"{items}",
                'columns'=>array(
                  array(
                    'name'=>'N°',
                  // 'value'=>array($this,'nroColumna'),
                    ),
                  'bien.iDCATALOGO.CAT_descripcion',
                  'bien.iDCATALOGO.CAT_unidad',
                  array(
                    'name'=>'Cantidad',
                    'value'=>'$data->RBI_cantidad',
                    ),
                  'bien.BIE_stockActual',
                  'bien.BIE_stockMinimo',
                  array(
                    'name'=> 'Diferencia a Comprar',
                    'type' => 'raw',
                    'value' => array($model,'crearTexto'),
                    ),
                  ),
                )
              );
            }else{
              $this->widget('bootstrap.widgets.TbGridView', array(
                'type'=>'bordered',
                'dataProvider'=>$dataProvider,
                'template'=>"{items}",
                'columns'=>array(
                  array(
                    'name'=>'N°',
                  // 'value'=>array($this,'nroColumna'),
                    ),
                  'bien.iDCATALOGO.CAT_descripcion',
                  'bien.iDCATALOGO.CAT_unidad',
                  array(
                    'name'=>'Cantidad',
                    'value'=>'$data->RBI_cantidad',
                    ),
                  'bien.BIE_stockActual',
                  'bien.BIE_stockMinimo',
                  ),
                )
              );
            }
            
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

