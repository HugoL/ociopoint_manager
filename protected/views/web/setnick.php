<div class="cesped">
<div class="container-fluid">	
	<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 menu">
         <div class="col-md-11 col-lg-11 col-sm-11 col-xs-11">
             <ul class="nav nav-pills">
                <li  role="presentation" <?php if( 1 == 2) echo "class='active'"; ?>><a href="#" class="navbar-brand"><?php echo $web->titulo; ?></a></li>
                <li  role="presentation" class="active" <?php if( 1 == 2) echo "class='active'"; ?>><a href="#">Chat</a></li>
                <li  role="presentation" <?php if( 1 == 2) echo "class='active'"; ?>><a href="#">Pronósticos deportivos</a></li>
            </ul>
            </div>
            <h4>
             <div class="col-md-1 col-lg-1 col-sm-1 col-xs-1"><a href="#" class="sharetodos"><img src="<?php echo Yii::app()->baseUrl.'/images/web_per/'; ?>/share.png"/></a></div>
        </div>
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
<div class="panel panel-default">
	<div class="panel-heading"><h3>Acceso al Chat de Ociopoint</h3></div>
	<div class="panel-body">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'nick-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype'=>'multipart/form-data'),
));
?>
		<label>Escribe tu nombre para chatear: </label>
		<?php echo $form->textField($model,'post_identity',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'post_identity'); ?>
	<div class="clearfix">&nbsp;</div>
	<div class="buttons">
		<?php echo CHtml::submitButton('Entrar', array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>
<div class="clearfix">&nbsp;</div>
</div><!-- panel-body -->
</div><!-- /panel -->
</div>
</div>
</div><!-- /cesped -->