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
?>

<h1>Nueva Web</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'establecimientos'=>$establecimientos)); ?>