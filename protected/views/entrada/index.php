<?php
/* @var $this EntradaController */

$this->breadcrumbs=array(
	'Entrada',
);
?>
<h1>Blog Ociopoint</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
