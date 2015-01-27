<?php
/* @var $this WebController */

$this->breadcrumbs=array(
	'Web',
);
?>
<?php if(isset($model)): ?>
	<?php if( $model->tipo == 0 ): ?> <div class="cesped"> <?php endif; ?>
	<div class="container-fluid">
		 <!-- <div class="barrasup navbar navbar-default">
		 	<div class="navbar-default">
		 		<div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
		 		<div class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
		 			<center><h2><?php //echo $model->titulo; ?></h2></center>
		 		</div>
		 		<div class="col-md-1 col-xs-1 col-sm-1 col-lg-1"> <h2><a href="#" class="sharetodos"><img src="<?php //echo Yii::app()->baseUrl.'/images/web_per/'; ?>/share.png"/></a></h2></div>	
		 	</div>
		 	</div>
		 </div> -->
		 <?php  $this->widget('UserMenu',array('titulo'=>$model->titulo,'referencia'=>$profile->referencia,'url'=>$model->url)); ?>
		 <?php if(!empty($popup)): ?>
		 <!-- Button trigger modal -->
		 <!-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#ventana">
		 	PopUp
		 </button> -->

		 <!-- Modal -->
		 <div class="modal fade" id="ventana" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		 	<div class="modal-dialog">
		 		<div class="modal-content">
		 			<div class="modal-header">
		 				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		 				<h4 class="modal-title" id="myModalLabel"><?php echo CHtml::encode($popup->titulo); ?></h4>
		 			</div>
		 			<div class="modal-body">
		 				<?php echo $popup->texto; ?>
		 			</div>
		 			<div class="modal-footer">
		 				
		 			</div>
		 		</div>
		 	</div>
		 </div>
		<?php endif; ?>

		<!-- Modal -->
		 <div class="modal fade" id="modalemail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		 	<div class="modal-dialog">
		 		<div class="modal-content">
		 			<div class="modal-header">
		 				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		 				<h4 class="modal-title" id="myModalLabel"><?php echo CHtml::encode($model->titulo); ?></h4>
		 			</div>
		 			<div class="modal-body">
		 				<form id="form_info" method="post">
         					<label for="email">Email:</label></br>
         					<input type="hidden" name="url" id="url" value="<?php echo $model->url; ?>" />
         					<input type="hidden" name="lugar" id="lugar" value="<?php echo $model->titulo ?>"/>
         					<input type="hidden" name="titulo" id="titulo" value="<?php echo $model->titulo ?>"/>
         					<input id="email" type="email" name="email" placeholder="correo@email.com" class="form-control input-md" required="true" autocomplete="false"/>
         					</br><?php 
         					echo CHtml::ajaxLink(
						    $text = 'Enviar', 
						    $url = '/', 
						    $ajaxOptions=array(
						        'type'=>'POST',
						        'dataType'=>'json',
						        'data'=>'&email=jQuery("#email")&titulo=jQuery("#titulo")&url=JQuery("#url")',
						        'success'=>'function(html){ 
						        			$("#correcto").html(html);	        			
						        		}',
						        'error'=>'function(html){ jQuery("#correcto").html(html); }'
						        ), 

						    $htmlOptions=array('class' => 'btn btn-primary btn-lg')
						    ); 
    						?>
         					<button id="submit" class="btn btn-primary btn-lg" type="submit" name="submit" value="Enviar" />Enviar</button>
        				</form>
		 			</div>
		 			<div class="modal-footer">
		 				
		 			</div>
		 		</div>
		 	</div>
		 </div>

	</div>
		<div id="correcto"></div>
		<?php $i = 1; ?>
		<?php foreach ($cajitas as $key => $cajita): ?>
			<?php if( $i == 1 ): ?>
				<!-- <div class="row-fluid"> -->
			<?php endif; ?>
			<div class="col-md-4 col-lg-3 col-sm-6 col-xs-12" >
				<div class="cajita">
					<center><a href="<?php echo $cajita->url; ?>"><img class="imagencajita img-responsive" src="<?php echo $cajita->imagen; ?>"></a>
					<span class="titulo"><?php echo $cajita->titulo; ?></span>&nbsp;<span class="social"><a href="http://www.facebook.com/sharer.php?u=<?php echo CHtml::encode($model->url); ?>&t=<?php echo CHtml::encode($model->titulo); ?>" class="facebook" target="_blank"><img src="<?php echo Yii::app()->baseUrl.'/images/web_per/f.jpg'; ?>"></a></span><span class="social"><a href="http://twitter.com/?status=<?php echo CHtml::encode($model->titulo); ?>%20<?php echo CHtml::encode($model->url); ?>" class="twitter" target="_blank"><img src="<?php echo Yii::app()->baseUrl.'/images/web_per/twitter.jpg'; ?>"></a></span><span class="social"><a href="http://www.plus.google.com/share?url=<?php echo CHtml::encode($model->url); ?>" class="google" target="_blank"><img src="<?php echo Yii::app()->baseUrl.'/images/web_per/google+.png'; ?>"></a></span><span class="social"><a href="#" class="sobre" target="_blank"><img src="<?php echo Yii::app()->baseUrl.'/images/web_per/sobrecillo.png'; ?>"></a></span></center>					
				</div><!-- /cajita -->		
			</div>		
			<?php if( $i == 3 ): ?>
				<?php $i = 0; ?>
				<!-- </div> -->
			<?php endif; ?>
			<?php $i++; ?>
		<?php endforeach; ?>
	<?php if( $model->tipo == 0 ): ?> <div class="clearfix">&nbsp;</div> </div> <?php endif; ?>
<?php endif; ?>
</div><!-- container -->