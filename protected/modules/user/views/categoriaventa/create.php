<?php
/* @var $this CategoriaventaController */
/* @var $model Categoriaventa */

$this->breadcrumbs=array(
	'Categoriaventas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Categoriaventa', 'url'=>array('index')),
	array('label'=>'Manage Categoriaventa', 'url'=>array('admin')),
);
?>

<h1>Create Categoriaventa</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>