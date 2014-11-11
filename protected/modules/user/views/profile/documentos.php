<div class="row-fluid">
<h1>Documentos subidos</h1>

<?php if(Yii::app()->user->hasFlash('error')):?>
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
			<td><?php echo CHtml::link($documento->pdf,Yii::app()->createUrl('/uploads/pdf/'.$documento->pdf), array('target' => '_blank') ); ?></td>
			<td></td>
		</tr>
	<?php endforeach; ?>
</table>
<?php endif;?>
</div>