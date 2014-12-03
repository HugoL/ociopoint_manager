<?php
/* @var $this WebController */
/* @var $model Web */

$this->breadcrumbs=array(
	'Webs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Web', 'url'=>array('index')),
	array('label'=>'Create Web', 'url'=>array('create')),
	array('label'=>'Update Web', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Web', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Web', 'url'=>array('admin')),
);
?>

<h1>View Web #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'url',
		'titulo',
		'tipo',
		'id_usuario',
	),
)); ?>
