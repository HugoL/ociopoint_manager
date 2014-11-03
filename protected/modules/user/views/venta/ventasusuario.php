<div class="row-fluid">
<?php
$this->breadcrumbs=array(
	'Ventas',
);
?>
<?php 
    $rol = Rol::model()->findByPK(Yii::app()->getModule('user')->user()->profile->rol); 
    $esadmin = Yii::app()->getModule('user')->esAlgunAdmin();

    //Miro qué rol de usuario es el padre del establecimiento de la venta
    $padre = Profile::model()->findByPk( $profile->id_padre );
    $rol_padre = Rol::model()->findByPK($padre->rol); 
    $comision_comercial = 0;
    $comision_distribuidor = 0;

    $propietario = Profile::model()->findByPk( $profile->user_id );
    if( $propietario->comision != null )
        $comision_establecimiento = $propietario->comision;
    else
        $comision_establecimiento = Yii::app()->params['porcentaje_establecimiento'];

    switch ($rol_padre->nombre) {
        case 'comercial':
            $abuelo = Profile::model()->findByPk( $padre->user_id );
            if( $padre->comision != null )
                $comision_comercial = $padre->comision;
            else
                $comision_comercial = Yii::app()->params['porcentaje_comercial'];

            if( $abuelo->comision != null )
                $comision_distribuidor = $abuelo->comision;
            else
                $comision_distribuidor = Yii::app()->params['porcentaje_distribuidor'];
            break;
        case 'distribuidor':
            $comision_comercial = 0;
            if( $padre->comision != null )
                $comision_distribuidor = $padre->comision;
            else
                $comision_distribuidor = Yii::app()->params['porcentaje_distribuidor'];
            break;
        default:
    }    
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
<?php if($categoria == 1 ): ?>
    <tr><th>Mes</th><th>Nuevos Registros</th><th>Nuevos Depositantes</th><th>Valor Depósitos</th><th>Número Depósitos</th><th>Facturación Deportes</th><th>Comisiones Debidas</th><th></th></tr>
    <?php 
    $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'viewData' => array( 'rol' => $rol, 'esadmin' => $esadmin, 'comision_distribuidor'=>$comision_distribuidor, 'comision_comercial' => $comision_comercial, 'comision_establecimiento'=>$comision_establecimiento),
    'itemView'=>'_usuarios',    
    )); ?>
<?php else: ?>
    <tr><th>Mes</th><th>Nuevos Registros</th><th>Comisiones Debidas</th></tr>
    <?php 
    $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'viewData' => array( 'rol' => $rol, 'esadmin' => $esadmin),
    'itemView'=>'_usuariospoquer',    
    )); ?>
<?php endif; ?>
</table>
</div>
</div>
