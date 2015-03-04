<table class="table table-hover">
	<thead></thead>
	<tbody>
<?php foreach ($usuarios as $key => $usuario): ?>
	<tr>
		<td><?php echo $usuario->firstname." ".$usuario->lastname; ?></td>
		<td><?php //echo $venta->comisiones_debidasCount ?></td>
	</tr>
<?php endforeach; ?>
</tbody>
</table>