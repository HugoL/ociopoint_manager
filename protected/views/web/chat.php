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
    <div class="panel-heading"><center><h3>Ociopoint Chat</h3></center></div>
<div class="panel-body"><center>
<script id="cid0020000082391319498" data-cfasync="false" async src="//st.chatango.com/js/gz/emb.js" style="width: 500px;height: 400px;">{"handle":"ociopoint","arch":"js","styles":{"a":"0084ef","b":100,"c":"FFFFFF","d":"FFFFFF","k":"0084ef","l":"0084ef","m":"0084ef","n":"FFFFFF","p":"10.8","q":"0084ef","r":100,"usricon":0,"cnrs":"0.35"}}</script>
</center></div>
<div class="clearfix">&nbsp;</div>
</div><!-- /container-fluid -->
</div><!-- /cesped -->