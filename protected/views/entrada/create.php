<?php
$this->breadcrumbs=array(
	'Entradas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Entrada','url'=>array('index')),
	array('label'=>'Manage Entrada','url'=>array('admin')),
);
?>

<h2 class="center">Orden de Compra - Guía de Internamiento</h2>
<h4 class="center">Recursos Directamente Recaudados</h4>
<h3 class="center">Nº <?php echo $ordenCompra->IDORDENCOMPRA?></h3>
<br>

<?php echo $this->renderPartial('_form', array('model'=>$model,'ordenCompra'=>$ordenCompra,'cotizacion'=>$cotizacion,'entradaOC'=>$entradaOC,'requerimiento_bien'=>$requerimiento_bien)); ?>