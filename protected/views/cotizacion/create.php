<?php
$this->breadcrumbs=array(
	'Cotizacions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Cotizacion','url'=>array('index')),
	array('label'=>'Manage Cotizacion','url'=>array('admin')),
);
?>

<h2 class ="center">Cotización de Requerimiento</h2>
<h3 class="center">N° <?php echo $requerimiento->IDREQUERIMIENTO; ?></h3>
<br>
<div class="row-fluid">
  <div class="span12">
  <!-- Form of previsualization of requirement begins -->
  <form class="form-horizontal">
    <div class="control-group">
      <label class="control-label" for="solicitante">Solicitante:</label>
      <div class="controls"><p><?php echo $requerimiento->iDUSUARIO->iDPERSONAL->PER_nombres." ".$requerimiento->iDUSUARIO->iDPERSONAL->PER_paterno." ".$requerimiento->iDUSUARIO->iDPERSONAL->PER_materno; ?></p></div>
    </div>
    <div class="control-group">
      <label class="control-label" for="dependencia">Dependencia:</label>
      <div class="controls"><p><?php echo $requerimiento->iDUSUARIO->iDPERSONAL->iDAREA->ARE_nombre; ?></p></div>
    </div>
    <div class="control-group">
      <label for="unidad" class="control-label">Unidad:</label>
      <div class="controls"><p>Gerencia Regional de Eucación La Libertad</p></div>
    </div>
    <div class="control-group">
      <?php
      // echo $cont;
//        $this->widget('bootstrap.widgets.TbGridView', array(
//        	'type'=>'bordered',
//        	'dataProvider'=>$dataProvider,
//        	'template'=>"{items}",
//        	'columns'=>array(
//        		array(
//        			'name'=>'N°',
//        			// 'value'=>array($this,'nroColumna'),
//        		),
//        		'bien.iDCATALOGO.CAT_descripcion',
//        		'bien.iDCATALOGO.CAT_unidad',
//        		'RBI_cantidad',
//        		'bien.BIE_stockActual',
//        		'bien.BIE_stockMinimo',
//        		array(
//        			'name'=> 'Diferencia a Comprar',
//        			'type' => 'raw',
//        			'value' => array($model,'crearTexto'),
		// ),
//        	),
//        )
//        );
      ?>
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
    
    <div class="control-group">
      <label for="observaciones" class="control-label">Utilizado en:</label>
      <div class="controls">
        <p>Para programa xxxxxxxxxxxxxxxxxx.</p>
      </div>
    </div>
    <div class="control-group">
      <label for="presupuesto" class="control-label">Presupuesto:</label>
      <div class="controls">
        <input type="text" id="presupuesto" placeholder="El presupuesto es...">
      </div>
    </div>
    <div class="control-group center">
      <div class="controls">
        <button class="btn inline" type="" onClick="print();" >Guardar</button>
      </div>
    </div>
  </form>
  <!-- Form of previsualization of requirement ends -->
</div>
</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>