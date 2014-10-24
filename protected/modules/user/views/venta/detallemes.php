<div class="row-fluid">
<?php
$this->breadcrumbs=array(
	'Ventas',
);
?>
<?php  $esadmin = Yii::app()->getModule('user')->esAlgunAdmin(); ?>
<h2>Ventas de <span class="referencia"><?php echo $profile->referencia; ?></span></div></h2>
<div class="row-fluid">
<div class="span12">
	<center><?php $this->widget('bootstrap.widgets.TbButton', array(
    				'label'=>'Volver',
    				'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    				'size'=>'large', // null, 'large', 'small' or 'mini'
    				'icon'=>'arrow-left white',
    				'url'=>array('venta/ventasUsuario/id/'.$profile->user_id),
    				'toggle'=>false,
				)); ?>
	</center></div>
<div class="row-fluid">
	<table class="table table-condensed">
		<tr>
<th>fecha</th><th>Nuevos Registros</th><th>Nuevos Depositantes</th><th><b>Nuevos Dep. Deportes</th><?php if( $esadmin ): ?> <th>Ganancias Afiliado Juego</th><th>Comisiones Debidas</th><?php endif; ?>
</tr>
<?php 
//var_dump($dataProvider);
$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'viewData'=> array('esadmin' => $esadmin),
	'itemView'=>'_vistames',	
)); ?>
</table>
</div>
</div>