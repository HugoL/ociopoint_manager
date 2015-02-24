<!-- pestañas -->
		 <div class="visible-xs">

<div class="nav-side-menu">
    <div class="brand"><?php echo CHtml::encode($titulo); ?></div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
  
        <div class="menu-list">
  
            <ul id="menu-content" class="menu-content collapse out">
                <li <?php if( strcmp(Yii::app()->controller->action->id, 'index') == 0 ) echo "class='active'"; ?> >
                  <?php echo CHtml::link('<i class="fa fa-home fa-lg"></i> Principal', array('web/index/id/'.$referencia));?>   
                  </a>
                </li>

                 <li <?php if( strcmp(Yii::app()->controller->action->id,'chat') == 0 ) echo "class='active'"; ?>>
                  <?php echo CHtml::link('<i class="fa fa-comments fa-lg"></i> Chat',array('web/chat/id/'.$referencia)); ?>
                  </li>

                 <li <?php if( 1 == 2 ) echo "class='active'"; ?>>
                  <?php echo CHtml::link('<i class="fa fa-soccer-ball-o fa-lg"></i> Pelotazos', array('web/index/id/'.$referencia));?>
                </li>

                 <li data-toggle="collapse" data-target="#shareall" class="collapsed">
                  <a href="#" class="sharetodos">
                  <i class="fa fa-share-alt fa-lg"></i> Compartir  <span class="arrow"></span></a>
                  </li>
                  <ul class="sub-menu collapse" id="shareall">
                    <li><a href="http://www.facebook.com/sharer.php?u=<?php echo $url; ?>&t=<?php echo CHtml::encode($titulo); ?>"><i class="fa fa-facebook fa-lg"></i> Facebook</a></li>
                    <li><a href="http://twitter.com/?status=<?php echo CHtml::encode($titulo); ?>%20<?php echo $url; ?>"><i class="fa fa-twitter fa-lg"></i> Twitter</a></li>
                    <li><a href="https://plus.google.com/share?url=<?php echo CHtml::encode($url); ?>" ><i class="fa fa-google-plus fa-lg"></i> Google+</a></li>
                    <li><a id="<?php echo CHtml::encode($url); ?>" class="btncontact" data-toggle="modal" data-target="#modalemail" href="#email"><i class="fa fa-envelope fa-lg"></i> Email</a></li>
                </ul>
            </ul>
     </div>
</div>
    </div><!-- /visible-xs -->

		<div class="visible-md visible-lg visible-sm">
		 <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 menu">
		 <div class="col-md-11 col-lg-11 col-sm-11 col-xs-11">
			 <ul class="nav nav-pills">
	            <li  role="presentation" class="active" <?php if( 1 == 2) echo "class='active'"; ?>><?php echo CHtml::link($titulo, array('web/index/id/'.$referencia),array('class' => 'navbar-brand'));?> </li>
	            <li  role="presentation" <?php if( 1 == 2) echo "class='active'"; ?>><?php echo CHtml::link('Chat',array('web/chat/id/'.$referencia)); ?></li>
	            <li  role="presentation" <?php if( 1 == 2) echo "class='active'"; ?>><a href="#">Pelotazos</a></li>
	        </ul>
	        </div>
	        <h4>
	         <div class="col-md-1 col-lg-1 col-sm-1 col-xs-1"><a href="#" class="sharetodos"><img src="<?php echo Yii::app()->baseUrl.'/images/web_per/'; ?>/share.png"/></a></div>
    	</div>

    	<div class="col-md-12">
    		<div class="col-md-7"></div>
    		<div class="compartirgral col-xs-12 col-md-5" style="display:none">
    			<div class="panel panel-default">
    				<div class="panel-body">
    					<div class="col-xs-3 ">
    						<a href="http://www.facebook.com/sharer.php?u=<?php echo $url; ?>&t=<?php echo CHtml::encode($titulo); ?>" class="gral"></a>
    					</div>
    					<div class="col-xs-3 ">
    						<a href="http://twitter.com/?status=<?php echo CHtml::encode($titulo); ?>%20<?php echo $url; ?>" class="gral"></a>
    					</div>
    					<div class="col-xs-3 ">
    						<a href="https://plus.google.com/share?url=<?php echo CHtml::encode($url); ?>" class="gral"></a>
    					</div>

    					<div class="col-xs-3 ">
    						<a id="<?php echo CHtml::encode($url); ?>" class="btncontact gral" data-toggle="modal" data-target="#modalemail" href="#email"></a>
    					</div>
    				</div>
    			</div><!-- panel -->
    		</div><!-- /contgral -->
    	</div>
   		</div> <!-- /collapse -->
		 <!-- /pestañas -->