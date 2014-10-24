<div class="row-fluid">
<?php
$this->breadcrumbs=array(
	'Ventas',
);
?>
<?php 
    $rol = Rol::model()->findByPK(Yii::app()->getModule('user')->user()->profile->rol); 
    $esadmin = Yii::app()->getModule('user')->esAlgunAdmin();
?>
<h2>Ventas de <span class="referencia"><?php echo $profile->referencia; ?></span></h2>
<?php if( Yii::app()->getModule('user')->esAlgunAdmin() ): ?>
<div class="row-flui8577d">
<div class="span6" align="right">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
    				'label'=>'Nuevo Registro',
    				'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    				'size'=>'large', // null, 'large', 'small' or 'mini'
    				'icon'=>'plus white',
    				'url'=>array('venta/create'),
    				'toggle'=>false,
				)); ?>
	</div>	
<?php endif; ?>
<div class="span6" align="left">
	<center><?php $this->widget('bootstrap.widgets.TbButton', array(
    				'label'=>'Volver',
    				'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    				'size'=>'large', // null, 'large', 'small' or 'mini'
    				'icon'=>'arrow-left white',
    				'url'=>array('venta/index'),
    				'toggle'=>false,
				)); ?>
	</center></div>
</div>
<div class="clearfix">&nbsp;</div>
<div class="row-fluid">
<table class="table table-hover">
<tr><th>Mes</th><th>Nuevos Registros</th><th>Nuevos Depositantes</th><th>Nuevos Dep. Deportes</th><?php if( strcmp($rol->nombre,'distribuidor') == 0 || $esadmin ) : ?><th>Comisiones Debidas</th><?php endif; ?><?php if( $esadmin ) : ?><th></th><?php endif; ?></tr>
<?php 
//var_dump($dataProvider);
$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
    'viewData' => array( 'rol' => $rol, 'esadmin' => $esadmin ),
	'itemView'=>'_usuarios',    
)); ?>
</table>
</div>
</div>
