<?php
/* @var $this VentaController */
/* @var $data Venta */
?>
<tr>
	<td>
		<span class="label label-warning"><?php echo CHtml::encode(date('F', strtotime($data->fecha))); ?></span>
	</td>
	<td>
		<?php echo CHtml::encode($data->nuevos_registrosCount); ?>	
	</td>
	<td>
		<?php echo number_format($data->comisiones_debidasCount); ?>
	</td>
	<?php if( $esadmin ) : ?>
		<td>
		<?php echo CHtml::link(
	    '<img src="'.Yii::app()->baseUrl .'/images/papelera_small.png" width="25px" height="25px">',
	     array('venta/eliminarVentasMes/','idUsuario'=>$data->id_usuario,'mes'=>$mes),
	     array('confirm' => 'Se eliminarán todas las ventas del usaurio del mes. ¿Estás seguro?')
		); ?> 
		</td>
	<?php endif; ?>
</tr>