<?php
/* @var $this PopupController */
/* @var $model Popup */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'popup-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'titulo'); ?>
		<?php echo $form->textField($model,'titulo',array('size'=>60,'maxlength'=>512)); ?>
		<?php echo $form->error($model,'titulo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'texto'); ?>
		<?php $this->widget('application.extensions.cleditor.ECLEditor', array(
        'model'=>$model,
        'attribute'=>'texto', //Model attribute name. Nome do atributo do modelo.
        'options'=>array(
            'width'=>'100%',
            'height'=>250,
            'useCSS'=>true,
        ),
        'value'=>$model->texto,
    )); ?>
		<?php echo $form->error($model,'texto'); ?>
	</div>

	<div class="row">
		<?php if( !empty($model->fecha_inicio) ): ?>
			<?php //$inicio = date('d-m-Y',strtotime($model->fecha_inicio)); ?>
		<?php else: ?>
			<?php $inicio = ""; ?>
		<?php endif; ?>
		<?php echo $form->labelEx($model,'fecha_inicio'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                'name'=>'Popup[fecha_inicio]',
                'id'=>'Popup_fecha_inicio',
            	'value'=>$model->fecha_inicio,
                'options'=>array(
                'showAnim'=>false,
                'dateFormat' => 'yy-mm-dd',
                ),
                'htmlOptions'=>array(
                'style'=>'height:20px;',
                'class'=>'input-small',
                ),
        )); ?>
		<?php echo $form->error($model,'fecha_inicio'); ?>
	</div>

	<div class="row">
		<?php if( !empty($model->fecha_fin) ): ?>
			<?php //$fin = date('d-m-Y',strtotime($model->fecha_fin)); ?>
		<?php else: ?>
			<?php $fin = ""; ?>
		<?php endif; ?>
		<?php echo $form->labelEx($model,'fecha_fin'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                'name'=>'Popup[fecha_fin]',
                'id'=>'Popup_fecha_fin',
            	'value'=> $model->fecha_fin,
                'options'=>array(
                'showAnim'=>false,
                'dateFormat' => 'yy-mm-dd',
                ),
                'htmlOptions'=>array(
                'style'=>'height:20px;',
                'class'=>'input-small',
                ),
        )); ?>
		<?php echo $form->error($model,'fecha_fin'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array('class'=>'btn btn-primary btn-large')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->