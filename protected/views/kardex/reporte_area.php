<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'type'=>'vertical',

)); ?>
    <div class="form-group">
	    <div class="span12">
	      <div class="span3">
	        <label>Fecha</label>
	        <?php 
	        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
	                      'model' => $_requerimiento,
	                      'language' => 'es',
	                      'htmlOptions'=>array('class'=>'span12','placeholder'=>'Año..','required'=>'required'),
	                      'attribute' => 'REQ_fecha',
	                      'options' => array(
	                          'showAnim' => 'fold',
	                          'maxDate'=>'date("Y-m-d")',
	                          'changeMonth'=> true,
						      'changeYear'=> true,
						      'showButtonPanel'=> true,
						      'dateFormat'=> 'yy-mm-d',
	                          'onSelect' => 'js:function(data,event) {
	                          }'
	                      ),
	          ));
	        ?>
	      </div>
	    </div>

    </div>
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Generar',
		)); ?>
	</div>
<?php $this->endWidget(); ?>
<?php
$mes=['Month','Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'];

?>
<div class="span11">
	<div class="widget">

	 

	  <div class="widget-content">
	    <div class="padd">
	    	<h3 class="text-center">Porcentaje de Requerimientos por Area</h3>
	    	<h4 class="text-center">Fecha: <small><?=$mes[intval($rango['month'])]?>-<?=$rango['year']?></small></h4>
	      <div class="row-fluid">
	        <div class="span6">
	          <div id="pie-chart"></div>
	        </div>
	        <div class="span5">
	        	<br>
	        	<table class="table table-bordered">
	        		<thead>
	        			<tr>
	        				<th>Area</th>
	        				<th>Requerimientos</th>
	        			</tr>
	        		</thead>
	        		<tbody>
	        			<?php foreach ($counter as $key => $value) {?>

	        			<tr>
	        				<th><?=$value['area']?></th>
	        				<th><?=$value['count']?></th>
	        			</tr>
	        			<?php }?>
	        		</tbody>
	        	</table>
	        </div>
	      </div>
	      
	      

	    </div>
	  </div>
	</div>
	<br>

	<div class="text-center">
		      	<a id="imprimir" href="?imprimir" class="btn btn-default" target="_blank">Imprimir Reporte</a>
	</div>
	<br>
</div>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.js"></script> <!-- jQuery -->
<!-- Scripts for this page -->
    <?php
    echo "<script type='text/javascript'> var data=[]; var d1=[];";
	foreach ($counter as $key => $value) {

		echo "data[".$key."]={label:'".$value['area']."',data:".$value['count']."};";
		
	}
	
	echo "</script>";

	?>

<script type="text/javascript">

/* Pie chart starts */

$(function () {

    $.plot($("#pie-chart"), data,
    {
        series: {
            pie: {
                show: true
            }
        },
        grid: {hoverable: true},
        legend: {
            show: false
        }
    }); 

/* Pie chart ends */

});


</script>