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
                              'changeMonth'=> false,
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


?>
<div class="span11">

    <!-- Bar Chart -->
  	<div class="widget">
    	<div class="widget-content">
      <div class="padd">
      	<h3 class="text-center">Numero de Requerimientos por Mes</h3>
        <h4 class="text-center">Año: <small><?=$rango['year']?></small></h4>
        <!-- Barchart. jQuery Flot plugin used. -->
        <div class="row-fluid">
        	<div class="span12" style="margin-bottom:20px">
        		<div id="bar-chart"></div>
        	</div>
        	<div class="span11">
        		<table class="table table-striped table-bordered table-hover">
	        		<thead>
	        			<tr>
	        				<?php $mes=['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'];
	        				foreach ($mes as $value) {?>
	        				<th><?=$value?></th>
	        				<?php }?>
	        			</tr>
	        		</thead>
	        		<tbody>
	        			

	        			<tr>
	        				<?php 
	        			

	        			foreach ($val as $key => $value) {?>
	        				<th><?=$value?></th>
	        				<?php }?>
	        			</tr>
	        			
	        		</tbody>
	        	</table>
        	</div>
        </div>
        

      </div>
    	</div>
  	</div>
  <!-- Bar chart ends -->

	<div class="text-center">
		      	<a id="imprimir" href="?imprimir" class="btn btn-default" target="_blank">Imprimir Reporte</a>
	</div>
	<br>
</div>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.js"></script> <!-- jQuery -->
<!-- Scripts for this page -->
    <?php
    echo "<script type='text/javascript'> var data=[]; var d1=[];";
	
	foreach ($val as $key => $value) {
		echo "d1.push([$key, parseInt($value)]);";
	}

	
	echo "</script>";

	?>

<script type="text/javascript">
 
$(function () {

    /* Bar Chart starts */

    
    var mes=['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Setiembre','Octubre','Noviembre','Diciembre'];
    
 //    var d1 = [];
 //    for (var i = 1; i <= 12; i += 1){
 //        d1.push([i, parseInt(Math.random() * 40)]);
	// }

    console.log(d1);
    var d2 = [];
    // for (var i = 0; i <= 20; i += 1)
    //     d2.push([i, parseInt(Math.random() * 30)]);


    var stack = 0, bars = true, lines = false, steps = false;
    
    function plotWithOptions() {
        $.plot($("#bar-chart"), [ d1, d2 ], {
            series: {
                stack: stack,
                lines: { show: lines, fill: true, steps: steps },
                bars: { show: bars, barWidth: 0.8 }
            },
            grid: {
                borderWidth: 0, hoverable: true, color: "#777"
            },
            colors: ["#ff6c24", "#ff2424"],
            bars: {
                  show: true,
                  lineWidth: 0,
                  fill: true,
                  fillColor: { colors: [ { opacity: 0.9 }, { opacity: 0.8 } ] }
            }
        });


    }

    plotWithOptions();
    

 



    

    setTimeout(function(){
    	$('#bar-chart .tickLabel').each(function(index,data){
    		var valor=$(data);
    		valor.addClass('text-right');
    		valor.html(mes[index]);
    	})
    },200);

    /* Bar chart ends */

});


</script>