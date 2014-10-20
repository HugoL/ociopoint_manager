<div class="row-fluid">
<?php if( $model->profile->rol != $rol->id ): ?>
	<div class="alert alert-danger">No puedes acceder aquí</div>
<?php else: ?>
	
		<h3>Interfaz de <?php echo $rol->nombre; ?></h3>

		 <div class="form-group product-chooser">
    
    	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
    		<div class="product-chooser-item">
    			<div class="well">
    			<a href="<?php echo Yii::app()->baseUrl.'/user/admin/create'; ?>"><img src="<?php echo Yii::app()->baseUrl ?>/images/usuario.png" class="img-rounded" alt="Añadir Usuario"></a>
                <div class="col-xs-8 col-sm-8 col-md-12 col-lg-12">
    				<span class="title">Añadir usuario</span>
    				<span class="description">Añadir un nuevo usuario</span>
    			</div>
    		</div>
    			<div class="clear"></div>
    		</div>
    	</div>

         <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="product-chooser-item">
                <div class="well">
                <a href="<?php echo Yii::app()->baseUrl.'/user/user/listarHijos'; ?>"><img src="<?php echo Yii::app()->baseUrl ?>/images/usuarios2.png" class="img-rounded col-xs-4 col-sm-4 col-md-12 col-lg-12" alt="Añadir Usuario"></a>
                <div class="col-xs-8 col-sm-8 col-md-12 col-lg-12">
                    <span class="title">Ver mis usuarios</span>
                    <span class="description">Listado de usuarios a mi cargo</span>
                    <input type="radio" name="product" value="mobile_desktop" checked="checked">
                </div>
            </div>
                <div class="clear"></div>
            </div>
        </div>

    		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
    		<div class="product-chooser-item">
    			<div class="well">
    			<img src="<?php echo Yii::app()->baseUrl ?>/images/informe.png" class="img-rounded" alt="Informes">
                <div class="col-xs-8 col-sm-8 col-md-12 col-lg-12">
    				<span class="title">Informes</span>
    				<span class="description">Generar informes</span>
    			</div>
    		</div>
    			<div class="clear"></div>
    		</div>
    	</div>

        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="product-chooser-item">
                <div class="well">
                <img src="<?php echo Yii::app()->baseUrl ?>/images/billete.png" class="img-rounded" alt="Ventas">
                <div class="col-xs-8 col-sm-8 col-md-12 col-lg-12">
                    <span class="title">Ventas</span>
                    <span class="description">Introducir datos de ventas</span>
                </div>
            </div>
                <div class="clear"></div>
            </div>
        </div>
    	
    </div>
<?php endif; ?>
</div>