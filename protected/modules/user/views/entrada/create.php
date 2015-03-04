<?php
/* @var $this EntradaController */
/* @var $model Entrada */

$this->breadcrumbs=array(
	'Entradas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Entrada', 'url'=>array('index')),
	array('label'=>'Manage Entrada', 'url'=>array('admin')),
);
?>

<div class="">
<?php echo CHtml::link('Ver entradas',array('entrada/index'),array('class'=>'btn btn-primary')); ?>
</div>

<br/>

<h1>Nueva Entrada</h1>

<div class="well">
<center><?php echo $this->renderPartial('_form', array('model'=>$model)); ?></center>
</div>