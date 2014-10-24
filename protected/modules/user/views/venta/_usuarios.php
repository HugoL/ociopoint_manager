<?php
/* @var $this VentaController */
/* @var $data Venta */
?>
<?php $mes = date('n',strtotime($data->fecha)); ?>

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
	<td>
		<?php echo CHtml::encode($data->nuevos_depositantes_deportesCount); ?>
	</td>
	<?php if( strcmp($rol->nombre,'distribuidor') == 0 || $esadmin ): ?>
	<td>
		<?php echo number_format(((Yii::app()->params['porcentaje_distribuidor'] / 100) * $data->comisiones_debidasCount ), 3); ?>
	</td>
	<?php endif; ?>
	<?php if( $esadmin ) : ?>
	<td>
		<a href="<?php echo Yii::app()->baseUrl."/user/venta/verDetalleMes/id/".$data->id_usuario."/mes/".$mes; ?>"><img src="<?php echo Yii::app()->baseUrl ?>/images/ojo_small.png" width="25px" height="25px" class="img-rounded" alt="Ver Detalle Venta"></a>
	</td>
	<?php endif; ?>
</tr>