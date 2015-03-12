<?php
$a='';
$b='';
$c='';
$d='';
$e='';
$f='';
$g='';
switch($this->id)
{
  case 'requerimiento':
  $a='class="open"';
  break;
  case "cotizacion":
  $a='class="open"';
  break;
  case "ordenCompra":
  $b='class="open"';
  break;
  case "ordenServicio":
  $b='class="open"';
  break;
  case "nea":
  $c='class="open"';
  break;
  case "entrada":
  $d='class="open"';
  break;
  case "salida":
  $d='class="open"';
  break;
  case "kardex":
  if ($this->action->id=='reportesAdmin') {
    $g='class="open"';
  }else{
    $e='class="open"';
  }  
  break;
  case "usuario":
  $f='class="open"';
  break;
  case "adminTrabajador2":
  $g='class="open"';
  break;
}
$usuario=Usuario::model()->findByAttributes(array('USU_usuario' => Yii::app()->user->getName()));
?>
<?php /* @var $this Controller */ ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo Yii::app()->language; ?>" lang="<?php echo Yii::app()->language; ?>">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=<?=Yii::app()->charset; ?>" />
  <meta name="language" content="<?php echo Yii::app()->language; ?>" />
  <meta charset="utf-8">

  <!-- Title and other stuffs -->
  <title>Sistema Administrativo de Abastecimiento</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <meta name="author" content="Daniel Alburquerque, Cesar Lopez, Juan Carlos Manay, David Quevedo">


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

  <!-- HTML5 Support for IE -->
  <!--[if lt IE 9]>
  <script src="js/html5shim.js"></script>
  <![endif]-->

  <!-- Scripts -->
  <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/myscript.js"></script> <!-- My script -->

  <!-- Favicon -->
  <link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/img/favicon/icono.ico">
</head>

<body onLoad="mostrarHora();">

  <div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container">
        <!-- Menu button for smallar screens -->
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span>Menu</span>
        </a>
        <!-- Site name for smallar screens -->
        <a href="home.php" class="brand hidden-desktop">SAAB</a>

        <!-- Navigation starts -->
        <div class="nav-collapse collapse">
          <ul class="nav info">
            <li><span class="badge"><i class="icon-calendar"></i></span><script>mostrarFecha();</script></li>
            <li><a id="help" href="<?php echo Yii::app()->request->baseUrl; ?>/site/help"><span id="badge-help" class="badge"><i class="icon-question-sign"></i></span> Ayuda</a></li>
          </ul>

          <!-- Search form -->
          <!-- <form class="navbar-search form-search pull-left">
            <div class="input-append">
              <input type="text" class="search-query sear" placeholder="Buscar...">
              <button type="submit" class="btn"><i class="icon-search"></i></button>
            </div>
          </form> -->

          <!-- Links -->
          <ul class="nav pull-right">
            <li class="dropdown pull-right">            
              <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <i class="icon-user"></i> <?php echo $usuario->iDPERSONAL->PER_nombres;//." ".$usuario->iDPERSONAL->PER_paterno." ".$usuario->iDPERSONAL->PER_materno ?> <b class="caret"></b>              
              </a>
              <!-- Dropdown menu -->
              <ul class="dropdown-menu">
                <!-- <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/404.php"><i class="icon-user"></i> Perfil</a></li> -->
                <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/usuario/update/<?php echo $usuario->IDUSUARIO; ?>"><i class="icon-cogs"></i> Ajustes</a></li>
                <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/site/logout"><i class="icon-off"></i> Salir</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <!-- Header starts -->
  <header>
    <div class="container-fluid">
      <div class="row-fluid">

        <!-- Logo section -->
        <div class="span6">
          <!-- Logo. -->
          <div class="logo">
            <img id="logo" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/logo_grell _mini.png" height="60" width="60" alt="GRELL"><h2 style="margin-left:80px;padding-top:10px;">
            <a href="<?php echo Yii::app()->request->baseUrl; ?>/site/index"><span class="bold">Sistema Administrativo de Abastecimiento</span></a></h2 style="padding-left:5px;padding-top:10px;">
            <p style="margin-left:80px" class="meta">Gerencia Regional de Educación La Libertad</p>
          </div>
          <!-- Logo ends -->
        </div>

      </div>
    </div>
  </header>

  <!-- Header ends -->

  <!-- Main content starts -->

  <div class="content">

  	<!-- Sidebar -->
  	<div class="sidebar">
      <div class="sidebar-dropdown"><a href="#">Módulos</a></div>
      <!--- Sidebar navigation -->
      <?php
      

      if (!Yii::app()->user->checkAccess("administrador"))
      {
          if (Yii::app()->user->checkAccess("almacen")) {
            include("_menuAlmacen.php");
          } else {
            if (Yii::app()->user->checkAccess("abastecimiento")) {
              include("_menuAbastecimiento.php");
            } else {
              include("_menuUsuario.php");
            }
          }

      } else {
        include("_menuAdmin.php");
      }
      
      ?>
    </div>
    <!-- Sidebar ends -->

    <!-- Main bar -->
    <div class="mainbar">