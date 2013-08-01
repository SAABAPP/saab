<?php include("header.php"); ?>

<!-- Page heading -->
<div class="page-head">
       <h2 class="pull-left"><i class="icon-list-ul"></i>
       	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'homeLink' => CHtml::link('Initial Page', Yii::app()->homeUrl),
			
			)); ?>
		<?php endif?>
		</h2>
       <!-- Breadcrumb -->

       <div class="bread-crumb pull-right">
       	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
			'separator'=>' / ',
			
			)); ?>
		<?php endif?>
   
      	</div>
      <div class="clearfix"></div>
</div>

<div class="container-fluid"><br/>

<?php echo $content; ?>

</div>

<?php include("footer.php"); ?>
