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

    <!-- Bootstrap -->
    <?php  
    $baseUrl = Yii::app()->theme->baseUrl;
    $cs = Yii::app()->getClientScript();
    //$cs->registerCssFile($baseUrl.'/css/bootstrap-responsive.min.css');
    $cs->registerCssFile($baseUrl.'/css/animate.css');
    $cs->registerCssFile($baseUrl.'/css/style.css');
    $cs->registerCssFile($baseUrl.'/color/hugo.css');

    $cs->registerCssFile($baseUrl.'/css/hlestilos.css');
    //$cs->registerCssFile($baseUrl.'/css/style-blue.css');
    ?>
    <?php
    //$cs->registerScriptFile($baseUrl.'/js/bootstrap.min.js');
    $cs->registerScriptFile($baseUrl.'/js/jquery.min.js');
    $cs->registerScriptFile($baseUrl.'/js/jquery.easing.min.js');
    $cs->registerScriptFile($baseUrl.'/js/wow.min.js');
    $cs->registerScriptFile($baseUrl.'/js/jquery.scrollTo.js');
    $cs->registerScriptFile($baseUrl.'/js/custom.js');
  ?>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body id="page-top" data-spy="scroll" data-target=".navbar-custom">
    <!-- Preloader -->
  <div id="preloader">
    <div id="load"></div>
  </div>

   <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
               <a class="navbar-brand" href="index.html">
                    <h1>Ociopoint</h1>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#intro">Inicio</a></li>
        <li><a href="#about">Chat</a></li>
    <li><a href="#service">Pelotazo</a></li>
      </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Section: intro -->
    <section id="intro" class="intro">
  
    <div class="slogan">
      <h2>Ociopoint</h2>
      <h4>Apuesta con nosotros</h4>
    </div>
    <div class="page-scroll">
      <a href="#service" class="btn btn-circle">
        <i class="fa fa-angle-double-down animated"></i>
      </a>
    </div>
    </section>

  <!-- /Section: intro -->
    <section id="about" class="home-section text-center">
      <div class="heading-about">
      <div class="container">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
          <div class="wow bounceInDown" data-wow-delay="0.4s">
          <div class="section-heading">
          <h2>Nuestras apuestas</h2>
          <i class="fa fa-2x fa-angle-down"></i>

          </div>
          </div>
        </div>
      </div>
      </div>
    </div>
      <div class="container">
                <!-- Include content pages -->
            <?php echo $content; ?>
      </div>
    </section>
<footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-12">
          <div class="wow shake" data-wow-delay="0.4s">
          <div class="page-scroll marginbot-30">
            <a href="#intro" id="totop" class="btn btn-circle">
              <i class="fa fa-angle-double-up animated"></i>
            </a>
          </div>
          </div>
          <p>&copy;Ociopoint. All rights reserved.</p>
        </div>
      </div>  
    </div>
  </footer>
  


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
    </script>
  </body>
</html>