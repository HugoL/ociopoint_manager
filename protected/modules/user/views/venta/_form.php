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

	<p class="note">Los campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>
	<div class="row-fluid">
		<div class="span12">
		<?php if( isset( $usuarios ) ): ?>
			<?php echo $form->labelEx($model,'id_usuario'); ?>
			<?php echo $form->dropDownList($model,'id_usuario',CHtml::listData($usuarios,'user_id', 'referencia'), array(
                	'select'=>'--Selecciona un Usuario---'
    				)); ?>
			<?php echo $form->error($model,'id_usuario'); ?>
		<?php endif; ?>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span3">
		<?php echo $form->labelEx($model,'fecha'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                                'name'=>'Venta[fecha]',
                                'id'=>'Venta_fecha',
                            'value'=>Yii::app()->dateFormatter->format("y-M-d",strtotime($model->fecha)),
                                'options'=>array(
                                'showAnim'=>false,
                                ),
                                'htmlOptions'=>array(
                                'style'=>'height:20px;',
                                'class'=>'input-small',
                                ),
                        )); ?>

		<?php /*echo $form->datepickerRow($model,'fecha',
			array('hint'=>'Haz click para seleccionar la fecha.',
                    'prepend'=>'<i class="icon-calendar"></i>',
                    'options'=>array('format'=>'yyyy-mm-dd'))); */?>
		<?php echo $form->error($model,'fecha'); ?>
	</div>

	<div class="span3">
		<?php echo $form->labelEx($model,'clics'); ?>
		<?php echo $form->textField($model,'clics',array('class'=>'input-small')); ?>
		<?php echo $form->error($model,'clics'); ?>
	</div>

	<div class="span3">
		<?php echo $form->labelEx($model,'nuevos_registros'); ?>
		<?php echo $form->textField($model,'nuevos_registros',array('class'=>'input-small')); ?>
		<?php echo $form->error($model,'nuevos_registros'); ?>
	</div>

	<div class="span3">
		<?php echo $form->labelEx($model,'nuevos_depositantes'); ?>
		<?php echo $form->textField($model,'nuevos_depositantes',array('class'=>'input-small')); ?>
		<?php echo $form->error($model,'nuevos_depositantes'); ?>
	</div>
	</div><!-- row-fluid -->

	<div class="row-fluid">
		<div class="span3">
		<?php echo $form->labelEx($model,'nuevos_depositantes_deportes'); ?>
		<?php echo $form->textField($model,'nuevos_depositantes_deportes',array('class'=>'input-small')); ?>
		<?php echo $form->error($model,'nuevos_depositantes_deportes'); ?>
	</div>

	<div class="span3">
		<?php echo $form->labelEx($model,'nuevos_depositantes_casino'); ?>
		<?php echo $form->textField($model,'nuevos_depositantes_casino',array('class'=>'input-small')); ?>
		<?php echo $form->error($model,'nuevos_depositantes_casino'); ?>
	</div>

	<div class="span3">
		<?php echo $form->labelEx($model,'nuevos_depositantes_poquer'); ?>
		<?php echo $form->textField($model,'nuevos_depositantes_poquer',array('class'=>'input-small')); ?>
		<?php echo $form->error($model,'nuevos_depositantes_poquer'); ?>
	</div>

	<div class="span3">
		<?php echo $form->labelEx($model,'nuevos_depositantes_juegos'); ?>
		<?php echo $form->textField($model,'nuevos_depositantes_juegos',array('class'=>'input-small')); ?>
		<?php echo $form->error($model,'nuevos_depositantes_juegos'); ?>
	</div>
	</div><!-- row-fluid -->

	<div class="row-fluid">
	<div class="span3">
		<?php echo $form->labelEx($model,'nuevos_depositantes_bingo'); ?>
		<?php echo $form->textField($model,'nuevos_depositantes_bingo',array('class'=>'input-small')); ?>
		<?php echo $form->error($model,'nuevos_depositantes_bingo'); ?>
	</div>

	<div class="span3">
		<?php echo $form->labelEx($model,'valor_depositos'); ?>
		<?php echo $form->textField($model,'valor_depositos',array('class'=>'input-small')); ?>
		<?php echo $form->error($model,'valor_depositos'); ?>
	</div>

	<div class="span3">
		<?php echo $form->labelEx($model,'numero_depositos'); ?>
		<?php echo $form->textField($model,'numero_depositos',array('class'=>'input-small')); ?>
		<?php echo $form->error($model,'numero_depositos'); ?>
	</div>

	<div class="span3">
		<?php echo $form->labelEx($model,'facturacion_deportes'); ?>
		<?php echo $form->textField($model,'facturacion_deportes',array('class'=>'input-small')); ?>
		<?php echo $form->error($model,'facturacion_deportes'); ?>
	</div>
