<div class="row-fluid">
<?php
/* @var $this VentaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ventas',
);

$this->menu=array(
	array('label'=>'Create Venta', 'url'=>array('create')),
	array('label'=>'Manage Venta', 'url'=>array('admin')),
);
?>

<h1>Ventas</h1>
<?php if( Yii::app()->getModule('user')->esAlgunAdmin() ): ?>
<div class="row-fluid">
<div class="span12"><center><?php $this->widget('bootstrap.widgets.TbButton', array(
    						'label'=>'Añadir ventas',
    						'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    						'size'=>'large', // null, 'large', 'small' or 'mini'
    						'icon'=>'plus white',
    						'url'=>array('venta/importarCsv'),
    						'toggle'=>false,
							)); ?>
</center></div>
<?php endif; ?>
<div class="clearfix">&nbsp;</div>
<div class="row-fluid">
<div class="span2"><b>Refencia</div><div class="span2">Nuevos Registros</div><div class="span2">Nuevos Depositantes</div><div class="span2"><b>Nuevos Dep. Deportes</div>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_resumen',
)); ?>
</div>
</div>