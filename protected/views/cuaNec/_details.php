<?php 
    
    error_reporting(E_ALL ^ E_NOTICE);
    $col=Yii::app()->user->getState('arrays');

    $columns=array();
      for($x=0;$x<count($col); $x++){
        
        if(!empty($col[$x][0]) && !empty($col[$x][1]) && !empty($col[$x][2]))
          array_push($columns,array('id'=>$col[$x][0], 'bien'=>$col[$x][2], 'cantidad'=>$col[$x][1]));
      }
     
      
    
    $gridDataProvider = new CArrayDataProvider($columns);



    $this->widget('bootstrap.widgets.TbGridView',array(
      'id'=>'requerimiento-grid',
          //'dataProvider'=>$bien->search(),
      'dataProvider'=>$gridDataProvider,
      'type'=>'bordered hover',
      'template'=>"{items}",
      'columns'=>array(

            // 'IDBIEN',
            // 'IDCATALOGO',
        array('name'=>'id', 'header'=>false,'headerHtmlOptions'=>array('style'=>'display:none'),'htmlOptions'=>array('style' => 'width:44px')),
        array('name'=>'bien', 'header'=>false,'headerHtmlOptions'=>array('style'=>'display:none'),'htmlOptions'=>array('style' => 'width:580px')),
        // array('name'=>'caracteristica', 'header'=>false,'headerHtmlOptions'=>array('style'=>'display:none'),'htmlOptions'=>array('style' => 'width:197px')),
        array('name'=>'unidad', 'header'=>false,'headerHtmlOptions'=>array('style'=>'display:none'),'htmlOptions'=>array('style' => 'width:214px')),
        array('name'=>'cantidad', 'header'=>false,'headerHtmlOptions'=>array('style'=>'display:none'),'htmlOptions'=>array('style' => 'width:46px')),

        
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

    $('#cantidadBien').numeric();
    
    function aumentar(){
      
      $.ajax({
            type: 'post',
            url: '".Yii::app()->request->baseUrl."/requerimiento/aumentarItem',
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
            url: '".Yii::app()->request->baseUrl."/requerimiento/disminuirItem',
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
            url: '".Yii::app()->request->baseUrl."/requerimiento/removeItem',
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