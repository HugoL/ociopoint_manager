<div class="row-fluid span12">
	<div class="span12"><center><?php $this->widget('bootstrap.widgets.TbButton', array(
    				'label'=>'Volver',
    				'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    				'size'=>'large', // null, 'large', 'small' or 'mini'
    				'icon'=>'arrow-left white',
    				'url'=>array('user/listarHijos'),
    				'toggle'=>false,
				)); ?></center></div>
<?php if( !empty($user) ): ?>
<h1>Usuario <?php echo $user->profile->firstname; ?></h1>
<div class="row-fluid">
	<div class="well well-small span6">Nombre: <strong><?php echo $user->profile->firstname." ".$user->profile->lastname; ?></strong></div>
	<div class="well well-small span6">Dirección: <strong><?php echo $user->profile->direccion." ".$user->profile->codigo_postal." ".$user->profile->poblacion." ".$user->profile->provincia; ?></strong></div>
</div>
<div class="row-fluid"><div class="well well-small span6">Teléfono: <strong><?php echo $user->profile->telefono." ".$user->profile->movil; ?></strong></div>
	<div class="well well-small span6">Rol: <strong><?php echo $rol->nombre; ?></strong></div>
</div>
<div class="row-fluid">
	<div class="well well-small span6">Email: <strong><?php echo $user->email; ?></strong></div>
	<div class="well well-small span6">Referencia: <strong><?php echo $user->profile->referencia; ?></strong></div>
</div>
<div class="row-fluid">
	<div class="well well-small span6">Cuenta Bancaria: <strong><?php echo $user->profile->cuentabancaria; ?></strong></div>
	<div class="well well-small span6">Comision: <strong><?php echo $user->profile->comision; ?>%</strong></div>
</div>
<?php else: ?>
	<div class="alert alert-warning">No se ha definido ningún user</div>
<?php endif;?>
</div>