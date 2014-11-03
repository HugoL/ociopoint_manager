<?php
/* @var $this VentaController */
/* @var $data Venta */
?>
<?php 
$parametro = 'porcentaje_'.$rol->nombre; 

echo "<h1>".$data->comisiones_debidasCount."</h1><br/>";

//Miro qué rol de usuario es el padre del establecimiento de la venta
$padre = Profile::model()->findByPk( Yii::app()->getModule('user')->user()->profile->id_padre);
$rol_padre = Rol::model()->findByPK($padre->rol); 
$comision_comercial = 0;
$comision_establecimiento = 0;

switch ($rol_padre->nombre) {
	case 'comercial':
		$abuelo = Profile::model()->findByPk( $padre->user_id );
		if( $padre->comision != null )
			$comision_comercial = $padre->comision;
		else
			$comision_comercial = Yii::app()->params['porcentaje_comercial'];

		if( $abuelo->comision != null )
			$comision_distribuidor = $abuelo->comision;
		else
			$comision_distribuidor = Yii::app()->params['porcentaje_distribuidor'];
		break;
	case 'distribuidor':
		$comision_comercial = 0;
		if( $padre->comision != null )
			$comision_distribuidor = $padre->comision;
		else
			$comision_distribuidor = Yii::app()->params['porcentaje_distribuidor'];
		break;
	default:
}

//Fórmula para calcular la comisión que se lleva cada usuario (Comisiones * ( 20 - Com_Comercial - Com_Establecimiento )) / 30
if( strcmp($rol->nombre, 'administrador') == 0 ):
	$comisiones = $data->comisiones_debidasCount * 20 / 30;
endif;
if( strcmp($rol->nombre, 'distribuidor') == 0 ):
	$comisiones = $data->comisiones_debidasCount * ( 20 - $comision_comercial - $comision_establecimiento ) / 30;
endif;
if( strcmp($rol->nombre, 'comercial') == 0 ):
	$comisiones = $data->comisiones_debidasCount * ( 15 - $comision_establecimiento ) / 30;
endif;
if( strcmp($rol->nombre, 'establecimiento') == 0 ):
	$comisiones = $data->comisiones_debidasCount * ( Yii::app()->getModule('user')->user()->profile->comision ) / 30;
endif;

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
	<?php if( strcmp($rol->nombre,'comercial') == 0 ): ?>
	<td> <?php echo CHtml::encode($data->valor_depositosCount); ?></td>
	<?php else: ?>
	<td>
		<?php echo CHtml::encode($data->nuevos_depositantes_deportesCount); ?>
	</td>
	<?php endif; ?>
	<td>
		<?php 
			echo number_format( $comisiones); ?>
	</td>
	<td>
	<?php  if( strcmp($rol->nombre,'establecimiento') == 0 ): ?>
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