<?php
// $this->breadcrumbs=array(
// 	'Neas',
// );

// $this->menu=array(
// 	array('label'=>'Create Nea', 'url'=>array('create')),
// 	array('label'=>'Manage Nea', 'url'=>array('admin')),
// );
?>

<?php
// $this->widget('zii.widgets.CListView', array(
// 	'dataProvider'=>$dataProvider,
// 	'itemView'=>'_view',
// ));
header('Location:'.Yii::app()->request->baseUrl.'/nea/admin');
?>
