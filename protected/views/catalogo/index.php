<?php
// $this->breadcrumbs=array(
// 	'Requerimientos',
// );

// $this->menu=array(
// 	array('label'=>'Create Requerimiento','url'=>array('create'),'itemOptions'=>array('class'=>'btn btn-large btn-primary')),
// 	array('label'=>'Manage Requerimiento','url'=>array('admin'),'itemOptions'=>array('class'=>'btn btn-large btn-primary')),
// );


?>



<?php 
	// $this->widget('bootstrap.widgets.TbListView',array(
	// 	'dataProvider'=>$dataProvider,
	// 	'itemView'=>'_view',
	// ));
 ?>

<?php
	header('Location:'.Yii::app()->request->baseUrl.'/catalogo/admin');
?>
