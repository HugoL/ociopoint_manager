<?php
/* @var $this CategoriaventaController */
/* @var $model Categoriaventa */

$this->breadcrumbs=array(
	'Categoriaventas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Categoriaventa', 'url'=>array('index')),
	array('label'=>'Create Categoriaventa', 'url'=>array('create')),
	array('label'=>'Update Categoriaventa', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Categoriaventa', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Categoriaventa', 'url'=>array('admin')),
);
?>

<h1>View Categoriaventa #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
		'descripcion',
		'activado',
	),
)); ?>
