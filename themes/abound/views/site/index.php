<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
$baseUrl = Yii::app()->theme->baseUrl; 
?>
<div class="row-fluid">
    <div class="hero-unit">
        <center>
        <div class="page-header">
            <h1>Ociopoint <small>acceso a usuarios registrados</small></h1>
        </div>

        <p><?php 
        if( Yii::app()->user->isGuest ):
            $this->widget('bootstrap.widgets.TbButton', array(
            'type'=>'primary',       
            'size'=>'large',
            'label'=>'Acceder',
            'url'=>array('user/login'),
            )); 
        else:

            echo "<h3>Bienvenido ".Yii::app()->user->name."</h3>";
            $this->widget('bootstrap.widgets.TbButton', array(
            'type'=>'primary',       
            'size'=>'large',
            'label'=>'Tu panel de usuario',
            'url'=>array('user/profile'),
            ));
        endif;
    ?></p></center>
    </div>
</div>        