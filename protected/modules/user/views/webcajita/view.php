<?php
/* @var $this WebcajitaController */
/* @var $model Webcajita */

$this->breadcrumbs=array(
	'Webcajitas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Webcajita', 'url'=>array('index')),
	array('label'=>'Create Webcajita', 'url'=>array('create')),
	array('label'=>'Update Webcajita', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Webcajita', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Webcajita', 'url'=>array('admin')),
);
?>

<h1>View Webcajita #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'url',
		'posicion',
		'titulo',
		'imagen',
		'tamano',
		'id_categoria',
		'id_web',
	),
)); ?>
