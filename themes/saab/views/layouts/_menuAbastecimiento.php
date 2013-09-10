<ul id="nav">
  <!-- Main menu --> 
  <li class="has_sub"><a href="" <?php echo $a; ?>><i class="icon-list-ul"></i> Pre-Orden  <span class="pull-right"><i class="icon-chevron-right"></i></span></a>
    <ul>
      <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/requerimiento">Requerimiento</a></li>
      <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/cotizacion">Cotización</a></li>
    </ul>
  </li>
  <li class="has_sub"><a href="" <?php echo $b; ?>><i class="icon-list-alt"></i> Órdenes  <span class="pull-right"><i class="icon-chevron-right"></i></span></a>
    <ul>
      <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/ordenCompra">Orden de Compra</a></li>
      <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/ordenCompra/servicio">Orden de Servicios</a></li>
    </ul>
  </li> 
  <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/nea" <?php echo $c; ?>><i class="icon-plus"></i> N.E.A</a></li>
  <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/kardex" <?php echo $e; ?>><i class="icon-table"></i>  Kardex</a></li>
  <li><a href="reportesAdmin" <?php echo $g; ?>><i class="icon-file-alt"></i> Reportes</a></li>
</ul>