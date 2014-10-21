<?php if( isset($model) ): ?>    
	<div class="row-fluid"><center>
		<?php $this->widget('bootstrap.widgets.TbButton', array(
    						'label'=>'Volver',
    						'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    						'size'=>'large', // null, 'large', 'small' or 'mini'
    						'icon'=>'arrow-left white',
    						'url'=>array('venta/index'),
    						'toggle'=>false,
							)); ?>
		</center><br/></div>
	<div class="row-fluid">
	<table class="table table-condensed">
		<?php $this->renderPartial('_view',array('data'=>$model)); ?>
	</table>
	</div>
	<div class="row-fluid"><center>
		<?php $this->widget('bootstrap.widgets.TbButton', array(
    						'label'=>'Volver',
    						'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    						'size'=>'large', // null, 'large', 'small' or 'mini'
    						'icon'=>'arrow-left white',
    						'url'=>array('venta/index'),
    						'toggle'=>false,
							)); ?>
		</center><br/></div>
<?php else: ?>
	<div class="alert alert-error">El elemento no existe o no tiene permisos para verlo</div>
<?php endif; ?>