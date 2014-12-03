<?php
/* @var $this CategoriawebController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Categoriawebs',
);

$this->menu=array(
	array('label'=>'Create Categoriaweb', 'url'=>array('create')),
	array('label'=>'Manage Categoriaweb', 'url'=>array('admin')),
);
?>

<h1>Categoriawebs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