</div><!-- row-fluid -->

	<div class="row-fluid">
	<div class="span3">
		<?php echo $form->labelEx($model,'numero_apuestas_deportivas'); ?>
		<?php echo $form->textField($model,'numero_apuestas_deportivas',array('class'=>'input-small')); ?>
		<?php echo $form->error($model,'numero_apuestas_deportivas'); ?>
	</div>

	<div class="span3">
		<?php echo $form->labelEx($model,'usuarios_activos_deportes'); ?>
		<?php echo $form->textField($model,'usuarios_activos_deportes',array('class'=>'input-small')); ?>
		<?php echo $form->error($model,'usuarios_activos_deportes'); ?>
	</div>

	<div class="span3">
		<?php echo $form->labelEx($model,'sesiones_casino'); ?>
		<?php echo $form->textField($model,'sesiones_casino',array('class'=>'input-small')); ?>
		<?php echo $form->error($model,'sesiones_casino'); ?>
	</div>

	<div class="span3">
		<?php echo $form->labelEx($model,'nuevos_jugadores_deportes'); ?>
		<?php echo $form->textField($model,'nuevos_jugadores_deportes',array('class'=>'input-small')); ?>
		<?php echo $form->error($model,'nuevos_jugadores_deportes'); ?>
	</div>
	</div><!-- row-fluid -->
	<div class="row-fluid">
		<div class="span3">
		<?php echo $form->labelEx($model,'nuevos_jugadores_casino'); ?>
		<?php echo $form->textField($model,'nuevos_jugadores_casino',array('class'=>'input-small')); ?>
		<?php echo $form->error($model,'nuevos_jugadores_casino'); ?>
	</div>

	<div class="span3">
		<?php echo $form->labelEx($model,'nuevos_clientes_poquer'); ?>
		<?php echo $form->textField($model,'nuevos_clientes_poquer',array('class'=>'input-small')); ?>
		<?php echo $form->error($model,'nuevos_clientes_poquer'); ?>
	</div>

	<div class="span3">
		<?php echo $form->labelEx($model,'nuevos_clientes_juego'); ?>
		<?php echo $form->textField($model,'nuevos_clientes_juego',array('class'=>'input-small')); ?>
		<?php echo $form->error($model,'nuevos_clientes_juego'); ?>
	</div>

	<div class="span3">
		<?php echo $form->labelEx($model,'nuevos_jugadores_bingo'); ?>
		<?php echo $form->textField($model,'nuevos_jugadores_bingo',array('class'=>'input-small')); ?>
		<?php echo $form->error($model,'nuevos_jugadores_bingo'); ?>
	</div>
	</div><!-- row-fluid -->

	<div class="row-fluid">
	<div class="span3">
		<?php echo $form->labelEx($model,'beneficios_netos_deportes'); ?>
		<?php echo $form->textField($model,'beneficios_netos_deportes',array('class'=>'input-small')); ?>
		<?php echo $form->error($model,'beneficios_netos_deportes'); ?>
	</div>

	<div class="span3">
		<?php echo $form->labelEx($model,'beneficios_netos_casino'); ?>
		<?php echo $form->textField($model,'beneficios_netos_casino',array('class'=>'input-small')); ?>
		<?php echo $form->error($model,'beneficios_netos_casino'); ?>
	</div>

	<div class="span3">
		<?php echo $form->labelEx($model,'beneficios_netos_poquer'); ?>
		<?php echo $form->textField($model,'beneficios_netos_poquer',array('class'=>'input-small')); ?>
		<?php echo $form->error($model,'beneficios_netos_poquer'); ?>
	</div>

	<div class="span3">
		<?php echo $form->labelEx($model,'beneficios_netos_juegos'); ?>
		<?php echo $form->textField($model,'beneficios_netos_juegos',array('class'=>'input-small')); ?>
		<?php echo $form->error($model,'beneficios_netos_juegos'); ?>
	</div>
	</div><!-- row-fluid -->

	<div class="row-fluid">
	<div class="span3">
		<?php echo $form->labelEx($model,'ingresos_totales_netos'); ?>
		<?php echo $form->textField($model,'ingresos_totales_netos',array('class'=>'input-small')); ?>
		<?php echo $form->error($model,'ingresos_totales_netos'); ?>
	</div>

	<div class="span3">
		<?php echo $form->labelEx($model,'ganancias_afiliado_deportes'); ?>
		<?php echo $form->textField($model,'ganancias_afiliado_deportes',array('class'=>'input-small')); ?>
		<?php echo $form->error($model,'ganancias_afiliado_deportes'); ?>
	</div>

	<div class="span3">
		<?php echo $form->labelEx($model,'ganancias_afiliado_casino'); ?>
		<?php echo $form->textField($model,'ganancias_afiliado_casino',array('class'=>'input-small')); ?>
		<?php echo $form->error($model,'ganancias_afiliado_casino'); ?>
	</div>

	<div class="span3">
		<?php echo $form->labelEx($model,'ganancias_afiliado_poquer'); ?>
		<?php echo $form->textField($model,'ganancias_afiliado_poquer',array('class'=>'input-small')); ?>
		<?php echo $form->error($model,'ganancias_afiliado_poquer'); ?>
	</div>
	</div><!-- row-fluid -->

	<div class="row-fluid">
	<div class="span3">
		<?php echo $form->labelEx($model,'ganancias_afiliado_juego'); ?>
		<?php echo $form->textField($model,'ganancias_afiliado_juego',array('class'=>'input-small')); ?>
		<?php echo $form->error($model,'ganancias_afiliado_juego'); ?>
	</div>

	<div class="span3">
		<?php echo $form->labelEx($model,'comisiones_debidas'); ?>
		<?php echo $form->textField($model,'comisiones_debidas',array('class'=>'input-small')); ?>
		<?php echo $form->error($model,'comisiones_debidas'); ?>
	</div>
	</div><!-- row-fluid -->
	<div class="row-fluid">
	<div class="span12">
		<?php echo $form->labelEx($model,'observaciones'); ?>
		<?php echo $form->textArea($model,'observaciones',array('rows'=>6, 'cols'=>100)); ?>
		<?php echo $form->error($model,'observaciones'); ?>
	</div>
	</div>
	<div class="row-fluid">
	<div class="span12"><center>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Insertar' : 'Guardar',array('class'=>'btn btn-primary btn-large')); ?></center>
	</div>	
<?php $this->endWidget(); ?>

</div><!-- form -->