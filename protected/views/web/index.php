<?php
/* @var $this WebController */

$this->breadcrumbs=array(
	'Web',
);
?>
<?php if(isset($model)): ?>
	<?php if( $model->tipo == 0 ): ?> <div class="cesped"> <?php endif; ?>
		<p><?php echo $model->titulo; ?></p>	
		<?php $i = 1; ?>
		<?php foreach ($cajitas as $key => $cajita): ?>
			<?php if( $i == 1 ): ?>
				<div class="row-fluid">
			<?php endif; ?>
			<div class="span4 cajita">
				<center><img class="imagencajita img-polaroid" src="<?php echo $cajita->imagen; ?>" class="cajita"><br/>
				<?php echo $cajita->titulo; ?></center>
					<a href="http://www.facebook.com/sharer.php?u=<?php echo isset($cajita->url) ? $cajita->url : '#' ?>&t=<?php echo isset($cajita->titulo) ? $cajita->titulo : ' ' ?>" class="facebook" target="_blank"><img src="<?php echo Yii::app()->baseUrl.'/images/web_per/f.jpg'; ?>"></a>&nbsp;<a href="http://twitter.com/?status=<?php echo isset($cajita->titulo) ? $cajita->titulo : ' ' ?>%20<?php echo isset($cajita->url) ? $cajita->url : '#' ?>" class="facebook" target="_blank"><img src="<?php echo Yii::app()->baseUrl.'/images/web_per/twitter.jpg'; ?>"></a></center>				
			</div>		
			<?php if( $i == 3 ): ?>
				<?php $i = 0; ?>
				</div>
			<?php endif; ?>
			<?php $i++; ?>
		<?php endforeach; ?>
	<?php if( $model->tipo == 0 ): ?> </div> <?php endif; ?>
<?php endif; ?>
