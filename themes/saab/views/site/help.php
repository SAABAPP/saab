<h1>Bienvenido a la ayuda.</h1>
<br>
<?php
$this->widget('zii.widgets.jui.CJuiAccordion', array(
  'panels'=>array(
    'panel 1'=>'content for panel 1',
    'panel 2'=>'content for panel 2',
    // panel 3 contains the content rendered by a partial view
    //'panel 3'=>$this->renderPartial('contact.php',null,true),
    'panel 4'=>'content for panel 2',
  ),
  // additional javascript options for the accordion plugin
  'options'=>array(
    'animated'=>'bounceslide',
  ),
));
?>