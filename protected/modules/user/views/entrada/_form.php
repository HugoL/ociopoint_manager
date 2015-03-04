<?php
/* @var $this EntradaController */
/* @var $model Entrada */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'entrada-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'titulo'); ?>
		<?php echo $form->textField($model,'titulo',array('class'=>'span12','maxlength'=>512)); ?>
		<?php echo $form->error($model,'titulo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'resumen'); ?>
		<?php $this->widget('application.extensions.cleditor.ECLEditor', array(
        'model'=>$model,
        'attribute'=>'resumen', //Model attribute name. Nome do atributo do modelo.
        'options'=>array(
            'width'=>'100%',
            'height'=>100,
            'useCSS'=>true,
        ),
        'value'=>$model->resumen,
    )); ?>
		<?php echo $form->error($model,'resumen'); ?>
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
	<br/>
	<div class="row">
		<?php echo $form->labelEx($model,'estado'); ?>
		<?php echo $form->dropDownList($model,'estado',array('1'=>'Público', '0'=>'Borrador'),array('class'=>'span2')); ?>
		<?php echo $form->error($model,'estado'); ?>
	</div>
	<br/>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Guardar' : 'Actualizar',array('class' => 'btn btn-primary btn-large')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->