<?php
/* @var $this CategoriawebController */
/* @var $model Categoriaweb */

$this->breadcrumbs=array(
	'Categoriawebs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Categoriaweb', 'url'=>array('index')),
	array('label'=>'Create Categoriaweb', 'url'=>array('create')),
	array('label'=>'View Categoriaweb', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Categoriaweb', 'url'=>array('admin')),
);
?>

<h1>Update Categoriaweb <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>