<?php
/* @var $this PopupController */
/* @var $model Popup */

$this->breadcrumbs=array(
	'Popups'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Popup', 'url'=>array('index')),
	array('label'=>'Create Popup', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#popup-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Popups</h1>

<?php echo CHtml::link('Búsqueda avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'popup-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'titulo',
		'texto',
		'fecha_inicio',
		'fecha_fin',
		'fecha',
		/*
		'activado',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
