<?php include("header.php"); ?>

<!-- Page heading -->
<div class="page-head">


	<?php
       switch($this->id)
       {
       	case 'site':
            if ($this->action->id=='help') {
                  echo "<h2 class=\"pull-left\"><i class=\"icon-question-sign\"></i> Ayuda</h2>";
            } else {
                  echo "<h2 class=\"pull-left\"><i class=\"icon-home\"></i> Inicio</h2>";
            };
       	break;
       	case 'requerimiento':
       	echo "<h2 class=\"pull-left\"><i class=\"icon-list-ul\"></i> Requerimiento</h2>";
       	break;
       	case 'cotizacion':
       	echo "<h2 class=\"pull-left\"><i class=\"icon-list-ul\"></i> Cotización</h2>";
       	break;
       	case 'ordenCompra':
            if ($this->action->id=='servicio') {
                  echo "<h2 class=\"pull-left\"><i class=\"icon-list-alt\"></i> Ordenes</h2>";
            } else {
                  echo "<h2 class=\"pull-left\"><i class=\"icon-list-alt\"></i> Ordenes</h2>";
            };        
       	
       	break;
       	case 'nea':
       	echo "<h2 class=\"pull-left\"><i class=\"icon-plus\"></i> Nota Entrada Almacén</h2>";
       	break;
       	case "entrada":
       	echo "<h2 class=\"pull-left\"><i class=\"icon-arrow-down\"></i> Registrar Entrada</h2>";
       	break;
       	case "pecosa":
       	echo "<h2 class=\"pull-left\"><i class=\"icon-arrow-up\"></i> Registrar Salida</h2>";
       	break;
       	case "kardex":
       	echo "<h2 class=\"pull-left\"><i class=\"icon-table\"></i> Kardex</h2>";
       	break;
       	case "personal":
       	echo "<h2 class=\"pull-left\"><i class=\"icon-user\"></i> Usuarios</h2>";
       	break;
        case "variables":
        echo "<h2 class=\"pull-left\"><i class=\"icon-globe\"></i> Variables</h2>";
        break;
        case "cuaNec":
        echo "<h2 class=\"pull-left\"><i class=\"icon-list-ul\"></i> Cuadro de Necesidades</h2>";
        break;
       }
       ?>
	<!-- Breadcrumb -->


       <div class="bread-crumb pull-right">
       	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
			'separator'=>' / ',
			
			)); ?>
		<?php endif?>
   
      </div>

      <div class="clearfix"></div>
</div>

<div class="container-fluid"><br/>
<?php $this->widget('bootstrap.widgets.TbAlert', array(
        'block'=>true, // display a larger alert block?
        'fade'=>true, // use transitions?
        'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
        'alerts'=>array( // configurations per alert type
            'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
            'info'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'),
            'error'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'),
            'warning'=>array('block'=>true, 'fade'=>true, 'closeText'=>'X'),
        ),
    )); 
?>

<?php echo $content; ?>

</div>

<?php include("footer.php"); ?>

<?php
Yii::app()->clientScript->registerScript(
   'myHideEffect',
   '$(".alert-warning").animate({opacity: 1.0}, 2500).fadeOut("slow");
   $(".alert-error").animate({opacity: 1.0}, 3000).fadeOut("slow");
   $(".alert-info").animate({opacity: 1.0}, 3000).fadeOut("slow");
   $(".alert-success").animate({opacity: 1.0}, 3500).fadeOut("slow");',
   CClientScript::POS_READY
);
?>
