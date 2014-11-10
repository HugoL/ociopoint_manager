<?php
$this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Login");
?>

<div class="page-header">
	<center>
	<h1><img src="<?php echo Yii::app()->baseUrl ?>/images/llave.png" class="img-rounded" alt="Acceso restringido">Ociopoint<small> acceso a usuarios registrados</small></h1></center>
</div>

<div class="row-fluid">
	 <div class="span3">&nbsp;</div>
	 <div class="span6">

<?php if(Yii::app()->user->hasFlash('loginMessage')): ?>

<div class="success">
	<?php echo Yii::app()->user->getFlash('loginMessage'); ?>
</div>

<?php endif; ?>

<div class="hero-unit">
<div class="form">
	<center>
<?php echo CHtml::beginForm(); ?>
	
	<?php echo CHtml::errorSummary($model); ?>
	
	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'username'); ?>
		<?php echo CHtml::activeTextField($model,'username') ?>
	</div>
	
	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'password'); ?>
		<?php echo CHtml::activePasswordField($model,'password') ?>
	</div>
	
	<div class="row rememberMe">
		<?php echo CHtml::activeCheckBox($model,'rememberMe'); ?><span> Recordarme más tarde</span>
		<?php //echo CHtml::activeLabelEx($model,'rememberMe'); ?> 
	</div>
	<br/>
	<div class="row submit">
		<?php echo CHtml::submitButton(UserModule::t("Login"), array('class'=>'btn btn-primary btn-large')); ?>
	</div>
	<div class="row">
		<p class="hint"><small>
		<?php echo CHtml::link(UserModule::t("Lost Password?"),Yii::app()->getModule('user')->recoveryUrl); ?></small>
		</p>
	</div>
	
<?php echo CHtml::endForm(); ?>
</center>
</div><!-- form -->
</div><!-- hero-unit -->

<?php
$form = new CForm(array(
    'elements'=>array(
        'username'=>array(
            'type'=>'text',
            'maxlength'=>32,
        ),
        'password'=>array(
            'type'=>'password',
            'maxlength'=>32,
        ),
        'rememberMe'=>array(
            'type'=>'checkbox',
        )
    ),

    'buttons'=>array(
        'login'=>array(
            'type'=>'submit',
            'label'=>'Login',
        ),
    ),
), $model);
?>
	</div><!-- span6 -->
<div class="span3">&nbsp;</div>
</div><!-- row-fluid -->