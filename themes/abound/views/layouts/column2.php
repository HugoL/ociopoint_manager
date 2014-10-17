<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
  <div class="row-fluid">
	<div class="span3">
		<div class="sidebar-nav">
      	<?php //if(!Yii::app()->user->isGuest) $this->widget('UserMenu'); ?>
		  <?php 
		    $superadmin = Rol::model()->find('nombre=:nombre',array('nombre' => 'superadmin'));
		    $admin = Rol::model()->find('nombre=:nombre',array('nombre' => 'administrador'));
		  	$rol = Yii::app()->getModule('user')->user()->profile->rol;
		  	if( $rol == $superadmin->id || $rol == $admin->id ):
			  $this->widget('zii.widgets.CMenu', array(
				'encodeLabel'=>false,
				'items'=>array(
					// Include the operations menu
					array('label'=>'OPERACIONES','items'=>$this->menu),
				),
				));
			 endif;
			?>
		</div>
		
    </div><!--/span-->
    <div class="span9">
    
    <?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
            'links'=>$this->breadcrumbs,
			'homeLink'=>CHtml::link('Dashboard'),
			'htmlOptions'=>array('class'=>'breadcrumb')
        )); ?><!-- breadcrumbs -->
    <?php endif?>
    
    <!-- Include content pages -->
    <?php echo $content; ?>

	</div><!--/span-->
  </div><!--/row-->

<?php $this->endContent(); ?>