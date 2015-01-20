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


  <style type="text/css">
    @media print {
      .table thead th {
          font-size: 7px !important;
          line-height: 0.2;
      }
      .table td {
          text-align: center;
          font-size: 6px !important;
          line-height: 0.2;
      }
      h2 {
          font-size: 13px;
          line-height: 25px;
      }
      h4 {
          font-size: 8px;
          /*line-height: 25px;*/
      }
      form .control-label {
          /*float: none !important;*/
          /*width: auto !important;*/
          text-align: left !important;
      }    
      .form-horizontal .controls {
          padding-top: 0px;
          text-align: left !important;
      }  
    }
    
  </style>

  <!-- HTML5 Support for IE -->
  <!--[if lt IE 9]>
  <script src="js/html5shim.js"></script>
  <![endif]-->

  <!-- Scripts -->
  <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/myscript.js"></script> <!-- My script -->

  <!-- Favicon -->
  <link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/img/favicon/icono.ico">
</head>

<body >
  <script type="text/javascript">
    print();

  </script>

  <img id="logo" src="/saab/themes/saab/img/logo_grell _mini.png" height="55" width="55" alt="GRELL" style="position:absolute;top:-2px;left:40px">
  <label class="text-center" style="position:absolute;top:80px;font-size:10px;">Gerencia Regional de Educacion <br>
  de La Libertad</label>
  <div class="container">
            
    <div class="offset2 span9">
        <br><br><br>

      <?php echo $content; ?>
    </div>

    

  </div>
  <!-- JS -->
  <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.js"></script> <!-- jQuery -->
  <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap.js"></script> <!-- Bootstrap -->
  <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-ui-1.9.2.custom.min.js"></script> <!-- jQuery UI -->
  <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/fullcalendar.min.js"></script> <!-- Full Google Calendar - Calendar -->
  <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.rateit.min.js"></script> <!-- RateIt - Star rating -->
  <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.prettyPhoto.js"></script> <!-- prettyPhoto -->

  <!-- jQuery Flot -->
  <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/excanvas.min.js"></script>
  <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.flot.js"></script>
  <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.flot.resize.js"></script>
  <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.flot.pie.js"></script>
  <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.flot.stack.js"></script>

  <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/sparklines.js"></script> <!-- Sparklines -->
  <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.cleditor.min.js"></script> <!-- CLEditor -->
  <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap-datetimepicker.min.js"></script> <!-- Date picker -->
  <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.uniform.min.js"></script> <!-- jQuery Uniform -->
  <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.toggle.buttons.js"></script> <!-- Bootstrap Toggle -->
  <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/filter.js"></script> <!-- Filter for support page -->
  <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/custom.js"></script> <!-- Custom codes -->
  <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/charts.js"></script> <!-- Custom codes -->

  <!-- My jquery functions -->

  <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/myjquery.js"></script>
  <script type="text/javascript">
     $("#imprimir").attr('style','display:none');
     $(".search-form").attr('style','display:none');
      valor=$('#kardex-grid td').text(function(){   
          v=$(this).text();
          if(v=='ocultar')
            $(this).parent().remove();
        }); 

  </script>
  <?php
  $current_file = basename($_SERVER['PHP_SELF']);
  if ($current_file=="home.php") {
    include("home-script.php");
  }
  ?>
</body>

</html>
