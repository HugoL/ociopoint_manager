<?php
/* @var $this PopupController */
/* @var $model Popup */

$this->breadcrumbs=array(
	'Popups'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Popup', 'url'=>array('index')),
	array('label'=>'Manage Popup', 'url'=>array('admin')),
);
?>
<div class="container-fluid">
<center><h1>Crear un Popup</h1>
<div class="well">
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</center>
<div class="clearfix">&nbsp;</div>
</div>
</div>