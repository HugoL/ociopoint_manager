<h3><?php echo  CHtml::link(CHtml::encode($model->titulo),array('view/id/'.$model->id)); ?> <small><?php echo CHtml::encode($model->fecha); ?></small></h3>
<div class="view">

	<?php echo $model->resumen; ?>
	<br />

	<?php echo $model->texto; ?>
	<br />
	
</div>
<br/>
<?php echo CHtml::link('Ver todas las entradas',array('entrada/index'),array('class' => 'btn btn-primary')); ?>