<?php include("header.php"); ?>

<!-- Page heading -->
<div class="page-head">

	<?php
       switch($this->id)
       {
       	case 'site':
       	echo "<h2 class=\"pull-left\"><i class=\"icon-home\"></i> Inicio</h2>";
       	break;
       	case 'requerimiento':
       	echo "<h2 class=\"pull-left\"><i class=\"icon-list-ul\"></i> Requerimiento</h2>";
       	break;
       	case 'cotizacion':
       	echo "<h2 class=\"pull-left\"><i class=\"icon-list-ul\"></i> Cotización</h2>";
       	break;
       	case 'ordenCompra':
       	echo "<h2 class=\"pull-left\"><i class=\"icon-list-alt\"></i> Orden de Compra</h2>";
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
       	case "usuario":
       	echo "<h2 class=\"pull-left\"><i class=\"icon-user\"></i> Usuarios</h2>";
       	break;
       }
       ?>
	<!-- Breadcrumb -->
	<div class="bread-crumb pull-right">
		<?php
		if(isset($this->breadcrumbs)):
			$this->widget('zii.widgets.CBreadcrumbs',
				array(
					'links'=>$this->breadcrumbs,
					'separator'=>' / ',
					)
				);
		endif
		?>
       </div>     

      <div class="clearfix"></div>
</div>

<div class="container-fluid"><br/>

<?php echo $content; ?>

</div>

<?php include("footer.php"); ?>
