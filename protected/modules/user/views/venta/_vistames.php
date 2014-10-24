<?php
/* @var $this VentaController */
/* @var $data Venta */
?>
<tr>
	<td>
		<?php echo CHtml::encode(date('d/m/Y',strtotime($data->fecha))); ?>
	</tdv>
	<td>
		<?php echo CHtml::encode($data->nuevos_registros); ?>
	</td>
	<td>
		<?php echo CHtml::encode($data->nuevos_depositantes); ?>
	</td>
	<td>
		<?php echo CHtml::encode($data->nuevos_depositantes_deportes); ?>
	</td>
	<?php if( $esadmin ): ?>
	<td>
		<?php echo CHtml::encode($data->ganancias_afiliado_juego); ?>
	</td>
	<td>
		<?php echo CHtml::encode($data->comisiones_debidas); ?>
	</td>
	<?php endif; ?>
</tr>