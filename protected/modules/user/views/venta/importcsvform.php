<?php if(Yii::app()->user->hasFlash('info')):?>
    <div class="alert alert-info">
        <?php echo Yii::app()->user->getFlash('info'); ?>
    </div>
<?php endif; ?>
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
<?php if( !isset( $model) ): ?>
  <div class="alert alert-error">No tienes suficientes permisos</div>
<?php else: ?>
  <div class="form">
  <?php $form=$this->beginWidget('CActiveForm', array(
   'id'=>'venta-form',
   'enableAjaxValidation'=>false,
   'htmlOptions'=>array('enctype' => 'multipart/form-data'),
  )); ?>

   <?php //echo $form->errorSummary($model); ?>
   <h2>Importar datos de ventas <small>desde un fichero CSV</small></h2>
   <div class="alert alert-info">Nota: <strong>Eliminar</strong> (si es que existe) la <strong>fila de los totales</strong>. Todas las filas deben de tener la referencia del establecimiento, excepto la primera fila, que deben ser los títulos de las columnas. El caracter de separación del fichero CSV debe ser el <strong>punto y coma</strong>: <strong>;</strong></div>
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
<div class="clearfix">&nbsp;</div>
<div class="clearfix">&nbsp;</div>

  <div class="span12"><?php $this->widget('bootstrap.widgets.TbButton', array(
                'label'=>'Listado de ventas',
                'type'=>'info', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                'size'=>'small', // null, 'large', 'small' or 'mini'
                'icon'=>'arrow-left white',
                'url'=>array('venta/index'),
                'toggle'=>false,
              )); ?>
</div>
<?php endif; ?>