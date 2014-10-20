<?php
/* @var $this VentaController */
/* @var $model Venta */

$this->breadcrumbs=array(
	'Ventas'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Venta', 'url'=>array('index')),
	array('label'=>'Create Venta', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#venta-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Ventas</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'venta-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'fecha',
		'clics',
		'nuevos_registros',
		'nuevos_depositantes',
		'nuevos_depositantes_deportes',
		/*
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
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
