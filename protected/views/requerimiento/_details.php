<?php 


    $col=Yii::app()->getGlobalState('arrays');
    $columns=array();
      for($x=0;$x<count($col); $x++){
        array_push($columns,array('id'=>$col[$x][0], 'bien'=>$col[$x][2], 'caracteristica'=>'Blanco','unidad'=>'unidades','cantidad'=>$col[$x][1]));
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
        array('name'=>'caracteristica', 'header'=>false,'headerHtmlOptions'=>array('style'=>'display:none'),'htmlOptions'=>array('style' => 'width:197px')),
        array('name'=>'unidad', 'header'=>false,'headerHtmlOptions'=>array('style'=>'display:none'),'htmlOptions'=>array('style' => 'width:204px')),
        array('name'=>'cantidad', 'header'=>false,'headerHtmlOptions'=>array('style'=>'display:none'),'htmlOptions'=>array('style' => 'width:86px')),

        array(
                //'header'=>false,

                'headerHtmlOptions'=>array('style'=>'display:none'),
                'htmlOptions'=>array('style' => 'width:113px'),            
                'class'=>'bootstrap.widgets.TbButtonColumn',
                'template'=>"{delete}",


          ),



        ),
));
?>