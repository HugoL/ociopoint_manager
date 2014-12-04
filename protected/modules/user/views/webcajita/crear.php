<?php
/* @var $this WebcajitaController */
/* @var $model Webcajita */

$this->breadcrumbs=array(
	'Webcajitas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Webcajita', 'url'=>array('index')),
	array('label'=>'Manage Webcajita', 'url'=>array('admin')),
);
?>

<h1><?php echo $web->tipo == 0 ? "Página Personalizada" : "Página iPad"; ?></h1>

<div class="span12 well well-small"><?php echo $web->titulo; ?></div>
<div class="span12">
	Dirección: <span class="label label-info"><?php echo $web->url; ?></span> Referencia: 
	<span class="label label-warning"><?php echo $web->usuario->profile->referencia;  ?></span>
	<div class="clearfix">&nbsp;</div>

</div>
<?php 
if( $web->tipo == 0) //es Web Personalizada
	$this->renderPartial('_formcajitasWebPer', array('web'=>$web, 'cajitas'=>$cajitas)); 
else
	$this->renderPartial('_formcajitasWebPer', array('web'=>$web, 'cajitas'=>$cajitas)); 
?>
