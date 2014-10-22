<?php if(Yii::app()->user->hasFlash('success')):?>
    <div class="alert alert-success">
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php endif; ?>
<?php if(Yii::app()->user->hasFlash('warning')):?>
    <div class="alert alert-warning">
        <?php echo Yii::app()->user->getFlash('warning'); ?>
    </div>
<?php endif; ?>
<?php if(Yii::app()->user->hasFlash('error')):?>
    <div class="alert alert-error">
        <?php echo Yii::app()->user->getFlash('error'); ?>
    </div>
<?php endif; ?>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
 'id'=>'venta-form',
 'enableAjaxValidation'=>false,
 'htmlOptions'=>array('enctype' => 'multipart/form-data'),
)); ?>

 <?php //echo $form->errorSummary($model); ?>
 <h2>Importar datos de ventas</h2>
 <div class="well">
 <div class="row-fluid">
        <?php 
            $this->widget('CMultiFileUpload', array(
                'model'=>$model,
                'name' => 'csv',
                'attribute'=>'csv',
                'max'=>1,
                'accept' => 'csv',
                'duplicate' => 'Fichero duplicado!', 
                'denied' => 'Tipo de archivo invalido',              
            ));
        ?>
  <?php echo $form->error($model,'csv'); ?>
 </div>
 <div class="clearfix">&nbsp;</div>
 <div class="row-fluid buttons">
  <?php echo CHtml::submitButton('Importar',array("id"=>"Import",'name'=>'Import','class'=>'btn btn-primary btn-large')); ?>
 </div>
<?php $this->endWidget(); ?>
</div><!-- well -->
</div><!-- form -->