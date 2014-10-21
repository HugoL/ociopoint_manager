<?php
/* @var $this VentaController */
/*  class="span10"@var $data Venta */
?>

	<tr><td class="span2"><b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario')); ?>:</b></td>
	<td><?php echo CHtml::encode($data->usuario->profile->referencia." - ".$data->usuario->profile->firstname); ?></td>
	</tr>

	<tr><td class="span2"><b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b></td>
	<td class="span10"><?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?></td>
	</tr>

	<tr><td class="span2"><b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b></td>
	<td class="span10"><?php echo CHtml::encode(date('d-m-Y', strtotime($data->fecha))); ?></td>
	</tr>

	<tr><td class="span2"><b><?php echo CHtml::encode($data->getAttributeLabel('clics')); ?>:</b></td>
	<td class="span10"><?php echo CHtml::encode($data->clics); ?></td>
	</tr>

	<tr><td class="span2"><b><?php echo CHtml::encode($data->getAttributeLabel('nuevos_registros')); ?>:</b></td>
	<td class="span10"><?php echo CHtml::encode($data->nuevos_registros); ?></td>
	</tr>

	<tr><td class="span2"><b><?php echo CHtml::encode($data->getAttributeLabel('nuevos_depositantes')); ?>:</b></td>
	<td class="span10"><?php echo CHtml::encode($data->nuevos_depositantes); ?></td>
	</tr>

	<tr><td class="span2"><b><?php echo CHtml::encode($data->getAttributeLabel('nuevos_depositantes_deportes')); ?>:</b></td>
	<td class="span10"><?php echo CHtml::encode($data->nuevos_depositantes_deportes); ?></td>
	</tr>

	<tr><td class="span2"><b><?php echo CHtml::encode($data->getAttributeLabel('nuevos_depositantes_casino')); ?>:</b></td>
	<td class="span10"><?php echo CHtml::encode($data->nuevos_depositantes_casino); ?></td>
	</tr>

	<tr><td class="span2"><b><?php echo CHtml::encode($data->getAttributeLabel('nuevos_depositantes_poquer')); ?>:</b></td>
	<td class="span10"><?php echo CHtml::encode($data->nuevos_depositantes_poquer); ?></td>
	</tr>

	<tr><td class="span2"><b><?php echo CHtml::encode($data->getAttributeLabel('nuevos_depositantes_juegos')); ?>:</b></td>
	<td class="span10"><?php echo CHtml::encode($data->nuevos_depositantes_juegos); ?></td>
	</tr>

	<tr><td class="span2"><b><?php echo CHtml::encode($data->getAttributeLabel('nuevos_depositantes_bingo')); ?>:</b></td>
	<td class="span10"><?php echo CHtml::encode($data->nuevos_depositantes_bingo); ?></td>
	</tr>

	<tr><td class="span2"><b><?php echo CHtml::encode($data->getAttributeLabel('valor_depositos')); ?>:</b></td>
	<td class="span10"><?php echo CHtml::encode($data->valor_depositos); ?></td>
	</tr>

	<tr><td class="span2"><b><?php echo CHtml::encode($data->getAttributeLabel('numero_depositos')); ?>:</b></td>
	<td class="span10"><?php echo CHtml::encode($data->numero_depositos); ?></td>
	</tr>

	<tr><td class="span2"><b><?php echo CHtml::encode($data->getAttributeLabel('facturacion_deportes')); ?>:</b></td>
	<td class="span10"><?php echo CHtml::encode($data->facturacion_deportes); ?></td>
	</tr>

	<tr><td class="span2"><b><?php echo CHtml::encode($data->getAttributeLabel('numero_apuestas_deportivas')); ?>:</b></td>
	<td class="span10"><?php echo CHtml::encode($data->numero_apuestas_deportivas); ?></td>
	</tr>

	<tr><td class="span2"><b><?php echo CHtml::encode($data->getAttributeLabel('usuarios_activos_deportes')); ?>:</b></td>
	<td class="span10"><?php echo CHtml::encode($data->usuarios_activos_deportes); ?></td>
	</tr>

	<tr><td class="span2"><b><?php echo CHtml::encode($data->getAttributeLabel('sesiones_casino')); ?>:</b></td>
	<td class="span10"><?php echo CHtml::encode($data->sesiones_casino); ?></td>
	</tr>

	<tr><td class="span2"><b><?php echo CHtml::encode($data->getAttributeLabel('nuevos_jugadores_deportes')); ?>:</b></td>
	<td class="span10"><?php echo CHtml::encode($data->nuevos_jugadores_deportes); ?></td>
	</tr>

	<tr><td class="span2"><b><?php echo CHtml::encode($data->getAttributeLabel('nuevos_jugadores_casino')); ?>:</b></td>
	<td class="span10"><?php echo CHtml::encode($data->nuevos_jugadores_casino); ?></td>
	</tr>

	<tr><td class="span2"><b><?php echo CHtml::encode($data->getAttributeLabel('nuevos_clientes_poquer')); ?>:</b></td>
	<td class="span10"><?php echo CHtml::encode($data->nuevos_clientes_poquer); ?></td>
	</tr>

	<tr><td class="span2"><b><?php echo CHtml::encode($data->getAttributeLabel('nuevos_clientes_juego')); ?>:</b></td>
	<td class="span10"><?php echo CHtml::encode($data->nuevos_clientes_juego); ?></td>
	</tr>

	<tr><td class="span2"><b><?php echo CHtml::encode($data->getAttributeLabel('nuevos_jugadores_bingo')); ?>:</b></td>
	<td class="span10"><?php echo CHtml::encode($data->nuevos_jugadores_bingo); ?></td>
	</tr>

	<tr><td class="span2"><b><?php echo CHtml::encode($data->getAttributeLabel('beneficios_netos_deportes')); ?>:</b></td>
	<td class="span10"><?php echo CHtml::encode($data->beneficios_netos_deportes); ?></td>
	</tr>

	<tr><td class="span2"><b><?php echo CHtml::encode($data->getAttributeLabel('beneficios_netos_casino')); ?>:</b></td>
	<td class="span10"><?php echo CHtml::encode($data->beneficios_netos_casino); ?></td>
	</tr>

	<tr><td class="span2"><b><?php echo CHtml::encode($data->getAttributeLabel('beneficios_netos_poquer')); ?>:</b></td>
	<td class="span10"><?php echo CHtml::encode($data->beneficios_netos_poquer); ?></td>
	</tr>

	<tr><td class="span2"><b><?php echo CHtml::encode($data->getAttributeLabel('beneficios_netos_juegos')); ?>:</b></td>
	<td class="span10"><?php echo CHtml::encode($data->beneficios_netos_juegos); ?></td>
	</tr>

	<tr><td class="span2"><b><?php echo CHtml::encode($data->getAttributeLabel('ingresos_totales_netos')); ?>:</b></td>
	<td class="span10"><?php echo CHtml::encode($data->ingresos_totales_netos); ?></td>
	</tr>

	<tr><td class="span2"><b><?php echo CHtml::encode($data->getAttributeLabel('ganancias_afiliado_deportes')); ?>:</b></td>
	<td class="span10"><?php echo CHtml::encode($data->ganancias_afiliado_deportes); ?></td>
	</tr>

	<tr><td class="span2"><b><?php echo CHtml::encode($data->getAttributeLabel('ganancias_afiliado_casino')); ?>:</b></td>
	<td class="span10"><?php echo CHtml::encode($data->ganancias_afiliado_casino); ?></td>
	</tr>

	<tr><td class="span2"><b><?php echo CHtml::encode($data->getAttributeLabel('ganancias_afiliado_poquer')); ?>:</b></td>
	<td class="span10"><?php echo CHtml::encode($data->ganancias_afiliado_poquer); ?></td>
	</tr>

	<tr><td class="span2"><b><?php echo CHtml::encode($data->getAttributeLabel('ganancias_afiliado_juego')); ?>:</b></td>
	<td class="span10"><?php echo CHtml::encode($data->ganancias_afiliado_juego); ?></td>
	</tr>

	<tr><td class="span2"><b><?php echo CHtml::encode($data->getAttributeLabel('comisiones_debidas')); ?>:</b></td>
	<td class="span10"><?php echo CHtml::encode($data->comisiones_debidas); ?></td>
	</tr>

	<tr><td class="span2"><b>Total:</b></td>
	<td class="span10"><?php echo CHtml::encode($data->comisiones_debidas+$data->ingresos_totales_netos); ?></td>
	</tr>

	<tr><td class="span2"><b><?php echo CHtml::encode($data->getAttributeLabel('fecha_creacion')); ?>:</b></td>
	<td class="span10"><?php echo CHtml::encode($data->fecha_creacion); ?></td>
	</tr>

	<tr><td class="span2"><b><?php echo CHtml::encode($data->getAttributeLabel('observaciones')); ?>:</b></td>
	<td class="span10"><?php echo CHtml::encode($data->observaciones); ?></td>
	</tr>

</div>