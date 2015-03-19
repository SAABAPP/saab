
<div class="span11">

      <!-- Bar Chart -->
  	<div class="widget">
    	<div class="widget-content">
      <div class="padd">
      	<h3 class="text-center">Top 10 Bienes mas pedidos</h3>
        <!-- Barchart. jQuery Flot plugin used. -->
        <div class="row-fluid">
        	<div class="span6" style="margin-bottom:20px">
        		<div id="pie-chart2"></div>
        	</div>
        	<div class="span5">
                <br>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Bien</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($counter as $value) {?>

                        <tr>
                            <th><?=$value['idbien']?></th>
                            <th><?=$value['bien']?></th>
                            <th><?=$value['total']?></th>
                        </tr>
                        <?php }?>
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

    // print_r($counter);
    echo "<script type='text/javascript'> var data=[]; var d1=[];";

	
	foreach ($counter as $key => $value) {

        echo "data[".$key."]={label:'".$value['idbien']."',data:".$value['total']."};";
        
    }

	
	echo "</script>";

	?>

<script type="text/javascript">
 

/* Pie chart starts */

$(function () {



    $.plot($("#pie-chart2"), data,
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