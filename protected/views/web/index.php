<?php
/* @var $this WebController */

$this->breadcrumbs=array(
	'Web',
);
?>
<?php if(isset($model)): ?>
	<?php if( $model->tipo == 0 ): ?> <div class="cesped"> <?php endif; ?>
	<div class="container-fluid">
		 <div class="barrasup navbar navbar-default">
		 	<div class="navbar-default">
		 		<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
		 		<div class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
		 			<center><h2><?php echo $model->titulo; ?></h2></center>
		 		</div>
		 		<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1"> <h2><a href="#" class="sharetodos"><img src="<?php echo Yii::app()->baseUrl.'/images/web_per/'; ?>/share.png"/></a></h2></div>	
		 	</div>
		 	</div>
		 </div>
		<?php $i = 1; ?>
		<?php foreach ($cajitas as $key => $cajita): ?>
			<?php if( $i == 1 ): ?>
				<!-- <div class="row-fluid"> -->
			<?php endif; ?>
			<div class="col-md-4 col-lg-3 col-sm-6 col-xs-12" >
				<div class="cajita">
					<center><a href="<?php echo $model->url; ?>"><img class="imagencajita img-responsive" src="<?php echo $cajita->imagen; ?>"></a>
					<span class="titulo"><?php echo $cajita->titulo; ?></span>&nbsp;<span class="social"><a href="http://www.facebook.com/sharer.php?u=<?php echo isset($cajita->url) ? $cajita->url : '#' ?>&t=<?php echo isset($cajita->titulo) ? $cajita->titulo : ' ' ?>" class="facebook" target="_blank"><img src="<?php echo Yii::app()->baseUrl.'/images/web_per/f.jpg'; ?>"></a></span><span class="social"><a href="http://twitter.com/?status=<?php echo isset($cajita->titulo) ? $cajita->titulo : ' ' ?>%20<?php echo isset($cajita->url) ? $cajita->url : '#' ?>" class="twitter" target="_blank"><img src="<?php echo Yii::app()->baseUrl.'/images/web_per/twitter.jpg'; ?>"></a></span><span class="social"><a href="http://www.plus.google.com/share?url=<?php echo isset($cajita->titulo) ? $cajita->url : ' ' ?>" class="google" target="_blank"><img src="<?php echo Yii::app()->baseUrl.'/images/web_per/google+.png'; ?>"></a></span><span class="social"><a href="#" class="sobre" target="_blank"><img src="<?php echo Yii::app()->baseUrl.'/images/web_per/sobrecillo.png'; ?>"></a></span></center>					
				</div><!-- /cajita -->		
			</div>		
			<?php if( $i == 3 ): ?>
				<?php $i = 0; ?>
				<!-- </div> -->
			<?php endif; ?>
			<?php $i++; ?>
		<?php endforeach; ?>
	<?php if( $model->tipo == 0 ): ?> <div class="clearfix">&nbsp;</div> </div> <?php endif; ?>
<?php endif; ?>
</div><!-- container -->