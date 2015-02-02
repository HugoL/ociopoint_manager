<div class="view">

	<h3><?php echo  CHtml::link(CHtml::encode($data->titulo),array('view','id' => $data->id)); ?> <small><?php echo CHtml::encode($data->fecha); ?></small></h3>

	<?php echo $data->resumen; ?>
	<br />

	<?php echo $data->texto; ?>
	<br />
	
</div>