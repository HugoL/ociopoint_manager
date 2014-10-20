<?php
/* @var $this VentaController */
/* @var $model Venta */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'venta-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                                'name'=>'Venta[fecha]',
                                'id'=>'Venta_fecha',
                            'value'=>Yii::app()->dateFormatter->format("d-M-y",strtotime($model->fecha)),
                                'options'=>array(
                                'showAnim'=>false,
                                ),
                                'htmlOptions'=>array(
                                'style'=>'height:20px;'
                                ),
                        )); ?>

		<?php /*echo $form->datepickerRow($model,'fecha',
			array('hint'=>'Haz click para seleccionar la fecha.',
                    'prepend'=>'<i class="icon-calendar"></i>',
                    'options'=>array('format'=>'yyyy-mm-dd'))); */?>
		<?php echo $form->error($model,'fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'clics'); ?>
		<?php echo $form->textField($model,'clics'); ?>
		<?php echo $form->error($model,'clics'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nuevos_registros'); ?>
		<?php echo $form->textField($model,'nuevos_registros'); ?>
		<?php echo $form->error($model,'nuevos_registros'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nuevos_depositantes'); ?>
		<?php echo $form->textField($model,'nuevos_depositantes'); ?>
		<?php echo $form->error($model,'nuevos_depositantes'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nuevos_depositantes_deportes'); ?>
		<?php echo $form->textField($model,'nuevos_depositantes_deportes'); ?>
		<?php echo $form->error($model,'nuevos_depositantes_deportes'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nuevos_depositantes_casino'); ?>
		<?php echo $form->textField($model,'nuevos_depositantes_casino'); ?>
		<?php echo $form->error($model,'nuevos_depositantes_casino'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nuevos_depositantes_poquer'); ?>
		<?php echo $form->textField($model,'nuevos_depositantes_poquer'); ?>
		<?php echo $form->error($model,'nuevos_depositantes_poquer'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nuevos_depositantes_juegos'); ?>
		<?php echo $form->textField($model,'nuevos_depositantes_juegos'); ?>
		<?php echo $form->error($model,'nuevos_depositantes_juegos'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nuevos_depositantes_bingo'); ?>
		<?php echo $form->textField($model,'nuevos_depositantes_bingo'); ?>
		<?php echo $form->error($model,'nuevos_depositantes_bingo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'valor_depositos'); ?>
		<?php echo $form->textField($model,'valor_depositos'); ?>
		<?php echo $form->error($model,'valor_depositos'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'numero_depositos'); ?>
		<?php echo $form->textField($model,'numero_depositos'); ?>
		<?php echo $form->error($model,'numero_depositos'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'facturacion_deportes'); ?>
		<?php echo $form->textField($model,'facturacion_deportes'); ?>
		<?php echo $form->error($model,'facturacion_deportes'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'numero_apuestas_deportivas'); ?>
		<?php echo $form->textField($model,'numero_apuestas_deportivas'); ?>
		<?php echo $form->error($model,'numero_apuestas_deportivas'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'usuarios_activos_deportes'); ?>
		<?php echo $form->textField($model,'usuarios_activos_deportes'); ?>
		<?php echo $form->error($model,'usuarios_activos_deportes'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sesiones_casino'); ?>
		<?php echo $form->textField($model,'sesiones_casino'); ?>
		<?php echo $form->error($model,'sesiones_casino'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nuevos_jugadores_deportes'); ?>
		<?php echo $form->textField($model,'nuevos_jugadores_deportes'); ?>
		<?php echo $form->error($model,'nuevos_jugadores_deportes'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nuevos_jugadores_casino'); ?>
		<?php echo $form->textField($model,'nuevos_jugadores_casino'); ?>
		<?php echo $form->error($model,'nuevos_jugadores_casino'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nuevos_clientes_poquer'); ?>
		<?php echo $form->textField($model,'nuevos_clientes_poquer'); ?>
		<?php echo $form->error($model,'nuevos_clientes_poquer'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nuevos_clientes_juego'); ?>
		<?php echo $form->textField($model,'nuevos_clientes_juego'); ?>
		<?php echo $form->error($model,'nuevos_clientes_juego'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nuevos_jugadores_bingo'); ?>
		<?php echo $form->textField($model,'nuevos_jugadores_bingo'); ?>
		<?php echo $form->error($model,'nuevos_jugadores_bingo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'beneficios_netos_deportes'); ?>
		<?php echo $form->textField($model,'beneficios_netos_deportes'); ?>
		<?php echo $form->error($model,'beneficios_netos_deportes'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'beneficios_netos_casino'); ?>
		<?php echo $form->textField($model,'beneficios_netos_casino'); ?>
		<?php echo $form->error($model,'beneficios_netos_casino'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'beneficios_netos_poquer'); ?>
		<?php echo $form->textField($model,'beneficios_netos_poquer'); ?>
		<?php echo $form->error($model,'beneficios_netos_poquer'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'beneficios_netos_juegos'); ?>
		<?php echo $form->textField($model,'beneficios_netos_juegos'); ?>
		<?php echo $form->error($model,'beneficios_netos_juegos'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ingresos_totales_netos'); ?>
		<?php echo $form->textField($model,'ingresos_totales_netos'); ?>
		<?php echo $form->error($model,'ingresos_totales_netos'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ganancias_afiliado_deportes'); ?>
		<?php echo $form->textField($model,'ganancias_afiliado_deportes'); ?>
		<?php echo $form->error($model,'ganancias_afiliado_deportes'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ganancias_afiliado_casino'); ?>
		<?php echo $form->textField($model,'ganancias_afiliado_casino'); ?>
		<?php echo $form->error($model,'ganancias_afiliado_casino'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ganancias_afiliado_poquer'); ?>
		<?php echo $form->textField($model,'ganancias_afiliado_poquer'); ?>
		<?php echo $form->error($model,'ganancias_afiliado_poquer'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ganancias_afiliado_juego'); ?>
		<?php echo $form->textField($model,'ganancias_afiliado_juego'); ?>
		<?php echo $form->error($model,'ganancias_afiliado_juego'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comisiones_debidas'); ?>
		<?php echo $form->textField($model,'comisiones_debidas'); ?>
		<?php echo $form->error($model,'comisiones_debidas'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'observaciones'); ?>
		<?php echo $form->textArea($model,'observaciones',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'observaciones'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->