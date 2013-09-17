<?php 
    

    $col=Yii::app()->user->getState('arrays_nea');
    $columns=array();
      for($x=0;$x<count($col); $x++){
        
        if(!empty($col[$x][0]) && !empty($col[$x][1]) && !empty($col[$x][2]) && !empty($col[$x][3]) && !empty($col[$x][4]))
          array_push($columns,array('id'=>$col[$x][0], 'bien'=>$col[$x][1],'unidad'=>$col[$x][2], 'cantidad'=>$col[$x][3],'precio'=>$col[$x][4],'subtotal'=>$col[$x][5]));
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
        array('name'=>'bien', 'header'=>false,'headerHtmlOptions'=>array('style'=>'display:none'),'htmlOptions'=>array('style' => 'width:240px')),
        array('name'=>'unidad', 'header'=>false,'headerHtmlOptions'=>array('style'=>'display:none'),'htmlOptions'=>array('style' => 'width:97px')),
        array('name'=>'cantidad', 'header'=>false,'headerHtmlOptions'=>array('style'=>'display:none'),'htmlOptions'=>array('style' => 'width:204px')),
        array('name'=>'precio', 'header'=>false,'headerHtmlOptions'=>array('style'=>'display:none'),'htmlOptions'=>array('style' => 'width:86px')),
        array('name'=>'subtotal', 'header'=>false,'headerHtmlOptions'=>array('style'=>'display:none'),'htmlOptions'=>array('style' => 'width:86px')),

        
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

?>




<?php 
Yii::app()->clientScript->registerScript('maintainer', "


   $('#cantidadBien').numeric();
   $('#precio_unitario').numeric(',');
   $('.checkt').numeric();

   $(document).ready(function() {
      
      $('.checkb').click(function(){
        console.log('se hiso click en un checkbox');
         var valor=$(this).attr('id');
          if (!$(this).is(':checked')) {
              console.log('habilitar checkbox');                          
              $('#_'+valor+'').attr('disabled',true);
              $('#_'+valor+'').val('');              
          }
          else{
              console.log('desahabilitar checkbox');
              $('#_'+valor+'').removeAttr('disabled');
              $('#_'+valor+'').focus();
          }          

      });          

   });
   

   $('#precio_unitario').keyup(function(e){      
      var sub_total= $('#precio_unitario').val() * $('#cantidadBien').val();
      $('#sub_total').val(sub_total);
   });
   $('#cantidadBien').keyup(function(e){      
      var sub_total= $('#precio_unitario').val() * $('#cantidadBien').val();
      $('#sub_total').val(sub_total);
   });

    function aumentar(){
      
      $.ajax({
            type: 'post',
            url: '".Yii::app()->request->baseUrl."/nea/aumentarItem',
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
            url: '".Yii::app()->request->baseUrl."/nea/disminuirItem',
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
            url: '".Yii::app()->request->baseUrl."/nea/removeItem',
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