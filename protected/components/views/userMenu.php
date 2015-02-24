<!-- pestañas -->
 <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only"><?php echo CHtml::encode($titulo); ?></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                <?php echo CHtml::link($titulo, array('web/index/id/'.$referencia),array('class'=>'navbar-brand'));?>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
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
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>