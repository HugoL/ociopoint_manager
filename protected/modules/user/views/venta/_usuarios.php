<?php
/* @var $this VentaController */
/* @var $data Venta */
?>
<?php $mes = date('n',strtotime($data->fecha));
 $parametro = 'porcentaje_'.$rol->nombre; 

if( strcmp($rol->nombre, 'administrador') == 0 ):
        $comisiones = $data->comisiones_debidasCount * 10 / 30;
    endif;
    if( strcmp($rol->nombre, 'distribuidor') == 0 ):
        $comisiones = $data->comisiones_debidasCount * ( 20 - $comision_comercial - $comision_establecimiento ) / 30;
    endif;
    if( strcmp($rol->nombre, 'comercial') == 0 ):
        $comisiones = $data->comisiones_debidasCount * ( 15 - $comision_establecimiento ) / 30;
    endif;
    if( strcmp($rol->nombre, 'establecimiento') == 0 ):
        if( Yii::app()->getModule('user')->user()->profile->comision != null )
            $comision = Yii::app()->getModule('user')->user()->profile->comision;
        else
            $comision = Yii::app()->params['porcentaje_establecimiento'];
        $comisiones = $data->comisiones_debidasCount * $comision / 30;
    endif;
?>
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
		<?php echo CHtml::encode(intval($data->valor_depositosCount)); ?>
	</td>
	<td>
		<?php echo CHtml::encode(intval($data->numero_depositosCount)); ?>
	</td>
	<td>
		<?php echo CHtml::encode(intval($data->facturacion_deportesCount)); ?>
	</td>
	<td>
		<?php echo intval($comisiones); ?>
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