<?php
/* @var $this VentaController */
/* @var $model Venta */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha'); ?>
		<?php echo $form->textField($model,'fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'clics'); ?>
		<?php echo $form->textField($model,'clics'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nuevos_registros'); ?>
		<?php echo $form->textField($model,'nuevos_registros'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nuevos_depositantes'); ?>
		<?php echo $form->textField($model,'nuevos_depositantes'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nuevos_depositantes_deportes'); ?>
		<?php echo $form->textField($model,'nuevos_depositantes_deportes'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nuevos_depositantes_casino'); ?>
		<?php echo $form->textField($model,'nuevos_depositantes_casino'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nuevos_depositantes_poquer'); ?>
		<?php echo $form->textField($model,'nuevos_depositantes_poquer'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nuevos_depositantes_juegos'); ?>
		<?php echo $form->textField($model,'nuevos_depositantes_juegos'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nuevos_depositantes_bingo'); ?>
		<?php echo $form->textField($model,'nuevos_depositantes_bingo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'valor_depositos'); ?>
		<?php echo $form->textField($model,'valor_depositos'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'numero_depositos'); ?>
		<?php echo $form->textField($model,'numero_depositos'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'facturacion_deportes'); ?>
		<?php echo $form->textField($model,'facturacion_deportes'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'numero_apuestas_deportivas'); ?>
		<?php echo $form->textField($model,'numero_apuestas_deportivas'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'usuarios_activos_deportes'); ?>
		<?php echo $form->textField($model,'usuarios_activos_deportes'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sesiones_casino'); ?>
		<?php echo $form->textField($model,'sesiones_casino'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nuevos_jugadores_deportes'); ?>
		<?php echo $form->textField($model,'nuevos_jugadores_deportes'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nuevos_jugadores_casino'); ?>
		<?php echo $form->textField($model,'nuevos_jugadores_casino'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nuevos_clientes_poquer'); ?>
		<?php echo $form->textField($model,'nuevos_clientes_poquer'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nuevos_clientes_juego'); ?>
		<?php echo $form->textField($model,'nuevos_clientes_juego'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nuevos_jugadores_bingo'); ?>
		<?php echo $form->textField($model,'nuevos_jugadores_bingo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'beneficios_netos_deportes'); ?>
		<?php echo $form->textField($model,'beneficios_netos_deportes'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'beneficios_netos_casino'); ?>
		<?php echo $form->textField($model,'beneficios_netos_casino'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'beneficios_netos_poquer'); ?>
		<?php echo $form->textField($model,'beneficios_netos_poquer'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'beneficios_netos_juegos'); ?>
		<?php echo $form->textField($model,'beneficios_netos_juegos'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ingresos_totales_netos'); ?>
		<?php echo $form->textField($model,'ingresos_totales_netos'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ganancias_afiliado_deportes'); ?>
		<?php echo $form->textField($model,'ganancias_afiliado_deportes'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ganancias_afiliado_casino'); ?>
		<?php echo $form->textField($model,'ganancias_afiliado_casino'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ganancias_afiliado_poquer'); ?>
		<?php echo $form->textField($model,'ganancias_afiliado_poquer'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ganancias_afiliado_juego'); ?>
		<?php echo $form->textField($model,'ganancias_afiliado_juego'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'comisiones_debidas'); ?>
		<?php echo $form->textField($model,'comisiones_debidas'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_creacion'); ?>
		<?php echo $form->textField($model,'fecha_creacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'observaciones'); ?>
		<?php echo $form->textArea($model,'observaciones',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_usuario'); ?>
		<?php echo $form->textField($model,'id_usuario'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->