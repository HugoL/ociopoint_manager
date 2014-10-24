<?php
/* @var $this VentaController */
/* @var $data Venta */
?>

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
	<td>
		<?php echo CHtml::encode($data->nuevos_depositantes_deportesCount); ?>
	</td>
	<?php if( strcmp($rol->nombre,'distribuidor') == 0 || $esadmin ): ?>
	<td>
		<?php 
			echo number_format(( (Yii::app()->params['porcentaje_distribuidor'] / 100) * $data->comisiones_debidasCount ),3); ?>
	</td>
	<?php endif; ?>
	<td>
		<a href="<?php echo Yii::app()->baseUrl."/user/venta/ventasUsuario/id/".$data->id_usuario; ?>"><img src="<?php echo Yii::app()->baseUrl ?>/images/ojo_small.png" width="25px" height="25px" class="img-rounded" alt="Ver Detalle Venta" title="Ver detalle ventas del establecimiento"></a>
	</td>
</tr>