<?php
/* @var $this OrdenCompraController */
/* @var $model OrdenCompra */

$this->breadcrumbs=array(
	'Orden'=>array('index'),
);


?>


<h2 class="center">Orden de <?php if($model->TIPO=='c') echo 'Compra'; else echo 'Servicio'; ?></h2>
<h4 class="center">Recursos Directamente Recaudados</h4>
<h3 class="center">Nº <?php echo $model->IDORDENCOMPRA?></h3>
<br>


	<div class="row-fluid">
          <div class="span12">
            <!-- Form header of check in begins -->
            <div class="form-horizontal">
              <div class="control-group pull-right">
                <label class="control-label">R.U.C.:</label>
                <div class="controls"><p><?php echo $cotizacion->iDPROVEEDOR->PRO_ruc?></p></div>
              </div>
              <div class="control-group">
                <label class="control-label">Señor(es):</label>
                <div class="controls"><p><?php echo $cotizacion->iDPROVEEDOR->PRO_razonSocial?></p></div>
              </div>
              <div class="control-group pull-right">
                <label class="control-label">Teléfono:</label>
                <div class="controls"><p><?php echo $cotizacion->iDPROVEEDOR->PRO_telefono?></p></div>
              </div>
              <div class="control-group">
                <label class="control-label">Dirección:</label>
                <div class="controls"><p><?php echo $cotizacion->iDPROVEEDOR->PRO_direccion?></p></div>
              </div>
              <div class="control-group">
                <label class="control-label">Le agradecemos enviar a nuestro almacén en:</label>
                <div class="controls"><br><br><p><?php echo Variables::model()->findByPk(3)->VAR_valor?></p></div>
              </div>              
             
              <div class="control-group">
                <label class="control-label">Facturara a nombre de:</label>
                <div class="controls"><p><?php echo Variables::model()->findByPk(4)->VAR_valor?></p></div>
              </div>
              <div class="control-group">
                <label class="control-label">Lo siguiente:</label>
                <div class="controls"><p></p></div>
              </div>
            </div>
            <!-- Form header of check in ends -->
          </div>
  </div>

<div id="bienes">
	<?php
		if($model->TIPO=='c'){
			$this->renderPartial('_bienes',array('detalleOC'=>$detalleOC));
		}
		else 
			$this->renderPartial('_servicios',array('detalleOC'=>$detalleOC)); 		 
	?>

</div>
      <div class="control-group center">
        <div class="controls">
          <a id='imprimir' href='?imprimir' target='_blank' class="btn inline" >Imprimir Orden de Compra</a>
          
        </div>
      </div>
<br>
