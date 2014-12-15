<?php
/* @var $this WebController */
/* @var $data Web */
?>
<?php if( $data->tipo == 0 ) $tipo = "index"; else $tipo = "ipad"; ?>

<div class="well">
	<div class="row-fluid">
	Dirección:
	<b><?php echo "http://www.ociopoint.com/web/".$tipo."/id/".$data->usuario->profile->referencia; ?></b>
	<br/>
	Dirección corta:
	<b><?php echo CHtml::encode($data->url); ?></b>
	<br />

	<?php echo CHtml::encode($data->getAttributeLabel('titulo')); ?>:
	<b><?php echo CHtml::encode($data->titulo); ?></b>
	<br />

	<?php echo CHtml::encode($data->getAttributeLabel('tipo')); ?>:
	<b><?php  echo $data->tipo == 0 ? "Web Personalizada" : "Web iPad"; ?></b>
	</div>
	<br/>
	<div class="row-fluid">
		<div class="span1">
		<?php echo CHtml::link('Editar', array('webcajita/editar/id_web/'.$data->id), array('class' => 'btn btn-primary')) ?>
		</div>
		<div class="span1">
			<?php echo CHtml::link(
	    'Eliminar',
	     array('web/delete/','id'=>$data->id),
	     array('confirm' => 'Se eliminarála página web del establecimiento. ¿Estás seguro?', 'class' => 'btn btn-danger')
		); ?>	
		</div>
	</div>
</div>