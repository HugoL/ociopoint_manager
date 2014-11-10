<?php
/* @var $this VentaController */
/* @var $data Venta */
?>
<?php $profile = Profile::model()->findByPk($data->id_usuario); ?>
<tr>
	<td>
		
		<span class="label label-info"><?php echo CHtml::encode($profile->referencia); ?></span>
	</td>
	<td>
		<?php echo CHtml::encode($data->nuevos_registrosCount); ?>
	</td>
	<td>
		<?php echo intval( $data->comision_registro); ?>
	</td>
	<td>
		<?php echo intval( $data->comisiones_debidasCount); ?>
	</td>
	<td>
	<?php  if( strcmp($rol->nombre,'establecimiento') == 0 || $esadmin ): ?>
		<a href="<?php echo Yii::app()->baseUrl."/user/venta/ventasUsuario/id/".$data->id_usuario."/categoria/".$data->id_categoria; ?>"><img src="<?php echo Yii::app()->baseUrl ?>/images/ojo_small.png" width="25px" height="25px" class="img-rounded" alt="Ver Detalle Venta" title="Ver detalle ventas del establecimiento"></a>
	<?php else: ?>
		<a href="<?php echo Yii::app()->baseUrl."/user/venta/ventasUsuario/id/".$data->id_usuario; ?>"><img src="<?php echo Yii::app()->baseUrl ?>/images/ojo_small.png" width="25px" height="25px" class="img-rounded" alt="Ver Detalle Venta" title="Ver detalle ventas del establecimiento"></a>
	<?php endif; ?>
	<?php if( $esadmin ): ?>
		&nbsp;&nbsp;&nbsp;&nbsp;<?php echo CHtml::link(
    '<img src="'.Yii::app()->baseUrl .'/images/papelera_small.png" width="25px" height="25px">',
     array('venta/eliminarVentasUsuario/','id'=>$data->id_usuario),
     array('confirm' => 'Se eliminarán todas las ventas del usaurio. ¿Estás seguro?')
	); ?>	
	<?php endif; ?>
	</td>
</tr>