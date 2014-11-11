<div class="row-fluid">
<h1>Documentos subidos</h1>

<?php if(Yii::app()->user->hasFlash('success')):?>
    <div class="alert alert-error">
        <?php echo Yii::app()->user->getFlash('error'); ?>
    </div>
<?php endif; ?>

<?php if( !empty($documentos) ): ?>
<table class="table table-striped">
	<tr>
		<th>Subido por</th>
		<th>Documento</th>
		<th></th>
	</tr>
	<?php foreach ( $documentos as $documento ): ?>
		<tr>
			<td><?php echo $documento->firstname." ".$documento->lastname." - ".$documento->referencia; ?></td>
			<td><a href="<?php echo Yii::app()->baseUrl.'uploads/pdf/'.$documento->pdf; ?>"><?php echo $documento->pdf; ?></a></td>
			<td></td>
		</tr>
	<?php endforeach; ?>
</table>
<?php else: ?>
	<div class="alert alert-info">Todavía no tienes usuarios a tu cargo</div>
<?php endif;?>
</div>