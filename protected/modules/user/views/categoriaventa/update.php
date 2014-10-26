<?php
/* @var $this CategoriaventaController */
/* @var $model Categoriaventa */

$this->breadcrumbs=array(
	'Categoriaventas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Categoriaventa', 'url'=>array('index')),
	array('label'=>'Create Categoriaventa', 'url'=>array('create')),
	array('label'=>'View Categoriaventa', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Categoriaventa', 'url'=>array('admin')),
);
?>

<h1>Update Categoriaventa <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>