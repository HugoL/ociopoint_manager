<?php
/* @var $this WebcajitaController */
/* @var $model Webcajita */

$this->breadcrumbs=array(
	'Webcajitas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Webcajita', 'url'=>array('index')),
	array('label'=>'Create Webcajita', 'url'=>array('create')),
	array('label'=>'View Webcajita', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Webcajita', 'url'=>array('admin')),
);
?>

<h1>Update Webcajita <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>