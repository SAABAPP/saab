<ul id="nav">
  <!-- Main menu --> 
  <li class="has_sub"><a href="" <?php echo $a; ?>><i class="icon-list-ul"></i> Pre-Orden  <span class="pull-right"><i class="icon-chevron-right"></i></span></a>
    <ul>
      <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/requerimiento">Requerimiento</a></li>
      <?php if(Variables::model()->findByPk(5)->VAR_valor=='1')
      echo '<li><a href="'.Yii::app()->request->baseUrl.'/cuaNec">Cuadro Necesidades </a></li>';
      ?>        
    </ul>
  </li>
  <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/nea" <?php echo $c; ?>><i class="icon-plus"></i> N.E.A</a></li>
  <li class="has_sub"><a href="" <?php echo $d; ?>><i class="icon-retweet"></i> Movimientos  <span class="pull-right"><i class="icon-chevron-right"></i></span></a>
    <ul>
      <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/entrada">Registrar Entrada</a></li>
      <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/pecosa">Registrar Salida</a></li>
      <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/requerimiento/autorizacion">Autorizacion de Salida</a></li>      
    </ul>
  </li>
  <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/kardex" <?php echo $e; ?>><i class="icon-table"></i>  Kardex</a></li>
</ul>