<?php
/* @var $this CategoriaventaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Categoriaventas',
);

$this->menu=array(
	array('label'=>'Create Categoriaventa', 'url'=>array('create')),
	array('label'=>'Manage Categoriaventa', 'url'=>array('admin')),
);
?>

<h1>Categoriaventas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
