
<?php
$columns=array();
$i=0;
$dataProvider=$requerimiento_servicio->search();

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
	'header'=>'Código Servicio',
	'htmlOptions'=>array('width'=>'1em'),
	'type' => 'raw',
	'value' => function($data) {
		return CHtml::textField('codbien[]',$data->servicio->IDSERVICIO,array('style'=>'width:5em;','disabled'=>'true','required'=>'required'));
	},
	)
);

array_push($columns, array(
	'header'=>'Precio unitario',
	'htmlOptions'=>array('width'=>'1em'),
	'type' => 'raw',
	'value' => function($data) {
		return CHtml::textField('precioUnitario[]','',array('style'=>'width:6em;','pattern'=>'[0-9]+(\.[0-9]{1,4}?)?','required'=>'required'));
	},
	)
);

array_push($columns, array(
	'header'=>'Características',
	'htmlOptions'=>array('width'=>'10em'),
	'type' => 'raw',
	'value' => function($data) {
		return CHtml::textField('caracteristica[]',$data->RSE_detalle,array('style'=>'width:10em;','disabled'=>'true','required'=>'required'));
	},
	)
);




?>
<hr>
<br>

<h3>Ingresar los detalles de los servicios</h3>
<br><br>
<div class="control-group pull-right">
            <label class="control-label">Nro Orden Servicio:</label>           
            <div class="controls"><p><input placeholder="Nro Orden" name="OrdenCompra[OC_NroOrdenCompra]" type="text" class="span12" required>
              </p></div>
</div>

<div class="control-group pull-right">
            <label class="control-label">Fecha:</label>
            <div class="controls"><b>  <?php 
            	
            	$currentDate=date('Y-m-d');
            
                if (Yii::app()->user->checkAccess("administrador")) {
                            
	                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
	                                'model' => $ordenCompra,
	                                'language' => 'es',
	                                'htmlOptions'=>array('class'=>'span10','placeholder'=>'Fecha..','required'=>'required'),
	                                'attribute' => 'OC_fecha',
	                                'options' => array(
	                                    'showAnim' => 'fold',
	                                    'minDate'=>$requerimiento->REQ_fecha,
	                                    'dateFormat' => 'yy-m-d',
	                                ),
	                    ));
	                    
	              }else{
	                echo $currentDate;
                
                
                ?>
                	<input value="<?=$currentDate?>" id="OrdenCompra_OC_fecha" name="OrdenCompra[OC_fecha]" type="hidden">
                <?php }?>
              </b>
             
          	</div>
</div>
<br><br>

<?php

$this->widget('bootstrap.widgets.TbGridView', array(
	'type'=>'bordered',
	'dataProvider'=>$dataProvider,
	'template'=>"{items}",
	'columns'=>$columns,
	)
);
?>