  </div>
  <!-- Mainbar ends -->

  <div class="clearfix"></div>

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
        <p class="copy center"><a href="http://www.grelalibertad.gob.pe/" target="_blank">Gerencia Regional de Educación La Libertad</a></p>
      </div>
    </div>
  </div>
</footer>
<!-- Footer ends -->

<!-- Scroll to top -->
<span class="totop"><a href="#"><i class="icon-chevron-up"></i></a></span> 

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

<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.numeric.js"></script>

<?php
$current_file = basename($_SERVER['PHP_SELF']);
if ($current_file=="home.php") {
  include("home-script.php");
}
?>
</body>

</html>