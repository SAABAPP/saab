<?php 
$col=Yii::app()->getGlobalState('arrays');
$columns=array();
for($x=0;$x<count($col); $x++){
  if(!empty($col[$x][0]))
    array_push($columns,array('idProveedor'=>$col[$x][0], 'ruc'=>$col[$x][1], 'monto'=>$col[$x][2]));
}
$gridDataProvider = new CArrayDataProvider($columns);

$this->widget('bootstrap.widgets.TbGridView',array(
  'id'=>'cotizacion-grid',
  'dataProvider'=>$gridDataProvider,
  'type'=>'bordered hover',
  'template'=>"{items}",
  'columns'=>array(
    // array('name'=>'idProveedor', 'header'=>false,'headerHtmlOptions'=>array('style'=>'display:none'),'htmlOptions'=>array('style' => 'width:44px')),
    array('name'=>'ruc', 'header'=>false,'headerHtmlOptions'=>array('style'=>'display:none'),'htmlOptions'=>array('style' => 'width:240px')),
    array('name'=>'monto', 'header'=>false,'headerHtmlOptions'=>array('style'=>'display:none'),'htmlOptions'=>array('style' => 'width:197px')),
    // array('name'=>'unidad', 'header'=>false,'headerHtmlOptions'=>array('style'=>'display:none'),'htmlOptions'=>array('style' => 'width:204px')),
    // array('name'=>'cantidad', 'header'=>false,'headerHtmlOptions'=>array('style'=>'display:none'),'htmlOptions'=>array('style' => 'width:86px')),
    array(
      'class'=>'CButtonColumn',
      'header' => false,
      'headerHtmlOptions'=>array('style'=>'display:none'),
      'template' => '{aumentar}{disminuir}{remover}',                
      'buttons' => array(
        'aumentar'=>array(
          'title' => 'Aumentar artículo',
          'label'=>'<i class="icon-plus"></i>',
          'click'=>'js:aumentar',
          ),
        'disminuir'=>array(
          'title' => 'Aumentar artículo',
          'label'=>'&nbsp;&nbsp;<i class="icon-minus"></i>',
          'click'=>'js:disminuir',
          ),
        'remover'=>array(
          'title' => 'Aumentar artículo',
          'label'=>'&nbsp;&nbsp;<i class="icon-trash"></i>',
          'click'=>'js:remover',
          ),

        ),
      ),
    ),
));


Yii::app()->clientScript->registerScript('maintainer', "
  function aumentar(){

    $.ajax({
      type: 'post',
      url: '/saab/requerimiento/aumentarItem',
      data: {                
        idbien: $(this).parent().parent().find('td')[0].innerHTML 
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

function disminuir(){

  $.ajax({
    type: 'post',
    url: '/saab/requerimiento/disminuirItem',
    data: {                
      idbien: $(this).parent().parent().find('td')[0].innerHTML 
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
function remover(){

  $.ajax({
    type: 'post',
    url: '/saab/requerimiento/removeItem',
    data: {                
      idbien: $(this).parent().parent().find('td')[0].innerHTML 
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