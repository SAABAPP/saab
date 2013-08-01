<?php
$current_file = basename($_SERVER['PHP_SELF']);
$a='';
$b='';
$c='';
$d='';
$e='';
$f='';
$g='';
switch($current_file)
{
  case "requerimiento.php":
  $a='class="open"';
  break;
  case "requerimiento2.php":
  $a='class="open"';
  break;
  case "requerimiento3.php":
  $a='class="open"';
  break;
  case "cotizacion.php":
  $a='class="open"';
  break;
  case "cotizacion2.php":
  $a='class="open"';
  break;
  case "ordenCompra.php":
  $b='class="open"';
  break;
  case "ordenCompra2.php":
  $b='class="open"';
  break;
  case "ordenServicio.php":
  $b='class="open"';
  break;
  case "ordenServicio2.php":
  $b='class="open"';
  break;
  case "reportesAdmin.php":
  $c='class="open"';
  break;
  case "nea.php":
  $d='class="open"';
  break;
  case "nea2.php":
  $d='class="open"';
  break;
  case "nea3.php":
  $d='class="open"';
  break;
  case "regEntrada.php":
  $e='class="open"';
  break;
  case "regEntrada2.php":
  $e='class="open"';
  break;
  case "regSalida.php":
  $e='class="open"';
  break;
  case "regSalida2.php":
  $e='class="open"';
  break;
  case "kardex.php":
  $f='class="open"';
  break;
  case "adminTrabajador.php":
  $g='class="open"';
  break;
  case "adminTrabajador2.php":
  $g='class="open"';
  break;
}
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
            <li><a id="help" href="help.php"><span id="badge-help" class="badge"><i class="icon-question-sign"></i></span> Ayuda</a></li>
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
                <i class="icon-user"></i> Administrador <b class="caret"></b>              
              </a>
              <!-- Dropdown menu -->
              <ul class="dropdown-menu">
                <li><a href="404.php"><i class="icon-user"></i> Perfil</a></li>
                <li><a href="404.php"><i class="icon-cogs"></i> Ajustes</a></li>
                <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/site/logout.html"><i class="icon-off"></i> Salir</a></li>
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
            <img id="logo" src="<?php echo Yii::app()->theme->baseUrl; ?>/img/logo_grell _mini.png" height="60" width="60" alt="GRELL"><h2 style="margin-left:80px;padding-top:10px;"><a href="home.php"><span class="bold">Sistema Administrativo de Abastecimiento</span></a></h2 style="padding-left:5px;padding-top:10px;">
            <p style="margin-left:80px" class="meta">Gerencia Regional de Educación La Libertad</p>
          </div>
          <!-- Logo ends -->
        </div>

        <!-- Button section -->
        <div class="span3">
          <!-- Buttons -->
          <ul class="nav nav-pills">
            <!-- Comment button with number of latest comments count -->
            <li class="dropdown dropdown-big">
              <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                <i class="icon-comments"></i> Conversaciones <span   class="badge badge-info">6</span> 
              </a>

              <ul class="dropdown-menu">
                <li>
                  <!-- Heading - h5 -->
                  <h5><i class="icon-comments"></i> Conversaciones</h5>
                  <!-- Use hr tag to add border -->
                  <hr />
                </li>
                <li>
                  <!-- List item heading h6 -->
                  <h6><a href="#">Hola :)</a> <span class="label label-warning pull-right">10:42</span></h6>
                  <div class="clearfix"></div>
                  <hr />
                </li>
                <li>
                  <h6><a href="#">¿Cómo estas?</a> <span class="label label-warning pull-right">20:42</span></h6>
                  <div class="clearfix"></div>
                  <hr />
                </li>
                <li>
                  <h6><a href="#">¿Qué haces?</a> <span class="label label-warning pull-right">14:42</span></h6>
                  <div class="clearfix"></div>
                  <hr />
                </li>                  
                <li>
                  <div class="drop-foot">
                    <a href="#">Ver todos...</a>
                  </div>
                </li>                                    
              </ul>
            </li>

            <!-- Message button with number of latest messages count-->
            <li class="dropdown dropdown-big">
              <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                <i class="icon-envelope-alt"></i> Mensajes <span class="badge badge-important">6</span> 
              </a>

              <ul class="dropdown-menu">
                <li>
                  <!-- Heading - h5 -->
                  <h5><i class="icon-envelope-alt"></i> Mensajes</h5>
                  <!-- Use hr tag to add border -->
                  <hr />
                </li>
                <li>
                  <!-- List item heading h6 -->
                  <h6><a href="#">Hola ¿Cómo estas?</a></h6>
                  <!-- List item para -->
                  <p>Lorem ipsum dolor sit amet, consectetur...</p>
                  <hr />
                </li>
                <li>
                  <h6><a href="#">¿Quedamos para hoy?</a></h6>
                  <p>Lorem ipsum dolor sit amet, consectetur...</p>
                  <hr />
                </li>
                <li>
                  <div class="drop-foot">
                    <a href="#">Ver todos...</a>
                  </div>
                </li>                                    
              </ul>
            </li>

            <!-- Members button with number of latest members count 
            <li class="dropdown dropdown-big">
              <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                <i class="icon-user"></i> Users <span   class="badge badge-success">6</span> 
              </a>

              <ul class="dropdown-menu">
                <li>-->
                  <!-- Heading - h5 
                  <h5><i class="icon-user"></i> Users</h5>-->
                  <!-- Use hr tag to add border 
                  <hr />
                </li>
                <li>-->
                  <!-- List item heading h6
                  <h6><a href="#">Ravi Kumar</a> <span class="label label-warning pull-right">Free</span></h6>
                  <div class="clearfix"></div>
                  <hr />
                </li>
                <li>
                  <h6><a href="#">Balaji</a> <span class="label label-important pull-right">Premium</span></h6>
                  <div class="clearfix"></div>
                  <hr />
                </li>
                <li>
                  <h6><a href="#">Kumarasamy</a> <span class="label label-warning pull-right">Free</span></h6>
                  <div class="clearfix"></div>
                  <hr />
                </li>                  
                <li>
                  <div class="drop-foot">
                    <a href="#">View All</a>
                  </div>
                </li>                                    
              </ul>
            </li>-->

          </ul>

        </div>

        <!-- Data section -->

        <div class="span3">
          <div class="header-data">

            <!-- Traffic data -->
            <div class="hdata">
              <div class="mcol-left">
                <!-- Icon with red background -->
                <i class="icon-signal bred"></i> 
              </div>
              <div class="mcol-right">
                <!-- Number of visitors -->
                <p>10 <em>visitas</em></p>
              </div>
              <div class="clearfix"></div>
            </div>

            <!-- revenue data -->
            <div class="hdata">
              <div class="mcol-left">
                <!-- Icon with green background -->
                <i class="icon-money bgreen"></i> 
              </div>
              <div class="mcol-right">
                <!-- Number of visitors -->
                <p>23 <em>órdenes</em></p>
              </div>
              <div class="clearfix"></div>
            </div>                        

          </div>
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
     


      <ul id="nav">
        <!-- Main menu -->
        <li class="has_sub"><a href="" <?php echo $a; ?>><i class="icon-list-ul"></i> Pre-Orden  <span class="pull-right"><i class="icon-chevron-right"></i></span></a>
          <ul>
            <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/requerimiento">Requerimiento</a></li>
            <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/cotizacion">Cotización</a></li>
          </ul>
        </li>
        <li class="has_sub"><a href="" <?php echo $b; ?>><i class="icon-list-alt"></i> Órdenes  <span class="pull-right"><i class="icon-chevron-right"></i></span></a>
          <ul>
            <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/ordenCompra">Orden de Compra</a></li>
            <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/ordenServicio">Orden de Servicios</a></li>
          </ul>
        </li> 
        <li><a href="nea.php" <?php echo $d; ?>><i class="icon-plus"></i> N.E.A</a></li>
        <li class="has_sub"><a href="" <?php echo $e; ?>><i class="icon-retweet"></i> Movimientos  <span class="pull-right"><i class="icon-chevron-right"></i></span></a>
          <ul>
            <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/regEntrada">Registrar Entrada</a></li>
            <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/regSalida">Registrar Salida</a></li>
          </ul>
        </li>
        <li><a href="kardex.php" <?php echo $f; ?>><i class="icon-table"></i>  Kardex</a></li>
        <li><a href="adminTrabajador" <?=$g; ?>><i class="icon-user"></i> Usuarios</a></li>
        <li><a href="reportesAdmin" <?php echo $c; ?>><i class="icon-file-alt"></i> Reportes</a></li>
      </ul>
    </div>
    <!-- Sidebar ends -->

    <!-- Main bar -->
    <div class="mainbar">