<?php
$this->breadcrumbs=array(
	'Cotizacion'=>array('index'),
	'Crear',
  );
?>

  <h2 class ="center">Cotización de Requerimiento</h2>
  <h3 class="center">N° <?php echo $requerimiento->IDREQUERIMIENTO; ?></h3>
  <br>
  <div class="row-fluid">
    <div class="span12">
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
      </form>
      <hr>
      <h4 class="pull-right">Presupuesto: S/. <?php  echo (isset($requerimiento->REQ_presupuesto)) ? $requerimiento->REQ_presupuesto : "No asignado"; ?></h4>
      <h3>Ingrese las cotizaciones:</h3>
      <br>
    </div>
  </div>

<?php echo $this->renderPartial('_form', array('model'=>$model,'requerimiento'=>$requerimiento,'proveedor'=>$proveedor,'requerimiento_bien'=>$requerimiento_bien,'requerimiento_servicio'=>$requerimiento_servicio)); ?>