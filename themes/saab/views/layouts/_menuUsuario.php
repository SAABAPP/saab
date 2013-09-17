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
</ul>