<div class="row-fluid">
<?php
$this->breadcrumbs=array(
	'Ventas',
);
?>

<h2>Ventas de <span class="referencia"><?php echo $profile->referencia; ?></span></h2>
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
<div class="span2"><b>Mes</div><div class="span2">Nuevos Registros</div><div class="span2">Nuevos Depositantes</div><div class="span2"><b>Nuevos Dep. Deportes</div>
<?php 
//var_dump($dataProvider);
$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_usuarios',
)); ?>
</div>
</div>