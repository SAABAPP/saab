<?php
$current_file = basename($_SERVER['PHP_SELF']);
$a='';
$b='';
$c='';
$d='';
$e='';
$f='';
switch($current_file)
{
  case "requerimiento.php":
  $a='class="open"';
  break;
  case "cotizacion.php":
  $a='class="open"';
  break;
  case "ordenCompra.php":
  $b='class="open"';
  break;
  case "ordenServicio.php":
  $b='class="open"';
  break;
  case "reportesAdmin.php":
  $c='class="open"';
  break;
  case "nea.php":
  $d='class="open"';
  break;
  case "regEntrada.php":
  $e='class="open"';
  break;
  case "regSalida.php":
  $e='class="open"';
  break;
  case "kardex.php":
  $f='class="open"';
  break;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">

  <!-- Title and other stuffs -->
  <title>Sistema Administrativo de Abastecimiento</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <meta name="author" content="Daniel Alburquerque, Cesar Lopez, Juan Carlos Manay, David Quevedo">


  <!-- Stylesheets -->
  <link href="style/bootstrap.css" rel="stylesheet">
  <!-- Font awesome icon -->
  <link rel="stylesheet" href="style/font-awesome.css"> 
  <!-- jQuery UI -->
  <link rel="stylesheet" href="style/jquery-ui.css"> 
  <!-- Calendar -->
  <link rel="stylesheet" href="style/fullcalendar.css">
  <!-- prettyPhoto -->
  <link rel="stylesheet" href="style/prettyPhoto.css">   
  <!-- Star rating -->
  <link rel="stylesheet" href="style/rateit.css">
  <!-- Date picker -->
  <link rel="stylesheet" href="style/bootstrap-datetimepicker.min.css">
  <!-- CLEditor -->
  <link rel="stylesheet" href="style/jquery.cleditor.css"> 
  <!-- Uniform -->
  <link rel="stylesheet" href="style/uniform.default.css"> 
  <!-- Bootstrap toggle -->
  <link rel="stylesheet" href="style/bootstrap-toggle-buttons.css">
  <!-- Main stylesheet -->
  <link href="style/style.css" rel="stylesheet">
  <!-- Widgets stylesheet -->
  <link href="style/widgets.css" rel="stylesheet">   
  <!-- Responsive style (from Bootstrap) -->
  <link href="style/bootstrap-responsive.css" rel="stylesheet">
  <!-- My Style -->
  <link rel="stylesheet" href="style/mystyle.css">

  <!-- HTML5 Support for IE -->
  <!--[if lt IE 9]>
  <script src="js/html5shim.js"></script>
  <![endif]-->

  <!-- My Script -->
  <script src="js/myscript.js"></script>

  <!-- Favicon -->
  <link rel="shortcut icon" href="img/favicon/icono.ico">
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
        <a href="index.html" class="brand hidden-desktop">SAAB</a>

        <!-- Navigation starts -->
        <div class="nav-collapse collapse">
          <ul class="nav info">
            <li><span class="badge badge-info"><i class="icon-calendar"></i></span><script>mostrarFecha();</script></li>
            <li><a id="help" href="help.php"><span class="badge badge-info"><i class="icon-question-sign"></i></span> Ayuda</a></li>
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
                <li><a href="index.php"><i class="icon-off"></i> Salir</a></li>
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
            <img id="logo" src="img/logo_grell _mini.png" height="60" width="60" alt="GRELL"><h2 style="margin-left:80px;padding-top:10px;"><a href="home.php"><span class="bold">Sistema Administrativo de Abastecimiento</span></a></h2 style="padding-left:5px;padding-top:10px;">
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
    <div class="row-fluid">
      <div class="span12">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, atque, dolorem, tempore fugiat totam nihil similique perferendis voluptate cumque magnam aperiam porro autem minima ullam eos dicta ducimus rerum maiores. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est, aliquam placeat inventore incidunt officia nisi. Totam necessitatibus qui reiciendis nisi. Explicabo, autem porro recusandae molestias facilis sit veritatis vel voluptas. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo repudiandae ab laboriosam alias unde amet assumenda. Possimus, magni, consequuntur ad sit dolor sint dolore minima maiores consectetur earum autem fugit? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum, deleniti assumenda magnam quibusdam aut commodi itaque laboriosam eveniet eaque odit sit sapiente provident id animi dicta explicabo consequatur fugiat similique! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, sint, consequuntur, ab, eos illo ducimus voluptate sapiente cumque aliquam facere quibusdam porro provident consequatur vel enim. Dolores odio dolore sed!
      </div>
    </div>

  </div>
<!-- Content ends -->
<!-- Footer starts -->
<footer>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span4">
        <!-- Copyright info -->
        <p class="copy">Copyright &copy; 2013 | <a href="#">Alburquerque</a> - <a href="#">Lopez</a> - <a href="#">Manay</a> - <a href="#">Quevedo</a></p>
      </div>
      <div class="span4">
        <div id="reloj"></div>
      </div>
      <div class="span4">
        <p class="copy pull-right"><a href="http://www.grelalibertad.gob.pe/" target="_blank">Gerencia Regional de Educación La Libertad</a></p>
      </div>
    </div>
  </div>
</footer>
<!-- Footer ends -->

<!-- Scroll to top -->
<span class="totop"><a href="#"><i class="icon-chevron-up"></i></a></span> 

<!-- JS -->
<script src="js/jquery.js"></script> <!-- jQuery -->
<script src="js/bootstrap.js"></script> <!-- Bootstrap -->
<script src="js/jquery-ui-1.9.2.custom.min.js"></script> <!-- jQuery UI -->
<script src="js/fullcalendar.min.js"></script> <!-- Full Google Calendar - Calendar -->
<script src="js/jquery.rateit.min.js"></script> <!-- RateIt - Star rating -->
<script src="js/jquery.prettyPhoto.js"></script> <!-- prettyPhoto -->

<!-- jQuery Flot -->
<script src="js/excanvas.min.js"></script>
<script src="js/jquery.flot.js"></script>
<script src="js/jquery.flot.resize.js"></script>
<script src="js/jquery.flot.pie.js"></script>
<script src="js/jquery.flot.stack.js"></script>

<script src="js/sparklines.js"></script> <!-- Sparklines -->
<script src="js/jquery.cleditor.min.js"></script> <!-- CLEditor -->
<script src="js/bootstrap-datetimepicker.min.js"></script> <!-- Date picker -->
<script src="js/jquery.uniform.min.js"></script> <!-- jQuery Uniform -->
<script src="js/jquery.toggle.buttons.js"></script> <!-- Bootstrap Toggle -->
<script src="js/filter.js"></script> <!-- Filter for support page -->
<script src="js/custom.js"></script> <!-- Custom codes -->
<script src="js/charts.js"></script> <!-- Custom codes -->

</body>

</html>