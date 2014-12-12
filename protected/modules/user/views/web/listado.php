<h1>Webs</h1>
<table class="table table-striped">
	<thead><tr><th>Establecimiento</th><th></th></tr></thead>
	<tbody>
<?php foreach($establecimientos as $key => $establecimiento): ?>
	<tr>
		<td><b><?php echo CHtml::encode( $establecimiento->referencia. " ".$establecimiento->firstname." ".$establecimiento->lastname ); ?></b></td>
		<td><?php echo CHtml::link('Ver Webs',array('web/webs/id/'.$establecimiento->user_id),array('class'=>'btn btn-primary')); ?></td>
	</tr>
</tbody>
<?php endforeach; ?>
</table>