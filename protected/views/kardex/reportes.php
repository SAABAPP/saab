
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
	      <div class="text-center">
	      	<a href="?imprimir" class="btn btn-default" target="_blank">Imprimir Reporte</a>
	      </div>
	      

	    </div>
	  </div>
	</div>
</div>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.js"></script> <!-- jQuery -->
<!-- Scripts for this page -->
    <?php
    echo "<script type='text/javascript'> var data=[];";
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
                show: true,
                radius: 1,
                label: {
                    show: true,
                    radius: 3/4,
                    formatter: function(label, series){
                        return '<div style="text-align:center;padding:2px;">'+label+'<br/>'+Math.round(series.percent)+'%</div>';
                    },
                    background: { opacity: 0 }
                }
            }
        },
        grid: {hoverable: false},
        legend: {
            show: false
        }
    }); 

/* Pie chart ends */

});


</script>