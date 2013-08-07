<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<!-- 
<div class="row-fluid">
	<div class="span10">
		
	</div>

</div> -->

<div class="row-fluid">

	<div class="contenido-total">
		<div id="sidebar pull-right">
		<?php
			$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>'',
			));
			
			// $this->widget('zii.widgets.CMenu', array(
			// 	'items'=>$this->menu,
			// 	'htmlOptions'=>array('class'=>'operations inline pull-right'),
			// ));
			$this->endWidget();
		?>
		</div><!-- sidebar -->

		<!-- content-->
			<?php echo $content; ?>
		<!-- content -->
	</div>
	
</div>

<?php $this->endContent(); ?>