<h2>Webs de <?php echo CHtml::encode( $profile->referencia); ?></h2>

<?php foreach ($webs as $key => $web): ?>
	<?php $this->renderPartial('_web', array('data'=>$web)); ?>
<?php endforeach; ?>