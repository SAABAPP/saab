<?php
/* @var $this OrdenCompraController */
/* @var $model OrdenCompra */

$this->breadcrumbs=array(
	'Orden'=>array('index'),
);


?>


<h2 class="center">Orden de <?php if($model->TIPO=='c') echo 'Compra'; else echo 'Servicio'; ?></h2>
<h4 class="center">Recursos Directamente Recaudados</h4>
<h3 class="center">Nº <?php echo $model->OC_NroOrdenCompra?></h3>

	<div class="row-fluid">
          <div class="span12">
            <!-- Form header of check in begins -->
            <div class="form-horizontal">
              
              <div class="control-group pull-right">
                <label class="control-label">Fecha:</label>
                <div class="controls"><h3><?php echo $model->OC_fecha?></h3></div>
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
              <div class="control-group ">
                <label class="control-label">Le agradecemos enviar a nuestro almacén en:</label>
                <div class="controls"><br><p><?php echo Variables::model()->findByPk(3)->VAR_valor?></p></div>
              </div>              
             
              <div class="control-group ">
                <label class="control-label">Facturara a nombre de:</label>
                <div class="controls"><p><?php echo Variables::model()->findByPk(4)->VAR_valor?></p></div>
              </div>
              <!-- <div class="control-group">
                <label class="control-label">Lo siguiente:</label>
                <div class="controls"><p></p></div>
              </div> -->
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
  <div class="pull-right well">
   
    <?php $total=Yii::app()->user->getState('total');
        echo 'Total: S/. '.$total;
    ?>
  </div><br><br>
<div style="margin-left:60px">
  <table border="1">
    <tbody >
      <tr>
        <td colspan="3" class="text-center" >Son: <?php $this->widget('ext.numaletras.numerosALetras',array('valor'=>$total,'despues'=>'Nuevos Soles')); 

         ?>  </td>
      </tr>      
      <tr>
        <td  class="text-center"><br>Director de Administracion</td>
        <td  class="text-center"><br>Jefe de Abastecimiento</td>
        <td></td>        
      </tr>
      <tr>
        <td colspan="3" >Programa: &nbsp;&nbsp;&nbsp;&nbsp;<br>
          Componente: &nbsp;&nbsp;&nbsp;&nbsp;<br>
          SEC/FUN: &nbsp;&nbsp;&nbsp;&nbsp;<br>
          SIAI - Nº: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </td>
        
      </tr>
      <tr rowspan="3">
        <td class="nota" colspan="2">NOTA:
          <br>
          -Esta orden de compra carece de valor si no cuenta con las firmas mancomunadas 1 y 2.<br>
          -Cada orden de compra se emitira en original y 3 copias<br>
          -La factura debera ser remitida a la oficina de presupuesto y contabilidad<br>
          -Nos reservamos el derecho de devolver la mercaderia que no esté de acuerdo con.</td>
        <td >Fecha:<br> &nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;/&nbsp;&nbsp;</td>
      </tr>
    </tbody>

  </table>
</div>

<br><br><br>
</div>
      <div class="control-group center">
        <div class="controls">
          <a id='imprimir' href='?imprimir' target='_blank' class="btn inline" >Imprimir Orden de Compra</a>
          
        </div>
      </div>
<br>
