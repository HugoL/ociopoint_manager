<?php
/* @var $this VentaController */
/* @var $data Venta */
?>
<?php $mes = date('n',strtotime($data->fecha)); ?>
<?php $parametro = 'porcentaje_'.$rol->nombre; ?>
<tr>
	<td>
		<span class="label label-warning"><?php echo CHtml::encode(date('F', strtotime($data->fecha))); ?></span>
	</td>
	<td>
		<?php echo CHtml::encode($data->nuevos_registrosCount); ?>	
	</td>
	<td>
		<?php echo CHtml::encode($data->nuevos_depositantesCount); ?>
	</td>
	<?php if( strcmp($rol->nombre,'comercial') == 0 ): ?>
	<td> <?php echo CHtml::encode($data->valor_depositosCount); ?></td>
	<?php else: ?>
	<td>
		<?php echo CHtml::encode($data->nuevos_depositantes_deportesCount); ?>
	</td>
	<?php endif; ?>
	<td>
		<?php echo number_format(((Yii::app()->params[$parametro] / 100) * $data->comisiones_debidasCount ), 3); ?>
	</td>
	<?php if( $esadmin || strcmp($rol->nombre,'establecimiento') == 0) : ?>
	<td>
		<a href="<?php echo Yii::app()->baseUrl."/user/venta/verDetalleMes/id/".$data->id_usuario."/mes/".$mes; ?>"><img src="<?php echo Yii::app()->baseUrl ?>/images/ojo_small.png" width="25px" height="25px" class="img-rounded" alt="Ver Detalle Venta"></a>
	</td>
	<?php endif; ?>
</tr>