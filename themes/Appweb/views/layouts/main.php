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
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <link href='http://fonts.googleapis.com/css?family=Roboto:500,900,400italic,100,700italic,300,700,500italic,100italic,300italic,400' rel='stylesheet' type='text/css'>
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
     $cs->registerScriptFile($baseUrl.'/js/responsiveslides.min.js');
  ?>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!---- start-smoth-scrolling---->
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript">
      jQuery(document).ready(function($) {
        $(".scroll").click(function(event){   
          event.preventDefault();
          $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
        });
      });
    </script>
     <!---- start-smoth-scrolling---->
  </head>
  <body>
    <section class="main-body">
                <!-- Include content pages -->
            <?php echo $content; ?>
    </section>
    <section>
      <div class="footer">
  <div class="container">
    <div class="copy-rights">
         <p>Template by<a href="http://w3layouts.com/"> W3layouts.</a></p>
      </div>
      <script type="text/javascript">
                  $(document).ready(function() {
                    /*
                    var defaults = {
                        containerID: 'toTop', // fading element id
                      containerHoverID: 'toTopHover', // fading element hover id
                      scrollSpeed: 1200,
                      easingType: 'linear' 
                    };
                    */
                    
                    $().UItoTop({ easingType: 'easeOutQuart' });
                    
                  });
                </script>
                  <a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>

  </div>
</div>
    </section>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <?php 
Yii::app()->clientScript->registerScript(
        "compartir",
        "$(document).ready(function() {         
          $('#menudesplegable').hide();

          $('.sharetodos').click(function(event) {
               $('.compartirgral').toggle('slow');
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

      // You can also use "$(window).load(function() {"
    $(function () {
      // Slideshow 1
      $("#slider1").responsiveSlides({
         auto: true,
     nav: true,
     speed: 500,
     namespace: "callbacks",
      });
    });
    </script>
  </body>
</html>