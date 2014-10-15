<div class="row-fluid">
<?php if( $model->profile->rol != 2 ): ?>
	<div class="aler alert-danger">No puedes acceder aquí</div>
<?php else: ?>
	
		<h3>Interfaz de <?php echo $rol->nombre; ?></h3>

		 <div class="form-group product-chooser">
    
    	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
    		<div class="product-chooser-item">
    			<div class="well">
    			<img src="<?php echo Yii::app()->baseUrl ?>/images/usuario.png" class="img-rounded col-xs-4 col-sm-4 col-md-12 col-lg-12" alt="Añadir Usuario">
                <div class="col-xs-8 col-sm-8 col-md-12 col-lg-12">
    				<span class="title">Añadir usuario</span>
    				<span class="description">Añadir un nuevo usuario</span>
    				<input type="radio" name="product" value="mobile_desktop" checked="checked">
    			</div>
    		</div>
    			<div class="clear"></div>
    		</div>
    	</div>

    		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
    		<div class="product-chooser-item">
    			<div class="well">
    			<img src="<?php echo Yii::app()->baseUrl ?>/images/informe.png" class="img-rounded col-xs-4 col-sm-4 col-md-12 col-lg-12" alt="Informes">
                <div class="col-xs-8 col-sm-8 col-md-12 col-lg-12">
    				<span class="title">Informes</span>
    				<span class="description">Generar informes</span>
    				<input type="radio" name="product" value="mobile_desktop" checked="checked">
    			</div>
    		</div>
    			<div class="clear"></div>
    		</div>
    	</div>
    	
    </div>
<?php endif; ?>
</div>