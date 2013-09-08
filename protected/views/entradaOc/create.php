<?php
$this->breadcrumbs=array(
	'Entrada Ocs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EntradaOc','url'=>array('index')),
	array('label'=>'Manage EntradaOc','url'=>array('admin')),
);
?>

<h1>Create EntradaOc</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>