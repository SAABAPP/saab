<!DOCTYPE html>
<html lang="es">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <!-- Title and other stuffs -->
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">

  <!-- Stylesheets -->
  <link href="<?php echo Yii::app()->theme->baseUrl; ?>/style/bootstrap.css" rel="stylesheet">
  <!-- Font awesome icon -->
  <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/style/font-awesome.css"> 
  <!-- jQuery UI -->
  <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/style/jquery-ui.css"> 
  <!-- Calendar -->
  <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/style/fullcalendar.css">
  <!-- prettyPhoto -->
  <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/style/prettyPhoto.css">   
  <!-- Star rating -->
  <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/style/rateit.css">
  <!-- Date picker -->
  <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/style/bootstrap-datetimepicker.min.css">
  <!-- CLEditor -->
  <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/style/jquery.cleditor.css"> 
  <!-- Uniform -->
  <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/style/uniform.default.css"> 
  <!-- Bootstrap toggle -->
  <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/style/bootstrap-toggle-buttons.css">
  <!-- Main stylesheet -->
  <link href="<?php echo Yii::app()->theme->baseUrl; ?>/style/style.css" rel="stylesheet">
  <!-- Widgets stylesheet -->
  <link href="<?php echo Yii::app()->theme->baseUrl; ?>/style/widgets.css" rel="stylesheet">   
  <!-- Responsive style (from Bootstrap) -->
  <link href="<?php echo Yii::app()->theme->baseUrl; ?>/style/bootstrap-responsive.css" rel="stylesheet">
  <!-- My Style -->
  <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/style/mystyle.css">

  <!-- Favicon -->
  <link rel="shortcut icon" href="img/favicon/icono.ico">
</head>

<body>

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
                  <form class="form-horizontal" action="home.php">
                    <!-- Email -->
                    <div class="control-group">
                      <label class="control-label" for="inputEmail">Usuario:</label>
                      <div class="controls">
                        <input type="text" id="inputEmail" placeholder="Usuario">
                      </div>
                    </div>
                    <!-- Password -->
                    <div class="control-group">
                      <label class="control-label" for="inputPassword">Contraseña:</label>
                      <div class="controls">
                        <input type="password" id="inputPassword" placeholder="Contraseña">
                      </div>
                    </div>
                    <!-- Remember me checkbox and sign in button -->
                    <div class="control-group">
                      <div class="controls">
                        <!-- <label class="checkbox">
                          <input type="checkbox"> Remember me
                        </label>
                        <br> -->
                        <button type="submit" class="btn">Ingresar</button>
                        <button type="reset" class="btn">Limpiar</button>
                      </div>
                    </div>
                  </form>

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

<!-- Javascripts -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
</body>

</html>