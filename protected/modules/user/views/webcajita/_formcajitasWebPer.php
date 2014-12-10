<div class="row-fluid">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'cajitas-form',
		'enableAjaxValidation'=>false,
	)); ?>
	<div class="form-horizontal">
		<?php $i = 1; $j = 0; $cajita = new Webcajita;;?>
	<div class="row-fluid">
	<?php foreach ($cajitas as $key => $cajita): ?>
			<?php if( empty($cajita->imagen) )
					$imagen = $imagenes[$j]; 
				  else
				  	$imagen = array('ruta' => $cajita->imagen, 'titulo' => $cajita->titulo);
			?>
			<?php echo $form->errorSummary($cajita); ?>
			<?php if( $i == 1 ): ?>
				<div class="row-fluid">
			<?php endif; ?>
			<div class="span4 well well-small">
				<?php 
					if( !empty($cajita->id) )
						echo $form->hiddenField($cajita,'['.$key.']id',array('value'=>$cajita->id));
					echo $form->hiddenField($cajita,'['.$key.']id_usuario',array('value'=>$web->id_usuario));
					echo $form->hiddenField($cajita,'['.$key.']id_categoria',array('value'=> '1'));
					//echo $form->hiddenField($cajita,'['.$key.']posicion',array('value'=> $cajita->posicion));
				 ?>
				<div style="background-image: url(<?php echo $imagen['ruta']; ?>);" class="cajita">
					<center><div class="clearfix"><p>&nbsp;</p></div><div class="clearfix"><p>&nbsp;</p></div>
					<?php echo $form->textField($cajita,'['.$key.']imagen',array('class' => 'input-large','placeholder' => 'Dirección de la imagen')); ?>
					<?php echo $form->error($cajita,'[$key]imagen'); ?></center></div>
				<div class="control-group">
					<center><?php echo $form->textField($cajita,'['.$key.']url',array('class' => 'input-large','placeholder' => 'Dirección (bitly)')); ?>
					<?php echo $form->error($cajita,'[$key]url'); ?></center>

					<div class="clearfix">&nbsp;</div>

					<center><span>Título: </span><?php echo $form->textField($cajita,'['.$key.']titulo',array('class' => 'input-medium','value' => $imagen['titulo'])); ?>
					<?php echo $form->error($cajita,'[$key]titulo'); ?>
					<a href="http://www.facebook.com/sharer.php?u=<?php echo isset($cajita->url) ? $cajita->url : '#' ?>&t=<?php echo isset($cajita->titulo) ? $cajita->titulo : ' ' ?>" class="facebook" target="_blank"><img src="<?php echo Yii::app()->baseUrl.'/images/web_per/f.jpg'; ?>"></a>&nbsp;<a href="http://twitter.com/?status=<?php echo isset($cajita->titulo) ? $cajita->titulo : ' ' ?>%20<?php echo isset($cajita->url) ? $cajita->url : '#' ?>" class="facebook" target="_blank"><img src="<?php echo Yii::app()->baseUrl.'/images/web_per/twitter.jpg'; ?>"></a></center>
				</div><!-- /control-group -->
			</div>		
			<?php if( $i == 3 ): ?>
				<?php $i = 0; ?>
				</div>				
			<?php endif; ?>		
			<?php $i++; $j++; ?>
	<?php endforeach; ?>
	</div>	
	</div>
</div>
<div class="row-fluid"><center>	<?php echo CHtml::submitButton($cajita->isNewRecord ? 'Insertar' : 'Guardar',array('class'=>'btn btn-primary btn-large')); ?></center></div>
<?php $this->endWidget(); ?>
<div class="clearfix">&nbsp;</div>