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

<div class="span12" align="left"><center>
	<?php $this->widget('bootstrap.widgets.TbButton', array(
    				'label'=>'Volver',
    				'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    				'size'=>'large', // null, 'large', 'small' or 'mini'
    				'icon'=>'arrow-left white',
    				'url'=>array('venta/index'),
    				'toggle'=>false,
				)); ?></center>
	</div>
</div>
<div class="clearfix">&nbsp;</div>
<div class="row-fluid">
<table class="table table-hover">
<tr><th>Mes</th><th>Nuevos Registros</th><th>Nuevos Depositantes</th><?php if( strcmp($rol->nombre,'comercial') == 0 ): ?><th>Valor Depósitos</th> <?php else: ?><th>Nuevos Dep. Deportes</th><?php endif; ?><th>Comisiones Debidas</th><?php if( $esadmin || strcmp($rol->nombre,'establecimiento') == 0) : ?><th></th><?php endif; ?></tr>
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
