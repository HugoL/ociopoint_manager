<?php
/* @var $this PopupController */
/* @var $model Popup */

$this->breadcrumbs=array(
	'Popups'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Popup', 'url'=>array('index')),
	array('label'=>'Create Popup', 'url'=>array('create')),
	array('label'=>'View Popup', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Popup', 'url'=>array('admin')),
);
?>
<div class="container-fluid">
<center><h1>Modificar Popup</h1>
	<div class="well">
	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
	</div>
</center>
</div>