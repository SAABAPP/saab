<?php
error_reporting(E_ALL ^ E_NOTICE);
$col=Yii::app()->user->getState('arrays');
$columasCotizacion=array();
$columnas=array();
$i=0;

for($x=0;$x<count($col); $x++){
  if(!empty($col[$x][0])){
    array_push($columasCotizacion,array('idProveedor'=>$col[$x][0], 'ruc'=>$col[$x][1], 'monto'=>$col[$x][2], 'razonSocial'=>$col[$x][3], 'buenaPro'=>$col[$x][4]));
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
  'header' => 'R.U.C.',
  'value'=>'$data[ruc]',
  )
);

array_push($columnas, array(
  'header' => 'Monto',
  'value'=>'$data[monto]',
  )
);

// array_push($columnas, array(
//   'header' => 'Buena Pro',
//   'value'=>'$data[buenaPro]',
//   )
// );

array_push($columnas, array(
  'class'=>'CButtonColumn',
  'header' => 'Opciones',
  'template' => '{remover}',
  'buttons' => array(
    'remover'=>array(
      'options'=>array('title'=>'Remover'),
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
  'rowCssClassExpression'=>'$data[monto]==Yii::app()->user->getState(\'montoBajo\')?"success":""',
  'columns'=>$columnas,
));

Yii::app()->clientScript->registerScript('maintainer', "

  $('#monto').numeric();
  $('#precioUnitario').numeric();
  $('#cantidad').numeric(); 
  
    
  function remover(){
    $.ajax({
      type: 'post',
      url: '".Yii::app()->request->baseUrl."/cotizacion/removeCotizacion',
      data: {                
        ruc: $(this).parent().parent().find('td')[2].innerHTML 
      },
      error:function(req, status, error) {
        alert(req.responseText);
      },
      success: function (data) {                
        $('#detalleCotizacion').html(data);         
      }
    })  
return false;
};
");
?>