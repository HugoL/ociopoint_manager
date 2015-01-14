<?php
/* @var $this WebController */
/* @var $model Web */

$this->breadcrumbs=array(
	'Webs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Web', 'url'=>array('index')),
	array('label'=>'Manage Web', 'url'=>array('admin')),
);
$popup = Popup::model()->find();
?>
<div class="well well-small"><center><?php echo CHtml::link('Ver webs creadas',array('listado'),array('class'=>'btn btn-primary')); ?> &nbsp;&nbsp;&nbsp;<?php if( !empty($popup) ) echo CHtml::link('Nuevo PopUp', array('popup/update/id/'.$popup->id),array('class'=>'btn btn-info')); else echo CHtml::link('Nuevo PopUp', array('popup/create'),array('class'=>'btn btn-info')); ?></center></div>

<?php if( Yii::app()->user->hasFlash('popupsuccess')): ?>
	<div class="alert alert-success"><?php echo Yii::app()->user->getFlash('popupsuccess'); ?></div>
	<div class="clearfix">&nbsp;</div>
<?php endif; ?>
<h1>Nueva Web</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'establecimientos'=>$establecimientos)); ?>