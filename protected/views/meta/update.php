<?php
$this->breadcrumbs=array(
	'Metas'=>array('index'),
	$model->CODMETA=>array('view','id'=>$model->CODMETA),
	'Update',
);

$this->menu=array(
	array('label'=>'List Meta','url'=>array('index')),
	array('label'=>'Create Meta','url'=>array('create')),
	array('label'=>'View Meta','url'=>array('view','id'=>$model->CODMETA)),
	array('label'=>'Manage Meta','url'=>array('admin')),
);
?>

<h1>Update Meta <?php echo $model->CODMETA; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>