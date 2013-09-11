<?php
$this->breadcrumbs=array(
	'Personals'=>array('index'),
	$model->IDPERSONAL=>array('view','id'=>$model->IDPERSONAL),
	'Update',
);

$this->menu=array(
	array('label'=>'List Personal','url'=>array('index')),
	array('label'=>'Create Personal','url'=>array('create')),
	array('label'=>'View Personal','url'=>array('view','id'=>$model->IDPERSONAL)),
	array('label'=>'Manage Personal','url'=>array('admin')),
);
?>

<h1>Update Personal <?php echo $model->IDPERSONAL; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>