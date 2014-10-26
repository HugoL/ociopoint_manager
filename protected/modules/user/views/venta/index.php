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
    						'label'=>'Importar ventas',
    						'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    						'size'=>'large', // null, 'large', 'small' or 'mini'
    						'icon'=>'file white',
    						'url'=>array('venta/importarCsv'),
    						'toggle'=>false,
							)); ?>
</center></div>
<?php endif; ?>
<div class="clearfix">&nbsp;</div>
<div class="row-fluid"> 
    <?php if( strcmp($rol->nombre,'establecimiento') == 0 ): ?>   
        <ul class="nav nav-tabs">
            <?php foreach ($categorias as $key => $cat): ?>
            <li <?php if( $cat->id == $categoria ) echo "class='active'"; ?>><a href="<?php echo "index/categoria/".$cat->id; ?>"><?php echo $cat->nombre; ?></a></li>
        <?php endforeach; ?>   
    <?php endif; ?>

    <table class="table table-hover">
    <tr><th>Refencia</th><th>Nuevos Registros</th><th>Nuevos Depositantes</th><?php if( strcmp($rol->nombre,'comercial') == 0 ): ?><th>Valor Depósitos</th> <?php else: ?><th>Nuevos Dep. Deportes</th><?php endif; ?><th>Comisiones Debidas</th><th></th></tr>
    <?php $this->widget('zii.widgets.CListView', array(
       'dataProvider'=>$dataProvider,
       'viewData' => array( 'rol' => $rol, 'esadmin' => $esadmin ),
       'itemView'=>'_resumen',
       )); ?>
    </table>
   <?php if( strcmp($rol->nombre,'establemiento') == 0 ): ?>  
        </ul>
    <?php endif; ?>
</div>
</div>