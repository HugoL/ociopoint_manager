<div class="row-fluid">
<?php if( $model->profile->rol != $rol->id ): ?>
    <div class="alert alert-danger">No puedes acceder aquí</div>
<?php else: ?>
    
        <h3>Interfaz de <?php echo $rol->nombre; ?></h3>

         <div class="form-group product-chooser">
        <div class="row-fluid">
            <div class="span4">
            <center><div class="product-chooser-item">
                <div class="well">
                <img src="<?php echo Yii::app()->baseUrl ?>/images/informe.png" class="img-rounded" alt="Informes">
                <div class="col-xs-8 col-sm-8 col-md-12 col-lg-12">
                    <span class="title">Informes</span>
                    <span class="description">Generar informes</span>
                </div>
            </div>
                <div class="clear"></div>
            </div></center>
        </div>
         <div class="span4">
            <center><div class="product-chooser-item">
                <div class="well">
                 <a href="<?php echo Yii::app()->baseUrl.'/user/profile'; ?>"><img src="<?php echo Yii::app()->baseUrl ?>/images/preferencias.png" class="img-rounded" alt="Perfil"></a>
                <div class="col-xs-8 col-sm-8 col-md-12 col-lg-12">
                    <span class="title">Perfil</span>
                    <span class="description">Ver mi perfil</span>
                </div>
            </div>
                <div class="clear"></div>
            </div></center>
        </div>
    </div><!-- row-fluid -->
    </div>
<?php endif; ?>
</div>