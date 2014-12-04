<?php
/* @var $this WebController */
/* @var $model Web */
/* @var $form CActiveForm */
?>

<div class="form span12">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'web-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row-fluid">
		<div class="span6">
		<?php echo $form->labelEx($model,'titulo'); ?>
		<?php echo $form->textField($model,'titulo',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'titulo'); ?>
		</div>
	
		<div class="span6">
		<?php echo $form->labelEx($model,'url'); ?>
		<?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>800),array('class'=>'span12')); ?>
		<?php echo $form->error($model,'url'); ?>
		</div>
	</div>	
	<div class="clearfix">&nbsp;</div>

	<div class="row-fluid">
		<div class="span6">
			<?php echo $form->labelEx($model,'tipo'); ?>
			<?php echo $form->dropDownList($model,'tipo',array('0'=>'Web Personalizada', '1'=>'Web iPad'),array('class'=>'span5')); ?>
			<?php echo $form->error($model,'tipo'); ?>
		</div>
		<div class="span6">
			<?php if( isset( $establecimientos ) ): ?>
				<?php echo $form->labelEx($model,'id_usuario'); ?>
				<?php echo $form->dropDownList($model,'id_usuario',CHtml::listData($establecimientos,'user_id', 'referencia'), array(
	                	'select'=>'--Selecciona un Usuario---',
	                	'class'=>'span5',
	    				)); ?>
				<?php echo $form->error($model,'id_usuario'); ?>
			<?php endif; ?>		
		</div>
	</div>

	<div class="row">
		&nbsp;
	</div>

	<div class="row-fluid buttons span12">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array('class' => 'btn btn-primary btn-large')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->