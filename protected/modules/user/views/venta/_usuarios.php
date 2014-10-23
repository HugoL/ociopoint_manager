<?php
/* @var $this VentaController */
/* @var $data Venta */
?>
<?php $mes = date('n',strtotime($data->fecha)); ?>

<div class="view">

	<div class="row-fluid">
	<div class="span2">
		<span class="label label-warning"><?php echo CHtml::encode(date('F', strtotime($data->fecha))); ?></span>
	</div>
	<div class="span2">
		<?php echo CHtml::encode($data->nuevos_registrosCount); ?>	
	</div>
	<div class="span2">
		<?php echo CHtml::encode($data->nuevos_depositantesCount); ?>
	</div>
	<div class="span2">
		<?php echo CHtml::encode($data->nuevos_depositantes_deportesCount); ?>
	</div>
	<div class="span2">
		<a href="<?php echo Yii::app()->baseUrl."/user/venta/verDetalleMes/id/".$data->id_usuario."/mes/".$mes; ?>"><img src="<?php echo Yii::app()->baseUrl ?>/images/ojo_small.png" width="25px" height="25px" class="img-rounded" alt="Ver Detalle Venta"></a>
	</div>
	</div><!-- row-fluid -->
</div>