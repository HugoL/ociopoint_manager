<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>true,
	'htmlOptions' => array('enctype'=>'multipart/form-data'),
));
?>

	<p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>

	<?php echo $form->errorSummary(array($model,$profile)); ?>
	<?php if( Yii::app()->getModule('user')->esAlgunAdmin() ): ?>
	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row" style="display:none">
	<?php echo $form->labelEx($model,'superuser'); ?>
	<?php echo $form->dropDownList($model,'superuser',User::itemAlias('AdminStatus')); ?>
	<?php echo $form->error($model,'superuser'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>
	<?php endif; ?>
	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<?php if( Yii::app()->getModule('user')->esAlgunAdmin() ): ?>
	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->dropDownList($model,'status',User::itemAlias('UserStatus')); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>
	<?php else: ?>
	<div class="row" style="display:none">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->dropDownList($model,'status',User::itemAlias('UserStatus')); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>
	<?php endif; ?>
	<?php 
		$profileFields=$profile->getFields();
		if ($profileFields) {
			foreach($profileFields as $field) {
			?>
	<div class="row">
		<?php echo $form->labelEx($profile,$field->varname); ?>
		<?php 
		if ($widgetEdit = $field->widgetEdit($profile)) {
			echo $widgetEdit;
		} elseif ($field->range) {
			echo $form->dropDownList($profile,$field->varname,Profile::range($field->range));
		} elseif ($field->field_type=="TEXT") {
			echo CHtml::activeTextArea($profile,$field->varname,array('rows'=>6, 'cols'=>50));
		} else {
			echo $form->textField($profile,$field->varname,array('size'=>60,'maxlength'=>(($field->field_size)?$field->field_size:255)));
		}
		 ?>
		<?php echo $form->error($profile,$field->varname); ?>
	</div>
			<?php
			}
		}		
?>

	<div class="row">
		<?php echo $form->labelEx($profile,'Cuenta Bancaria'); ?>
		<?php echo $form->textField($profile,'cuentabancaria',array('placeholder'=>'0000 0000 00 0000000000')); 
        ?>

		<?php echo $form->error($profile,'cuentabancaria'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($profile,'rol'); ?>
		<?php echo $form->dropDownList($profile,'rol', 
                CHtml::listData($rollist,'id', 'nombre'), array(
                	'select'=>'--Selecciona un Rol---'
    				)
               ); 
        ?>
		<?php echo $form->error($profile,'rol'); ?>
	</div>

	<?php if( Yii::app()->getModule('user')->esAlgunAdmin() ): ?>
	<div class="row">		
		<?php echo $form->labelEx($profile,'Comision'); ?>		
		<?php echo $form->textField($profile,'comision'); 
        ?>
        <?php echo $form->error($model,'comision'); ?>

		<?php echo $form->error($profile,'cuentabancaria'); ?>
		<small>Si se deja vacío se cogerá el porcentaje por defecto</small>
	
	<?php 
	/*** Select para seleccionar el padre ***/ 
		if( empty($profile->id_padre) )
			$profile->id_padre = Yii::app()->user->id;
		
		echo $form->labelEx($profile,'Padre');
		echo $form->dropDownList($profile,'id_padre', 
        	CHtml::listData($padres,'user_id', 'firstname')
        ); 
	?>
	</div>
	<?php endif; ?>
	
	<div class="row">
		<?php echo $form->labelEx($profile,'pdf'); ?>
		<?php 
              $this->widget('CMultiFileUpload', array(
                  'model'=>$profile,
                  'name' => 'pdf',
                  'attribute'=>'pdf',
                  'max'=>1,
                  'accept' => 'pdf',
                  'duplicate' => 'Fichero duplicado!', 
                  'denied' => 'Tipo de archivo invalido',              
              ));
          ?>

		<?php echo $form->error($profile,'pdf'); ?>
	</div>
	<div class="clearfix">&nbsp;</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? UserModule::t('Create') : UserModule::t('Save'), array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->