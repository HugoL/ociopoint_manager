<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Ociopoint Manager">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
    <title>Ociopoint</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <!-- Bootstrap -->
    <?php  
    $baseUrl = Yii::app()->theme->baseUrl;
    $cs = Yii::app()->getClientScript();
    $cs->registerCssFile($baseUrl.'/css/bootstrap.min.css');
    $cs->registerCssFile($baseUrl.'/css/bootstrap-responsive.min.css');
    $cs->registerCssFile($baseUrl.'/css/hlestilos.css');
    //$cs->registerCssFile($baseUrl.'/css/style-blue.css');
    ?>
    <?php
    //$cs->registerScriptFile($baseUrl.'/js/bootstrap.min.js');
    $cs->registerScriptFile($baseUrl.'/js/jquery.min.js');
  ?>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <section class="main-body">
                <!-- Include content pages -->
            <?php echo $content; ?>
    </section>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <?php 
Yii::app()->clientScript->registerScript(
        "compartir",
        "$(document).ready(function() {         
          $('#menudesplegable').hide();

          $('.sharetodos').click(function(event) {
               $('.compartirgral').toggle();
          }); 

          $('#btnmenu').click(function(event) {
               $('#menudesplegable').toggle();
          });  
    });",
       CClientScript::POS_LOAD
      );
?>
    <script>
     $(window).load(function(){
        $('#ventana').modal('show');
     });
    </script>
  </body>
</html>