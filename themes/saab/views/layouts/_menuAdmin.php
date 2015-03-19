<ul id="nav">
  <!-- Main menu --> 
  <li class="has_sub"><a href="" <?php echo $a; ?>><i class="icon-list-ul"></i> Pre-Orden  <span class="pull-right"><i class="icon-chevron-right"></i></span></a>
    <ul>
      <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/requerimiento">Requerimiento</a></li>
      <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/cuaNec">Cuadro Necesidades </a></li>      
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
  <li class="has_sub"><a href="" <?php echo $d; ?>><i class="icon-retweet"></i> Movimientos  <span class="pull-right"><i class="icon-chevron-right"></i></span></a>
    <ul>
      <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/entrada">Registrar Entrada</a></li>
      <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/pecosa/admin">Registrar Salida</a></li>
      <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/requerimiento/autorizacion">Autorizacion de Salida</a></li>
      <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/pecosa">PECOSA</a></li>       
    </ul>
  </li>
  <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/kardex" <?php echo $e; ?>><i class="icon-table"></i>  Kardex</a></li>
  <!-- <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/usuario" <?php echo $f; ?>><i class="icon-user"></i> Usuarios</a></li> -->
  <li class="has_sub"><a href="" <?php echo $g; ?>><i class="icon-file-alt"></i> Reportes <span class="pull-right"><i class="icon-chevron-right"></i></span></a>
    <ul>
      <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/kardex/reporteArea">Requerimientos por Area</a></li>
      <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/kardex/reporteMes">Requerimientos por Mes</a></li>
      <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/kardex/reporteBien">Bienes más Requeridos</a></li>
    </ul>
  </li>
  <li class="has_sub"><a href=""><i class="icon-wrench"></i> Mantenedores  <span class="pull-right"><i class="icon-chevron-right"></i></span></a>
    <ul>
      <!-- <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/catalogo">Catalogo</a></li> -->
      <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/bien">Bienes</a></li>
      <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/personal">Personal</a></li>
      <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/proveedor">Proveedor</a></li>
      <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/variables">Variables</a></li>
      <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/meta">Meta</a></li>
      <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/area">Area</a></li>
    </ul>
  </li>
</ul>