<?php
error_reporting(E_ALL ^ E_NOTICE);
$col=Yii::app()->getGlobalState('arrays');
$columasCotizacion=array();
$columnas=array();
$i=0;

for($x=0;$x<count($col); $x++){
  if(!empty($col[$x][0])){
    array_push($columasCotizacion,array('idProveedor'=>$col[$x][0], 'ruc'=>$col[$x][1], 'monto'=>$col[$x][2], 'razonSocial'=>$col[$x][3]));
  }
}

$gridDataProvider = new CArrayDataProvider($columasCotizacion);

array_push($columnas, array(
  'header' => 'N°',
  'value' => function($data) use(&$i){
    return ++$i;
  },
));

array_push($columnas, array(
  'header' => 'Razón Social',
  'value'=>'$data[razonSocial]',
  )
);

array_push($columnas, array(
  'header' => 'Monto',
  'value'=>'$data[monto]',
  )
);

array_push($columnas, array(
  'class'=>'CButtonColumn',
  'header' => 'Opciones',
  'headerHtmlOptions'=>array('style'=>'width:1em'),
  'template' => '{remover}',                
  'buttons' => array(
    'remover'=>array(
      'title' => 'Aumentar artículo',
      'label'=>'<i class="icon-trash"></i>',
      'click'=>'js:remover',
      ),

    ),
));

$this->widget('bootstrap.widgets.TbGridView',array(
  'id'=>'cotizacion-grid',
  'dataProvider'=>$gridDataProvider,
  'type'=>'bordered hover',
  'template'=>"{items}",
  'columns'=>$columnas,
));

Yii::app()->clientScript->registerScript('maintainer', "
  function remover(){
    $.ajax({
      type: 'post',
      url: '/saab/cotizacion/removeCotizacion',
      data: {                
        fila: $(this).parent().parent().find('td')[0].innerHTML 
      },
      error:function(req, status, error) {
        alert(req.responseText);
      },
      success: function (data) {                
        $('#order-detail-div').html(data);         
      }
    })  
return false;
};
");
?>