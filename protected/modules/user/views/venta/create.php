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

<div class="alert alert-info">Las ventas insertadas manualmente corresponden a ventas NO relacionadas con <strong>Bet365</strong></div>

<div class="row-fluid"><center>
		<?php $this->widget('bootstrap.widgets.TbButton', array(
    						'label'=>'Volver',
    						'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    						'size'=>'large', // null, 'large', 'small' or 'mini'
    						'icon'=>'arrow-left white',
    						'url'=>array('venta/index'),
    						'toggle'=>false,
							)); ?>
</center><br/></div>

<?php $this->renderPartial('_form', array('model'=>$model,'usuarios'=>$usuarios,'categorias'=>$categorias)); ?>

<?php else: ?>
	<div class="alert alert-error">No estás autorizado a realizar esta acción</div>
<?php endif; ?>