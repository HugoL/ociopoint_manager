<?php
/* @var $this CategoriawebController */
/* @var $model Categoriaweb */

$this->breadcrumbs=array(
	'Categoriawebs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Categoriaweb', 'url'=>array('index')),
	array('label'=>'Create Categoriaweb', 'url'=>array('create')),
	array('label'=>'Update Categoriaweb', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Categoriaweb', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Categoriaweb', 'url'=>array('admin')),
);
?>

<h1>View Categoriaweb #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
		'descripcion',
		'activado',
	),
)); ?>
