<!-- pestañas -->
		 <div class="visible-xs">
		 	<button class="btn btn-primary" id="btnmenu"> 
		 	<span class="glyphicon glyphicon-menu-hamburger"></span></button>
			<div id="menudesplegable">
				 <div class="col-sm-11 col-xs-11 menupeque">
				 	<div <?php echo Yii::app()->controller->action->id == 'index' ? "class='col-sm-12 col-xs-12 minimenu active'" : "class='col-sm-12 col-xs-12 minimenu'" ?> >
				 		<?php echo CHtml::link('<span class="glyphicon glyphicon-home"></span> '.$titulo,array('web/index/id/'.$referencia)); ?>
				 	</div>
				 	<div <?php echo Yii::app()->controller->action->id == 'chat' ? "class='col-sm-12 col-xs-12 minimenu active'" : "class='col-sm-12 col-xs-12 minimenu'" ?>>
				 		 <?php echo CHtml::link('<span class="glyphicon glyphicon-comment"></span> Chat',array('web/chat/id/'.$referencia)); ?>
				 	</div>
				 	<div <?php echo Yii::app()->controller->action->id == 'apuestas' ? "class='col-sm-12 col-xs-12 minimenu active'" : "class='col-sm-12 col-xs-12 minimenu'" ?>>
				 		<?php echo CHtml::link('<span class="glyphicon glyphicon-eur"></span> Pelotazos',array('#')); ?>
				 	</div>
				 	<div class="col-sm-12 col-xs-12 minimenu">
				 		<a href="#" class="sharetodos"><img src="<?php echo Yii::app()->baseUrl.'/images/web_per/'; ?>/share.png" width="25px" height="25px" /></a>
				 	</div>
		    	</div>
	    	</div>

	    	<div class="col-xs-12">
    		<div class="compartirgral col-xs-12" style="display:none">
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