<?php
/* @var $this VentaController */
/* @var $data Venta */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('clics')); ?>:</b>
	<?php echo CHtml::encode($data->clics); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nuevos_registros')); ?>:</b>
	<?php echo CHtml::encode($data->nuevos_registros); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nuevos_depositantes')); ?>:</b>
	<?php echo CHtml::encode($data->nuevos_depositantes); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nuevos_depositantes_deportes')); ?>:</b>
	<?php echo CHtml::encode($data->nuevos_depositantes_deportes); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nuevos_depositantes_casino')); ?>:</b>
	<?php echo CHtml::encode($data->nuevos_depositantes_casino); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('nuevos_depositantes_poquer')); ?>:</b>
	<?php echo CHtml::encode($data->nuevos_depositantes_poquer); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nuevos_depositantes_juegos')); ?>:</b>
	<?php echo CHtml::encode($data->nuevos_depositantes_juegos); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nuevos_depositantes_bingo')); ?>:</b>
	<?php echo CHtml::encode($data->nuevos_depositantes_bingo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('valor_depositos')); ?>:</b>
	<?php echo CHtml::encode($data->valor_depositos); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numero_depositos')); ?>:</b>
	<?php echo CHtml::encode($data->numero_depositos); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('facturacion_deportes')); ?>:</b>
	<?php echo CHtml::encode($data->facturacion_deportes); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numero_apuestas_deportivas')); ?>:</b>
	<?php echo CHtml::encode($data->numero_apuestas_deportivas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuarios_activos_deportes')); ?>:</b>
	<?php echo CHtml::encode($data->usuarios_activos_deportes); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sesiones_casino')); ?>:</b>
	<?php echo CHtml::encode($data->sesiones_casino); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nuevos_jugadores_deportes')); ?>:</b>
	<?php echo CHtml::encode($data->nuevos_jugadores_deportes); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nuevos_jugadores_casino')); ?>:</b>
	<?php echo CHtml::encode($data->nuevos_jugadores_casino); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nuevos_clientes_poquer')); ?>:</b>
	<?php echo CHtml::encode($data->nuevos_clientes_poquer); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nuevos_clientes_juego')); ?>:</b>
	<?php echo CHtml::encode($data->nuevos_clientes_juego); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nuevos_jugadores_bingo')); ?>:</b>
	<?php echo CHtml::encode($data->nuevos_jugadores_bingo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('beneficios_netos_deportes')); ?>:</b>
	<?php echo CHtml::encode($data->beneficios_netos_deportes); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('beneficios_netos_casino')); ?>:</b>
	<?php echo CHtml::encode($data->beneficios_netos_casino); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('beneficios_netos_poquer')); ?>:</b>
	<?php echo CHtml::encode($data->beneficios_netos_poquer); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('beneficios_netos_juegos')); ?>:</b>
	<?php echo CHtml::encode($data->beneficios_netos_juegos); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ingresos_totales_netos')); ?>:</b>
	<?php echo CHtml::encode($data->ingresos_totales_netos); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ganancias_afiliado_deportes')); ?>:</b>
	<?php echo CHtml::encode($data->ganancias_afiliado_deportes); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ganancias_afiliado_casino')); ?>:</b>
	<?php echo CHtml::encode($data->ganancias_afiliado_casino); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ganancias_afiliado_poquer')); ?>:</b>
	<?php echo CHtml::encode($data->ganancias_afiliado_poquer); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ganancias_afiliado_juego')); ?>:</b>
	<?php echo CHtml::encode($data->ganancias_afiliado_juego); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comisiones_debidas')); ?>:</b>
	<?php echo CHtml::encode($data->comisiones_debidas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_creacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_creacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('observaciones')); ?>:</b>
	<?php echo CHtml::encode($data->observaciones); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario')); ?>:</b>
	<?php echo CHtml::encode($data->id_usuario); ?>
	<br />

	*/ ?>

</div>