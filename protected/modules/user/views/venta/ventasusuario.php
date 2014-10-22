<div class="row-fluid">
<?php
$this->breadcrumbs=array(
	'Ventas',
);
?>

<h1>Ventas</h1>
<?php if( Yii::app()->getModule('user')->esAlgunAdmin() ): ?>
<div class="row-fluid">
<div class="span12">
	<center><?php $this->widget('bootstrap.widgets.TbButton', array(
    				'label'=>'Nuevo Registro',
    				'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    				'size'=>'large', // null, 'large', 'small' or 'mini'
    				'icon'=>'plus white',
    				'url'=>array('venta/create'),
    				'toggle'=>false,
				)); ?>
	</center></div>
<?php endif; ?>
<div class="row-fluid">

<?php 
//var_dump($dataProvider);
$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_usuarios',
)); ?>
</div>
</div>