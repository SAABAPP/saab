<?php
$this->breadcrumbs=array(
	'Cotizacion'=>array('index'),
	'Requerimiento N° '.$model->iDREQUERIMIENTO->IDREQUERIMIENTO,
);
?>

<h1>View Cotizacion #<?php echo $model->IDCOTIZACION; ?></h1>

<?php
$columns=array();
$i=0;

array_push($columns, array(
	'header' => 'N°',
	'value' => function($data) use(&$i){
		return ++$i;
	},
	)
);

// array_push($columns, array(
// 	'header' => 'Razon social',
// 	'value'=>'$data->proveedors->PRO_razonSocial',
// 	)
// );

// array_push($columns, array(
// 	'header' => 'R.U.C.',
// 	'value'=>'$data->proveedors->PRO_ruc',
// 	)
// );

// array_push($columns, array(
// 	'header' => 'Monto',
// 	'value'=>'$data->REQ_estado',
// 	)
// );

// array_push($columns, array(
// 	'header' => 'Fecha',
// 	'value'=>'$data->REQ_fecha',
// 	)
// );

// array_push($columns, array(
//     'name' => 'buttons',
//     'header' => 'Opc',
//     'type' => 'raw',
//     'htmlOptions' => array('class' => 'button-column'),
//     'value' => function($data) {
//         $html = "";
//         $cotizado= Yii::app()->db->createCommand()
// 	        ->select('count(*) as cont')
// 	        ->from('cotizacion C')
// 	        ->join('requerimiento R', 'R.IDREQUERIMIENTO=C.IDREQUERIMIENTO')
// 	        ->where('R.IDREQUERIMIENTO=:id', array(':id'=>$data->IDREQUERIMIENTO))
// 	        ->queryRow();
//         switch ($cotizado['cont']) {
//             case 0:
//                 $html .= CHtml::link("<i class='icon-plus'></i>", array('create', 'id' => $data->IDREQUERIMIENTO), array(
//                             'title' => 'Añadir',
//                         ));
//                 break;
//             default:
//                 $html.=CHtml::link("<i class='icon-eye-open'></i>", array("view", 'id' => $data->IDREQUERIMIENTO), array(
//                             'title' => 'Mostrar',
//                         ));
//                 break;
//         }
//         return $html;
//     },
// ));

$this->widget('bootstrap.widgets.TbGridView', array(
	'type'=>'bordered',
	'dataProvider'=>$dataProvider,
	'template'=>"{items}",
	'columns'=>$columns,
	)
);
// foreach ($model as $m) {
// 	$this->widget('bootstrap.widgets.TbDetailView',array(
// 	'data'=>$model,
// 	'attributes'=>array(
// 		'IDCOTIZACION',
// 		'COT_buenaPro',
// 		'IDREQUERIMIENTO',
// 	),
// ));
// }
?>
