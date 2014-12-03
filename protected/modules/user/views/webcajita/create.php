<?php
/* @var $this WebcajitaController */
/* @var $model Webcajita */

$this->breadcrumbs=array(
	'Webcajitas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Webcajita', 'url'=>array('index')),
	array('label'=>'Manage Webcajita', 'url'=>array('admin')),
);
?>

<h1>Create Webcajita</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>