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
<?php 
    $rol = Rol::model()->findByPK(Yii::app()->getModule('user')->user()->profile->rol); 
    $esadmin = Yii::app()->getModule('user')->esAlgunAdmin();
?>
<h1>Vista general de ventas</h1>
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
<table class="table table-hover">
<tr><th>Refencia</th><th>Nuevos Registros</th><th>Nuevos Depositantes</th><th>Nuevos Dep. Deportes</th><?php if( strcmp($rol->nombre,'distribuidor') == 0 || $esadmin ) : ?><th>Comisiones Debidas</th><?php endif; ?><th></th></tr>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'viewData' => array( 'rol' => $rol, 'esadmin' => $esadmin ),
	'itemView'=>'_resumen',
)); ?>
</table>
</div>
</div>