<?php
/* @var $this VentaController */
/* @var $data Venta */
?>
<?php $parametro = 'porcentaje_'.$rol->nombre; ?>
<tr>
	<td>
		<?php $profile = Profile::model()->findByPk($data->id_usuario); ?>
		<span class="label label-info"><?php echo CHtml::encode($profile->referencia); ?></span>
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
		<?php 
			echo number_format(( (Yii::app()->params[$parametro] / 100) * $data->comisiones_debidasCount ),3); ?>
	</td>
	<td>
	<?php  if( strcmp($rol->nombre,'establecimiento') == 0 ): ?>
		<a href="<?php echo Yii::app()->baseUrl."/user/venta/ventasUsuario/id/".$data->id_usuario."/categoria/".$data->id_categoria; ?>"><img src="<?php echo Yii::app()->baseUrl ?>/images/ojo_small.png" width="25px" height="25px" class="img-rounded" alt="Ver Detalle Venta" title="Ver detalle ventas del establecimiento"></a>
	<?php else: ?>
		<a href="<?php echo Yii::app()->baseUrl."/user/venta/ventasUsuario/id/".$data->id_usuario; ?>"><img src="<?php echo Yii::app()->baseUrl ?>/images/ojo_small.png" width="25px" height="25px" class="img-rounded" alt="Ver Detalle Venta" title="Ver detalle ventas del establecimiento"></a>
	<?php endif; ?>
	</td>
</tr>