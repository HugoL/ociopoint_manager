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
	<div class="row-fluid  well well-small">
		<div class="span3">
		<?php echo $form->labelEx($model,'fecha'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                                'name'=>'Venta[fecha]',
                                'id'=>'Venta_fecha',
                            	'value'=>Yii::app()->dateFormatter->format("d-M-y",strtotime($model->fecha)),
                                'options'=>array(
                                'showAnim'=>false,
                                'dateFormat' => 'dd-mm-yy',
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
		<?php echo $form->labelEx($model,'comisiones_debidas'); ?>
		<?php echo $form->textField($model,'comisiones_debidas',array('class'=>'input-small')); ?>
		<?php echo $form->error($model,'comisiones_debidas'); ?>
	</div>
	<div class="span3">
		<?php echo $form->labelEx($model,'id_categoria'); ?>
		<?php echo $form->dropDownList($model,'id_categoria',CHtml::listData($categorias,'id', 'nombre')); ?>
		<?php echo $form->error($model,'comisiones_debidas'); ?>
	</div>
	</div><!-- row-fluid -->
	<div class="row-fluid">
	<div class="span12"><center>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Insertar' : 'Guardar',array('class'=>'btn btn-primary btn-large')); ?></center>
	</div>	
<?php $this->endWidget(); ?>

</div><!-- form -->