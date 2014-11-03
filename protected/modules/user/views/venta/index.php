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

    //Miro qué rol de usuario es el padre del establecimiento de la venta    
?>
<h1>Vista general de ventas</h1>
<?php if( Yii::app()->getModule('user')->esAlgunAdmin() ): ?>
<div class="row-fluid">
<div class="span6" align="right"><?php $this->widget('bootstrap.widgets.TbButton', array(
    						'label'=>'Importar CSV',
    						'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    						'size'=>'large', // null, 'large', 'small' or 'mini'
    						'icon'=>'file white',
    						'url'=>array('venta/importarCsv'),
    						'toggle'=>false,
							)); ?>
</div>
<div class="span6" align="left"><?php $this->widget('bootstrap.widgets.TbButton', array(
                            'label'=>'Insertar manualmente',
                            'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                            'size'=>'large', // null, 'large', 'small' or 'mini'
                            'icon'=>'pencil white',
                            'url'=>array('venta/create'),
                            'toggle'=>false,
                            )); ?>
</div>
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
    <?php if($categoria == 1): ?>
        <tr><th>Refencia</th><th>Nuevos Registros</th><th>Nuevos Depositantes</th><th>Valor Depósitos</th><th>Número Depósitos</th><th>Facturación Deportes</th><th>Comisiones Debidas</th><th></th></tr>
        <?php $this->widget('zii.widgets.CListView', array(
       'dataProvider'=>$dataProvider,
       'viewData' => array( 'rol' => $rol, 'esadmin' => $esadmin ),
       'itemView'=>'_resumen',
       )); ?>
    <?php else: ?>
         <tr><th>Refencia</th><th>Nuevos Registros</th><th>Comision por Registro</th><th>Comisiones Debidas</th><th></th></tr>
         <?php $this->widget('zii.widgets.CListView', array(
       'dataProvider'=>$dataProvider,
       'viewData' => array( 'rol' => $rol, 'esadmin' => $esadmin ),
       'itemView'=>'_resumenpoquer',
       )); ?>
    <?php endif; ?>
    
    </table>
   <?php if( strcmp($rol->nombre,'establemiento') == 0 ): ?>  
        </ul>
    <?php endif; ?>
</div>
</div>