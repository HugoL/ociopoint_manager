<?php
/* @var $this VentaController */
/* @var $model Venta */

if( Yii::app()->getModule('user')->esAlgunAdmin() ):
$this->breadcrumbs=array(
	'Ventas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Venta', 'url'=>array('index')),
	array('label'=>'Manage Venta', 'url'=>array('admin')),
);
?>

<h1>Nueva Venta</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'usuarios'=>$usuarios)); ?>

<?php else: ?>
	<div class="alert alert-error">No estás autorizado a realizar esta acción</div>
<?php endif; ?>