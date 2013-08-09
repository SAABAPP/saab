<?php
/* @var $this OrdenCompraController */
/* @var $dataProvider CActiveDataProvider */

// $this->breadcrumbs=array(
// 	'Orden Compras',
// );

// $this->menu=array(
// 	array('label'=>'Create OrdenCompra', 'url'=>array('create')),
// 	array('label'=>'Manage OrdenCompra', 'url'=>array('admin')),
// );
?>

<?php
// $this->widget('zii.widgets.CListView', array(
// 	'dataProvider'=>$dataProvider,
// 	'itemView'=>'_view',
// ));
?>

<?php
	header('Location:'.Yii::app()->request->baseUrl.'/ordenCompra/admin.html');
?>
