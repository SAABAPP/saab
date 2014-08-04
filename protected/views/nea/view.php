<?php
/* @var $this NeaController */
/* @var $model Nea */

$this->breadcrumbs=array(
	'NEA'=>array('index'),
	$model->IDENTRADA,
);


?>

<h2 class="center">NEA </h2>
<h4 class="center">Nota de Entrada al Almacén</h4>
<h3 class="center">Nº<?php echo $model->IDENTRADA; ?></h3>
<br>


	<div class="row-fluid">
          <div class="span12">
            <!-- Form header of check in begins -->
            <div class="form-horizontal">
            	<div class="control-group pull-right">
                	<label class="control-label">Fecha:</label>
                	<div class="controls"><p><?php echo $model->iDENTRADA->ENT_fecha?></p></div>            		
            	</div>
              	<div class="control-group">
                	<label class="control-label">Procedencia:</label>
                	<div class="controls"><p><?php echo $model->NEA_procedencia?></p></div>
              	</div>
            	<div class="control-group ">
                	<label class="control-label">Con destino a:</label>
                	<div class="controls"><p><?php echo Variables::model()->findByPk(4)->VAR_valor?></p></div>
              	</div>              
             
              </div>
            <!-- Form header of check in ends -->
          </div>
  </div>

<div id="bienes">
	<?php

		$this->renderPartial('_bienes',array('entradaBien'=>$entradaBien));
 
	?>


</div>
      <div class="control-group center">
        <div class="controls">
          <a id='imprimir' href='?imprimir' target='_blank' class="btn inline" >Imprimir Nota de Entrada</a>
          
        </div>
      </div>
<br>
