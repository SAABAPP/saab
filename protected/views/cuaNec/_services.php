<?php 
    
    error_reporting(E_ALL ^ E_NOTICE);
    $col=Yii::app()->user->getState('arrays');
    $columns=array();
      for($x=0;$x<count($col); $x++){
        
        if(!empty($col[$x][0]) && !empty($col[$x][1]) && !empty($col[$x][2]))
          array_push($columns,array('id'=>$col[$x][0], 'servicio'=>$col[$x][1], 'caracteristica'=>$col[$x][2]));
      }
     
      
    
    $gridDataProvider = new CArrayDataProvider($columns);



    $this->widget('bootstrap.widgets.TbGridView',array(
      'id'=>'requerimiento-grid',
      
      'dataProvider'=>$gridDataProvider,
      'type'=>'bordered hover',
      'template'=>"{items}",
      'columns'=>array(

       
        array('name'=>'id', 'header'=>false,'headerHtmlOptions'=>array('style'=>'display:none'),'htmlOptions'=>array('style' => 'width:44px')),
        array('name'=>'servicio', 'header'=>false,'headerHtmlOptions'=>array('style'=>'display:none'),'htmlOptions'=>array('style' => 'width:580px')),
        array('name'=>'caracteristica', 'header'=>false,'headerHtmlOptions'=>array('style'=>'display:none'),'htmlOptions'=>array('style' => 'width:197px')),
        // array('name'=>'unidad', 'header'=>false,'headerHtmlOptions'=>array('style'=>'display:none'),'htmlOptions'=>array('style' => 'width:204px')),
        // array('name'=>'cantidad', 'header'=>false,'headerHtmlOptions'=>array('style'=>'display:none'),'htmlOptions'=>array('style' => 'width:86px')),

        
          array(
                'class'=>'CButtonColumn',
                'header' => false,
                  'headerHtmlOptions'=>array('style'=>'display:none'),
                'template' => '{remover}',                
                'buttons' => array(                    
                    'remover'=>array(
                      'title' => 'Remover artículo',
                      'label'=>'&nbsp;&nbsp;<i class="icon-trash"></i>',
                      'click'=>'js:remover',
                    ),

                  ),
          ),



        ),
));


Yii::app()->clientScript->registerScript('maintainer', "

    $('#cantidadBien').numeric();
    
   
    function remover(){
      
      $.ajax({
            type: 'post',
            url: '".Yii::app()->request->baseUrl."/requerimiento/removeItemServicio',
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