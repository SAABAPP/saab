<?php
$this->breadcrumbs=array(
	'PECOSA'=>array('index'),
	$model->IDPECOSA,
);


?>

<h2 class="center">PECOSA </h2>
<h4 class="center">Pedido Comprobantes de Salida</h4>
<h3 class="center">Nº<?php echo $model->PEC_NroPecosa; ?></h3>
<br>


	<div class="row-fluid">
          <div class="span12">
            <!-- Form header of check in begins -->
            <div class="form-horizontal">
            	<div class="control-group pull-right">
                	<label class="control-label">Fecha:</label>
                	<div class="controls"><p><?php echo $model->PEC_fecha?></p></div>            		
            	</div>
            	<div class="control-group">
                	<label class="control-label">Unidad Ejecutora:</label>
                	<div class="controls"><p><?php echo Variables::model()->findByPk(4)->VAR_valor?></p></div>
              	</div>
              	<div class="control-group">
                	<label class="control-label">Documento Referencia:</label>
                	<div class="controls"><p><?php echo $model->PEC_referencia?></p></div>
              	</div>
            	<div class="control-group ">
                	<label class="control-label">Con destino a:</label>
                	<div class="controls"><p><?php echo $model->iDREQUERIMIENTO->iDUSUARIO->iDPERSONAL->iDAREA->ARE_nombre; ?></p></div>
              	</div>              
             
              </div>
            <!-- Form header of check in ends -->
          </div>
  </div>

<div id="bienes">
	<?php

		$this->renderPartial('_bienes',array('pecosaBien'=>$pecosaBien));
 
	?>


</div>
      <div class="control-group center">
        <div class="controls">
          <a id='imprimir' href='?imprimir' target='_blank' class="btn inline" >Imprimir PECOSA</a>
          
        </div>
      </div>
<br>
