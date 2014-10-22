<?php
/* @var $this VentaController */
/* @var $data Venta */
?>
<div class="view">

	<div class="row-fluid">
	<div class="span2">
		<?php $profile = Profile::model()->findByPk($data->id_usuario); ?>
		<span class="label label-info"><?php echo CHtml::encode($profile->referencia); ?></span>
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
	<div class="span1">
		<a href="<?php echo Yii::app()->baseUrl."/user/venta/verDetalle/id/".$data->id; ?>"><img src="<?php echo Yii::app()->baseUrl ?>/images/ojo_small.png" width="25px" height="25px" class="img-rounded" alt="Ver Detalle Venta"></a>
	</div>
	</div><!-- row-fluid -->
</div>