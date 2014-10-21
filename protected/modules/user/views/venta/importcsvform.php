<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
 'id'=>'venta-form',
 'enableAjaxValidation'=>false,
 'htmlOptions'=>array('enctype' => 'multipart/form-data'),
)); ?>

 <?php //echo $form->errorSummary($model); ?>

 <div class="row">
  <?php echo $form->labelEx($model,'csv'); ?>
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

 <div class="row buttons">
  <?php echo CHtml::submitButton('Import',array("id"=>"Import",'name'=>'Import')); ?>
 </div>
<?php $this->endWidget(); ?>
</div><!-- form -->