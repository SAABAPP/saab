
<?php


?>
<div class="span11">
	<div class="widget">

	 

	  <div class="widget-content">
	    <div class="padd">
	    	<h3 class="text-center">Porcentaje de Requerimientos por Area</h3>
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

    <!-- Bar Chart -->
  	<div class="widget">
    	<div class="widget-content">
      <div class="padd">
      	<h3 class="text-center">Numero de Requerimientos por Mes</h3>
        <!-- Barchart. jQuery Flot plugin used. -->
        <div class="row-fluid">
        	<div class="span12" style="margin-bottom:20px">
        		<div id="bar-chart"></div>
        	</div>
        	<div class="span9">
        		<table class="table table-striped table-bordered table-hover">
	        		<thead>
	        			<tr>
	        				<?php $mes=['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Setiembre','Octubre','Noviembre','Diciembre'];
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

      <!-- Bar Chart -->
  	<div class="widget">
    	<div class="widget-content">
      <div class="padd">
      	<h3 class="text-center">Bienes mas pedidos por año</h3>
        <!-- Barchart. jQuery Flot plugin used. -->
        <div class="row-fluid">
        	<div class="span12" style="margin-bottom:20px">
        		<div id="pie-chart2"></div>
        	</div>
        	<div class="span9">
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
	foreach ($counter as $key => $value) {

		echo "data[".$key."]={label:'".$value['area']."',data:".$value['count']."};";
		
	}
	
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

    $.plot($("#pie-chart2"), data,
    {
        series: {
            pie: {
                show: true
            }
        },
        grid: {hoverable: true}
    });

/* Pie chart ends */

});


</script>