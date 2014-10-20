<?php
/* @var $this VentaController */
/* @var $model Venta */

$this->breadcrumbs=array(
	'Ventas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Venta', 'url'=>array('index')),
	array('label'=>'Create Venta', 'url'=>array('create')),
	array('label'=>'Update Venta', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Venta', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Venta', 'url'=>array('admin')),
);
?>

<h1>View Venta #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'fecha',
		'clics',
		'nuevos_registros',
		'nuevos_depositantes',
		'nuevos_depositantes_deportes',
		'nuevos_depositantes_casino',
		'nuevos_depositantes_poquer',
		'nuevos_depositantes_juegos',
		'nuevos_depositantes_bingo',
		'valor_depositos',
		'numero_depositos',
		'facturacion_deportes',
		'numero_apuestas_deportivas',
		'usuarios_activos_deportes',
		'sesiones_casino',
		'nuevos_jugadores_deportes',
		'nuevos_jugadores_casino',
		'nuevos_clientes_poquer',
		'nuevos_clientes_juego',
		'nuevos_jugadores_bingo',
		'beneficios_netos_deportes',
		'beneficios_netos_casino',
		'beneficios_netos_poquer',
		'beneficios_netos_juegos',
		'ingresos_totales_netos',
		'ganancias_afiliado_deportes',
		'ganancias_afiliado_casino',
		'ganancias_afiliado_poquer',
		'ganancias_afiliado_juego',
		'comisiones_debidas',
		'fecha_creacion',
		'observaciones',
		'id_usuario',
	),
)); ?>
