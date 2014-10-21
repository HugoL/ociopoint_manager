<?php
/* @var $this VentaController */
/* @var $data Venta */
?>

<div class="view">

	<div class="row-fluid">
	<div class="span2"><b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
		<?php echo CHtml::encode(date('d-m-Y', strtotime($data->fecha))); ?>
	</div>
	<div class="span2">
	<b>Usuario :</b>
	<?php $profile = Profile::model()->findByPk($data->id_usuario); ?>
	<span class="label label-info"><?php echo CHtml::encode($profile->referencia); ?></span>
	</div>
	<div class="span2">
		<b><?php echo CHtml::encode($data->getAttributeLabel('ingresos_totales_netos')); ?>:</b>
		<?php echo CHtml::encode($data->ingresos_totales_netos); ?>
	
	</div>
	<div class="span2">
		<b><?php echo CHtml::encode($data->getAttributeLabel('comisiones_debidas')); ?>:</b>
		<?php echo CHtml::encode($data->comisiones_debidas); ?>
	</div>
	<div class="span2">
		<b>Total:</b>
		<span class="label label-important"><?php echo CHtml::encode($data->comisiones_debidas+$data->ingresos_totales_netos); ?></span>
	</div>
	<div class="span2">
		<a href="<?php echo Yii::app()->baseUrl."/user/venta/verDetalle/id/".$data->id; ?>"><img src="<?php echo Yii::app()->baseUrl ?>/images/ojo_small.png" width="25px" height="25px" class="img-rounded" alt="Ver Detalle Venta"></a>
	</div>
	</div><!-- row-fluid -->
</div>