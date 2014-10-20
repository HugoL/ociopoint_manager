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
<div class="span12"><center><?php echo CHtml::link('Nuevo registro',array('venta/create'),array('class'=>'btn btn-primary btn-large')); ?></center></div>
</div>
<?php endif; ?>
<div class="row-fluid">

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
</div>
</div>