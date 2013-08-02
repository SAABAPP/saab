<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>


<!-- Form area -->
<div class="admin-form">
  <div class="container-fluid">

    <div class="row-fluid">
      <div class="span12">
        <!-- Widget starts -->
            <div class="widget">
              <!-- Widget head -->
              <div class="widget-head">
                <i class="icon-lock"></i> Ingresar
              </div>

              <div class="widget-content">
                <div class="padd">
                  <!-- Login form -->
                  <!-- <form class="form-horizontal" action="home.php"> -->
                  <?php $form=$this->beginWidget('CActiveForm', array(
        						'id'=>'login-form',
        						'enableClientValidation'=>true,
                    'htmlOptions'=>array('class'=>'form-horizontal'),        						
                    'enableAjaxValidation'=>true,
                    'enableClientValidation'=>true,
                    'clientOptions'=>array('validateOnSubmit'=>true,),    
                    'focus'=>'input:visible:enabled:first',
        					)); ?>
                    <!-- Email -->
                    <div class="control-group">
                      <label class="control-label " for="inputEmail">Usuario:</label>
                      <div class="controls ">
                        <?php echo $form->textField($model,'username',array('placeholder' => 'Usuario')); ?>                        
                        <?php echo $form->error($model,'username',array('class'=>'text-error')); ?>
                      </div>
                    </div>
                    <!-- Password -->
                    <div class="control-group">

		
                      <label class="control-label " for="inputPassword">Contraseña:</label>
                      <div class="controls ">
                      	<?php echo $form->passwordField($model,'password',array('placeholder' => 'Contraseña')); ?>
                      	<?php echo $form->error($model,'password',array('class'=>'text-error')); ?>
                        <!-- <input type="password" id="inputPassword" placeholder="Contraseña"> -->
                      </div>
                    </div>
                    <!-- Remember me checkbox and sign in button -->
                    <div class="control-group">
                      <div class="controls ">
                        <!-- <label class="checkbox">
                          <input type="checkbox"> Remember me
                        </label>
                        <br> 
                        
							<?php echo $form->checkBox($model,'rememberMe'); ?>
							<?php echo $form->label($model,'rememberMe'); ?>
							<?php echo $form->error($model,'rememberMe'); ?>-->
						
                        <!-- <button type="submit" class="btn">Ingresar</button> -->
                        <?php echo CHtml::submitButton('Ingresar',array('class' => 'btn')); ?>
                        <button type="reset" class="btn secundario">Limpiar</button>

                      </div>
                    </div>
                    
                  <?php $this->endWidget(); ?>

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
