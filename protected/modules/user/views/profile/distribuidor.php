<div class="row-fluid">
<?php if( $model->profile->rol != 3 ): ?>
	<div class="aler alert-danger">No puedes acceder aquí</div>
<?php else: ?>
	<div class="col-md-12">
		<h3>Interfaz de <?php echo $rol->nombre; ?></h3>
	</div>
<?php endif; ?>
</div>