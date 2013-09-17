<?php
$this->breadcrumbs=array(
	'Catalogos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Catalogo','url'=>array('index')),
	array('label'=>'Manage Catalogo','url'=>array('admin')),
);
?>

<h2>Catalogo</h2>
<br>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>