<?php
/* @var $this WebController */
/* @var $data Web */
?>

<div class="view">
	<h4><b>Establecimiento:</b>
	<?php echo CHtml::encode($data->usuario->profile->referencia); ?></h4>

	<b><?php echo CHtml::encode($data->getAttributeLabel('url')); ?>:</b>
	<?php echo CHtml::encode($data->url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('titulo')); ?>:</b>
	<?php echo CHtml::encode($data->titulo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo')); ?>:</b>
	<?php echo CHtml::encode($data->tipo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario')); ?>:</b>
	<?php echo CHtml::encode($data->usuario->profile->referencia); ?>
	<br />


</div>