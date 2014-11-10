<?php
/* @var $this VentaController */
/* @var $data Venta */
?>
<?php 
	$parametro = 'porcentaje_'.$rol->nombre; 

	if( strcmp($rol->nombre, 'administrador') == 0 ):
        $comisiones = $data->comisiones_debidas * 10 / 30;
    endif;
    if( strcmp($rol->nombre, 'distribuidor') == 0 ):
        $comisiones = $data->comisiones_debidas * ( 20 - $comision_comercial - $comision_establecimiento ) / 30;
    endif;
    if( strcmp($rol->nombre, 'comercial') == 0 ):
        $comisiones = $data->comisiones_debidas * ( 15 - $comision_establecimiento ) / 30;
    endif;
    if( strcmp($rol->nombre, 'establecimiento') == 0 ):
        if( Yii::app()->getModule('user')->user()->profile->comision != null )
            $comision = Yii::app()->getModule('user')->user()->profile->comision;
        else
            $comision = Yii::app()->params['porcentaje_establecimiento'];
        $comisiones = $data->comisiones_debidas * $comision / 30;
    endif;
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
		<?php echo CHtml::encode(intval($data->valor_depositos)); ?>
	</td>
	<td>
		<?php echo CHtml::encode(intval($data->numero_depositos)); ?>
	</td>
	<td>
		<?php echo CHtml::encode(intval($data->facturacion_deportes)); ?>
	</td>
	<td>
		<?php echo CHtml::encode(intval($comisiones)); ?>
	</td>
</tr>