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
		<?php if( $data->id_categoria == 1 ): ?>
			<?php echo CHtml::encode($data->nuevos_registrosCount); ?>	
		<?php else:  ?>
			<?php echo CHtml::encode(date("d-m-Y",strtotime($data->fecha))); ?>	
		<?php endif; ?>
	</td>
	<td>
		<?php if( $data->id_categoria == 1 ): ?>
			<?php echo CHtml::encode($data->nuevos_depositantesCount); ?>
		<?php endif; ?>
	</td>
	<?php if( strcmp($rol->nombre,'comercial') == 0 ): ?>
	<td> <?php echo CHtml::encode($data->valor_depositosCount); ?></td>
	<?php else: ?>
	<td>
		<?php if( $data->id_categoria != 1 ): ?>
			<?php echo CHtml::encode($data->nuevos_depositantes_deportesCount); ?>
		<?php endif; ?>
	</td>
	<?php endif; ?>
	<td>
		<?php echo number_format(((Yii::app()->params[$parametro] / 100) * $data->comisiones_debidasCount ), 3); ?>
	</td>
	<?php if( ($esadmin || strcmp($rol->nombre,'establecimiento') == 0) && $data->id_categoria == 1 ) : ?>
	<td>
		<a href="<?php echo Yii::app()->baseUrl."/user/venta/verDetalleMes/id/".$data->id_usuario."/mes/".$mes; ?>"><img src="<?php echo Yii::app()->baseUrl ?>/images/ojo_small.png" width="25px" height="25px" class="img-rounded" alt="Ver Detalle Venta"></a>		
	</td>
	<?php endif; ?>
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