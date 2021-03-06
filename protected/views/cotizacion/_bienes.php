
<?php
$columns=array();
$i=0;
$dataProvider=$requerimiento_bien->search();

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
	'htmlOptions'=>array('width'=>'1em'),
	'type' => 'raw',
	'value'=>function($data) {
		return CHtml::textField('cantidad[]',$data->RBI_cantidadComprar,array('style'=>'width:5em;','disabled'=>'true','required'=>'required'));
	},
	)
);

array_push($columns, array(
	'header'=>'Código bien',
	'htmlOptions'=>array('width'=>'1em'),
	'type' => 'raw',
	'value' => function($data) {
		return CHtml::textField('codbien[]',$data->bien->IDBIEN,array('style'=>'width:5em;','disabled'=>'true','required'=>'required'));
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
		return CHtml::textField('caracteristica[]','',array('style'=>'width:10em;','required'=>'required'));
	},
	)
);

array_push($columns, array(
	'header'=>'Marca',
	'htmlOptions'=>array('width'=>'10em'),
	'type' => 'raw',
	'value' => function($data) {
		return CHtml::textField('marca[]','',array('style'=>'width:10em;','required'=>'required'));
	},
	)
);


?>
<hr>
<br>

<h3>Ingresar los detalles de los bienes</h3>
<br><br>
<div class="control-group pull-right">
            <label class="control-label">Nro Orden Compra:</label>           
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