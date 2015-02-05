<?php
include "php/funciones.php";
$a=new DataBase();
$menu="Bienvenido";
include "head.php";
?>
<body>
	
  <div id="loading-wrap">
    <div id="loading">
      <i class="fa fa-cog fa-spin"></i>
    </div>
  </div>

  <header class="header" id="home">
    <nav class="navbar navbar-default" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="/" title="MAC&CO Planners" class="site-logo"><img src="img/logo.png " alt="MAC&CO Planners"></a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav  navbar-right">
            <li><a href="index.php#home" title="Home" >Inicio</a></li>
            <li><a href="index.php#services" title="Services" >Eventos</a></li>  
            <li><a href="index.php#team" title="Team" >Nosotros</a></li>  
            <li><a href="index.php#contact" title="Contact" >Contact</a></li>                              
          </ul>
        </div>
      </div>
    </nav>
    
  </header>
  
  <section id="team">
    <div class="container">    
      
      <div class="spacer60"></div>
      <div class="row" align="center">
        <p><img src="img/logo.png " alt="MAC&CO Planners"></p>
        <h2 class="center">GRACIAS POR ESCRIBIRNOS</h2>
            <h4 class="center">
            Gracias por ponerse en contacto con nosotros,<br>
            en la brevedad posible estaremos resolviendo todas sus inquietudes.</h4>
        <p></p>
        <h4 class="center">Será dirigido a nuestra Portada en... <span id="countdown">8</span> <i class="fa fa-spinner fa-spin fa-fw"></i></h4>

      </div>        
      
    </div>
  </section>

<div class="spacer60"></div>
  <section id="services">
      
     <div id="parallax-one" class="parallax" style="background-image:url(img/parallax/1.jpg);"> 
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="parallax-text-container-1">
              <div class="parallax-text-item">
                <div class="testimonal">
                        <?php $a->Promo() ?>  
                      </div>
              </div>
            </div>
          </div>         
        </div>    
      </div>    
    </div>
           
  </section>

  <footer id="contact"> <!-- footer begings -->
    
    
    <div class="container">
      <div class="row spacer130"></div>
      <div class="row">        
        <div class="col-md-2">
          <div class="footer-info">
            <div class="footer-info-cell">  
              <a href="/" title="MAC&CO Planners" class="footer-site-logo"><img src="img/logo.png " alt="MAC&CO Planners"></a>
            </div>
          </div> 
        </div>
        <div class="col-md-5">
          <div class="footer-info">
            <div class="footer-info-cell">         
              <p>COPYRIGHT 2014 - BY <a href="http://wynsoluciones.com/" rel="external">WYN</a>.</p> 
            </div>
          </div> 
        </div>
        <div class="col-md-5">
          <div class="footer-info">
            <div class="footer-info-cell">         
              <ul class="social-1">
                <li><a href="#" rel="external" ><i class="fa fa-facebook"></i></a></li>
                <li><a href="#" rel="external" ><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#" rel="external" ><i class="fa fa-twitter"></i></a></li>
              </ul> 
            </div>
          </div> 
        </div>               
      </div>
      <div class="row spacer130"></div>
    </div>
         
  </footer> <!-- Footer ends -->
  <a href="#" class="back-to-top"><span></span></a>
  
  <script src="js/jquery.js"></script>  
  <script src="js/bootstrap.min.js"></script>   
  <script src="js/jquery.scrollTo.js"></script>
  <script src="js/jquery.nav.js"></script>   
  <script src="js/jquery.easing.js"></script>    
  <script src="js/jquery.flexslider-min.js"></script>
  <script src="js/jquery.isotope.min.js"></script>   
  <script src="js/jquery.fitvids.js"></script>
  <script src="js/jquery.appear.js"></script> 
  <script src="js/jquery.sticky.js"></script> 
  <script src="js/retina.js"></script>
  <script src="js/respond.min.js"></script>  
  <script src="js/jquery.parallax-1.1.3.js"></script>
  <script src="js/responsive-tabs.js"></script>  
  <script src="masterslider/masterslider.js"></script>  
  <script src="js/functions.js"></script>   
  
  <script type="text/javascript">

            (function () {
                var timeLeft = 8,
                    cinterval;

                var timeDec = function (){
                    timeLeft--;
                    document.getElementById('countdown').innerHTML = timeLeft;
                    if(timeLeft === 0){
                        clearInterval(cinterval);
                    }
                };

                cinterval = setInterval(timeDec, 1000);
                setTimeout('window.location="/"',10000)
            })();

            </script>
	</body>
</html>