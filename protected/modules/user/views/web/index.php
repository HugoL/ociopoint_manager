<?php
/* @var $this WebController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Webs',
);

$this->menu=array(
	array('label'=>'Create Web', 'url'=>array('create')),
	array('label'=>'Manage Web', 'url'=>array('admin')),
);
?>

<h1>Webs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
