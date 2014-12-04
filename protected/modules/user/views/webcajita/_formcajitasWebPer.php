<div class="row-fluid">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'cajitas-form',
		'enableAjaxValidation'=>false,
	)); ?>
	<div class="form-horizontal">
		<?php $i = 1; ?>
	<div class="row-fluid">
	<?php foreach ($cajitas as $key => $cajita): ?>
				
			<?php echo $form->errorSummary($cajita); ?>
			<?php if( $i == 1 ): ?>
				<div class="row-fluid">
			<?php endif; ?>
			<div class="span4 well">
				<?php echo $form->hiddenField($cajita,'['.$key.']id_usuario',array('value'=>$web->id_usuario)); ?>
				<div class="control-group">
					<?php echo $form->textField($cajita,'['.$key.']titulo',array('class' => 'input-small','')); ?>
					<?php echo $form->error($cajita,'[$key]titulo'); ?>
				</div><!-- /control-group -->
			</div>		
			<?php if( $i == 3 ): ?>
				<?php $i = 0; ?>
				</div>				
			<?php endif; ?>		
			<?php $i++; ?>
	<?php endforeach; ?>
	</div>
	<?php $this->endWidget(); ?>
	</div>
</div>
<div class="row-fluid"><center>	<?php echo CHtml::submitButton($cajita->isNewRecord ? 'Insertar' : 'Guardar',array('class'=>'btn btn-primary btn-large')); ?></center></div>
<div class="clearfix">&nbsp;</div>