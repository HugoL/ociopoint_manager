<div class="cesped">
<!-- chat -->
<div class="container-fluid">
     <!-- pestañas -->
         <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 menu">
         <div class="col-md-11 col-lg-11 col-sm-11 col-xs-11">
             <ul class="nav nav-pills">
                <li  role="presentation" <?php if( 1 == 2) echo "class='active'"; ?>><?php echo CHtml::link($web->titulo,array('web/index/id/'.$profile->referencia),array('class' => 'navbar-brand')); ?></li>
                <li  role="presentation" class="active" <?php if( 1 == 2) echo "class='active'"; ?>><a href="#">Chat</a></li>
                <li  role="presentation" <?php if( 1 == 2) echo "class='active'"; ?>><a href="#">Pronósticos deportivos</a></li>
            </ul>
            </div>
            <h4>
             <div class="col-md-1 col-lg-1 col-sm-1 col-xs-1"><a href="#" class="sharetodos"><img src="<?php echo Yii::app()->baseUrl.'/images/web_per/'; ?>/share.png"/></a></div>
        </div>
<!-- /pestañas -->
<div class="clearfix">&nbsp;</div>
<div class="panel panel-default">
    <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12"><h3>Ociopoint Chat</h3></div>
    <div class="col-md-9 col-lg-9 col-sm-9 col-xs-12 titulochat"><p>Chateando como <span class="label label-primary"><strong><?php echo isset(Yii::app()->session['nick']) ? Yii::app()->session['nick'] : "Anonimo"; ?></strong></span>&nbsp;&nbsp;<span class="btn btn-danger btn-xs" id="salir"><?php echo CHtml::link('Salir',array('web/salir/id/'.$profile->referencia)); ?></span></p></div>
    <div class="clearfix">&nbsp;</div>

</div><!-- /panel -->
<div id='chat'></div>
<?php 
    $this->widget('YiiChatWidget',array(
        'chat_id'=>'1',                   // a chat identificator
        'identity'=> $nick,                      // the user, Yii::app()->user->id ?
        'selector'=>'#chat',                // were it will be inserted
        'minPostLen'=>1,                    // min and
        'maxPostLen'=>50,                   // max string size for post
        'model'=>new ChatHandler(),    // the class handler. **** FOR DEMO, READ MORE LATER IN THIS DOC ****
        'data'=>'any data',                 // data passed to the handler
        // success and error handlers, both optionals.
        'onSuccess'=>new CJavaScriptExpression(
            "function(code, text, post_id){   }"),
        'onError'=>new CJavaScriptExpression(
            "function(errorcode, info){  }"),
    ));
?>
<!-- /chat -->
</div><!-- /container-fluid -->
</div><!-- /cesped -->
</div>