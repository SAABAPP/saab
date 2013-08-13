<h1>Bienvenido a la ayuda.</h1>
<br>
<?php
$var=$this->id;
$var2=$this->action->id;
$this->widget('zii.widgets.jui.CJuiAccordion',array(
  'panels'=>array(
      'panel 1'=>'content for panel 1',
      'panel 2'=>'content for panel 2',
      // panel 3 contains the content rendered by a partial view
      'panel 3'=>$this->renderPartial('_renderpage',null,true),
      // 'controlador y accion'=>$var." ".$var2,
  ),
  // additional javascript options for the accordion plugin
  'options'=>array(
      'collapsible'=> true,
      'animated'=>'bounceslide',
      'autoHeight'=>false,
      'active'=>2,
  ),
));

?>