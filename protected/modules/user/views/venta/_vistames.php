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
		<?php echo CHtml::encode(number_format($data->valor_depositos)); ?>
	</td>
	<td>
		<?php echo CHtml::encode(number_format($data->numero_depositos)); ?>
	</td>
	<td>
		<?php echo CHtml::encode(number_format($data->facturacion_deportes)); ?>
	</td>
	<td>
		<?php echo CHtml::encode(number_format($data->comisiones_debidas,1)); ?>
	</td>
</tr>