<?php
/* @var $this CategoriawebController */
/* @var $model Categoriaweb */

$this->breadcrumbs=array(
	'Categoriawebs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Categoriaweb', 'url'=>array('index')),
	array('label'=>'Manage Categoriaweb', 'url'=>array('admin')),
);
?>

<h1>Create Categoriaweb</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>