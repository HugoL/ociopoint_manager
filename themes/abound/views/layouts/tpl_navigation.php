<?php if(!Yii::app()->user->isGuest){
    $rol = Rol::model()->findByPK(Yii::app()->getModule('user')->user()->profile->rol);
} ?>
<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
    <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
     
          <!-- Be sure to leave the brand out there if you want it shown -->
          <a class="brand" href="<?php echo Yii::app()->baseUrl; ?>">Ociopoint <small>Manager</small></a>
    
          <div class="nav-collapse">
			<?php 
            if( !Yii::app()->user->isGuest ):
            $this->widget('zii.widgets.CMenu',array(
                    'htmlOptions'=>array('class'=>'pull-right nav'),
                    'submenuHtmlOptions'=>array('class'=>'dropdown-menu'),
					'itemCssClass'=>'item-test',
                    'encodeLabel'=>false,
                    'items'=>array(
                        //array('label'=>'Mi Perfil', 'url'=>array('/user/profile'), 'visible'=>!Yii::app()->user->isGuest),                        
                        array('label'=>'<img src="'.Yii::app()->request->baseUrl.'/images/casa_small_white.png" height="18px" width="18px" /> Principal', 'url'=>array('/user/profile/redireccionar/rol/'.$rol->nombre), 'visible'=>!Yii::app()->user->isGuest, 'icon'=>'icon_home'),   
                        array('label'=>'Login', 'url'=>array('/user/login'), 'visible'=>Yii::app()->user->isGuest),
                        array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/user/logout'), 'visible'=>!Yii::app()->user->isGuest),
                    ),
                ));             
            endif;
                ?>
    	</div>
    </div>
	</div>
</div>