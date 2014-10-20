<div class="row-fluid">
<h1>Usuarios a tu cargo</h1>

<?php if( !empty($hijos) ): ?>
<table class="table table-striped">
	<tr>
		<th>Nombre</th>
		<th>Apellidos</th>
		<th>Teléfono</th>
		<th>Tipo</th>
	</tr>
	<?php foreach ( $hijos as $hijo ): 
		foreach ($roles as $key => $rol) {
			if( $rol->id == $hijo->rol )
				$rolModel = $rol;
		}
		$this->renderPartial( '_detalle',array('hijo'=>$hijo, 'rol'=>$rolModel) );
	endforeach; ?>
</table>
<?php else: ?>
	<div class="alert alert-info">Todavía no tienes usuarios a tu cargo</div>
<?php endif;?>
</div>