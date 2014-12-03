<?php
/* @var $this WebcajitaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Webcajitas',
);

$this->menu=array(
	array('label'=>'Create Webcajita', 'url'=>array('create')),
	array('label'=>'Manage Webcajita', 'url'=>array('admin')),
);
?>

<h1>Webcajitas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
