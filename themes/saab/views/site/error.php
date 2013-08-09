<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error',
);
?>

<h2 class="text-center"></h2>

<div class="error">

<!-- div error -->
<div class="error-page">
  <div class="container-fluid">

    <div class="row-fluid">
      <div class="span12">
        <!-- Widget starts -->
            <div class="widget">
              <!-- Widget head -->
              <div class="widget-head">
                <i class="icon-thumbs-down"></i> Error <?php echo $code; ?> 
              </div>

              <div class="widget-content">
                <div class="padd error center">
                  <h1><?php echo CHtml::encode($message); ?></h1>
  
                 <br />
                 <div class="horizontal-links">
                  <a href="<?php echo Yii::app()->request->baseUrl; ?>">Inicio</a> | <a href="javascript:history.back()">Regresar</a>
                 </div>

                </div>
                <div class="widget-foot">
                  <p>Sistema Administrativo de Abastecimiento - Gerencia Regional de Educación La Libertad</p>
                </div>
              </div>
            </div>  
      </div>
    </div>
  </div> 
</div>



</div>

